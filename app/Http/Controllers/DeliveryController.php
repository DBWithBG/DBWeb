<?php

namespace App\Http\Controllers;

use App\Bag;
use App\Delivery;
use App\Http\Controllers\phone\NotificationController;
use App\InfoBag;
use App\Position;
use App\TakeOverDelivery;
use Carbon\Carbon;
use CiroVargas\GoogleDistanceMatrix\GoogleDistanceMatrix;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use League\OAuth1\Client\Server\User;

class DeliveryController extends Controller
{

    //Enregistrement d'une delivery (Mobile + 1ere étape web
    public function postDelivery(Request $request){
        $request=HomeController::checkCustomerMobile($request);
        $request = $request->toArray();
        if(isset($request['customer_id']))
            $request['delivery']['customer_id']=$request['customer_id'];

        if(empty($request['delivery']['start_date']))
            $request['delivery']['start_date'] = Carbon::now();
        $start_position = Position::create($request['start_position']);
        $end_position = Position::create($request['end_position']);
        //TODO Calcul du statut selon l'heure envoyée
        $request['delivery']['status'] = Config::get('constants.NON_FINALISE');
        //TODO Calcul du prix
        /******* CALCUL DU PRIX ************/
        $distanceMatrix = new GoogleDistanceMatrix('AIzaSyDOS-liFW3p5AkwwvO9XlFY8YimZJjpPmE');
        $distance = $distanceMatrix->setLanguage('fr')
            ->addOrigin($start_position->lat.', '.$start_position->lng)
            ->addDestination($end_position->lat.', '.$end_position->lng)
            ->sendRequest();
        $request['delivery']['distance'] = explode(' ', $distance->getRows()[0]->getElements()[0]->getDistance()->getText())[0];
        $time = $distance->getRows()[0]->getElements()[0]->getDuration()->getText();
        $time = explode(' ', $time);
        if(sizeof($time) <4){ // 37 min
            $time = $time[0];
        }else{//1 heures 37 min
            $time = $time[0]*60 + $time[2];
        }
        $request['delivery']['estimated_time'] = $time;
        //dd($distance->getRows()[0]->getElements()[0]->getDuration()->getText(),$distance->getRows()[0]->getElements()[0]->getDistance()->getText());
        $request['delivery']['distance'] = str_replace(',', '.',$request['delivery']['distance']);
        /** FIN CALCUL PRIX */
        $request['delivery']['price'] = $request['delivery']['distance']*5;
        $request['delivery']['start_position_id'] = $start_position->id ;
        $request['delivery']['end_position_id'] = $end_position->id ;
        $delivery = Delivery::create($request['delivery']);

        //ajout des bagages
        if(empty($request['bagages'])) $request['bagages'] = [];

        if(!isset($request['customer_id']))
            $request['customer_id']=Auth::user()->customer->id;
        $this->saveBags($request, $delivery->id,$request['customer_id']);

        return $delivery;

    }

    //Enregistrement d'une demande 2eme étape (saisie des bagages en plus)
    public function postBagsWithDelivery(Request $request){
        $request = $request->toArray();
        $delivery = Delivery::find($request['delivery_id']);
        //TODO Save la date
        //$delivery->start_date = Carbon::createFromFormat('');
        $this->saveBags($request, $delivery->id,Auth()->user()->customer->id);
        Session::flash('success', 'Commande enregistrée');
        return redirect('/');
    }

    /**
     * Enregistrement des bagages
     * @param $request
     * @param $delivery_id
     */
    private function saveBags($request, $delivery_id,$customerid){
        foreach($request['bagages'] as $k=>$bags){
            foreach($bags as $b){
                if(!isset($b['name']))
                    $b['name']="";
                if(!isset($b['descr']))
                    $b['descr']="";
                if(!empty($bnew = Bag::where('name', $b['name'])->first())){
                    //On ne modifie que la description puisque le nom est le même
                    $bnew->details = $b['descr'];
                    $bnew->save();
                }else {
                    $bnew = new Bag;
                    $bnew->customer_id = $customerid;
                    $bnew->name = $b['name'];
                    $bnew->type_id = $k;
                    $bnew->details = $b['descr'];
                    $bnew->save();
                }
                //ajout des bages a la course
                $i=new InfoBag;
                $i->details_start_driver=$b['descr'];
                $i->delivery_id=$delivery_id;
                $i->bag_id=$bnew->id;
                $i->save();
            }
        }
    }

    //Renvoie la page de paiement d'une delivery
    public function getPaiement($id){
        $delivery = Delivery::find($id);
        if($delivery->status == 'non payé'){
            /*$authorizationRequest = \App::make(\Devpark\PayboxGateway\Requests\AuthorizationWithCapture::class);

            return $authorizationRequest->setAmount(10)->setCustomerEmail('simon@sup.sarl')
                ->setPaymentNumber(1)->send('paybox.send');

            */
            //TODO A REMPLACER AVEC CI-DESSUS
            return view('');
        }

    }

    public function getSaveDelivery($delivery_id){
        $delivery = Delivery::find($delivery_id);
        if(Auth::check()){//S'il s'est connecté entre temps
            $delivery->customer_id = Auth::user()->customer->id;
            $delivery->save();
        }else{
            Session::put('delivery_id', $delivery_id);
            Session::flash('message', 'Connectez-vous pour finaliser la demande de prise en charge');
            return redirect('connexion');
        }
        return view('customer.createDelivery')->with([
            'delivery' => $delivery
        ]);
    }

    //gestion des consequences d'une annulation de delivery par le driver
    public static function gestionAnnulationDelivery($delivery,$driver){

        $delivery->takeOverDelivery->delete();
        $delivery->update(['status'=>Config::get('constants.EN_ATTENTE_DE_PRISE_EN_CHARGE')]);
        $driver->canceled_deliveries++;
        $driver->save();
        $tab=NotificationController::notifyAnnulation();
        $tab['tokens']=[0=>$delivery->customer->user->notify_token];
        NotificationController::sendNotification($tab);

    }

    //gestion des consequences d'une annulation de delivery par le client
    public static function gestionAnnulationDeliveryCustomer($delivery,$customer){
        $info_bag = InfoBag::where('delivery_id', $delivery->id)->get();
        foreach ($info_bag as $i_bag){
            $i_bag->delete();
        }
        $delivery->delete();
        $delivery->save();
        $customer->canceled_deliveries++;
        $customer->save();
    }


    //gestion des consequences d'une livraison de delivery par le driver
    public static function gestionLivraisonEffectuee($delivery){
        $delivery->update(['status'=>Config::get('constants.TERMINE')]);
        $tab=NotificationController::notifyArrivee();
        $tab['tokens']=[0=>$delivery->customer->user->notify_token];
        NotificationController::sendNotification($tab);
    }

    //gestion des consequences d'un lancement de consigne
    public static function gestionLancementConsigne($delivery){
        $delivery->update(['status'=>Config::get('constants.CONSIGNE')]);
        $tab=NotificationController::notifyConsigne();
        $tab['tokens']=[0=>$delivery->customer->user->notify_token];
        NotificationController::sendNotification($tab);
    }


    //gestion des consequences d'un lancement de livraison de delivery par le driver
    public static function gestionLancementLivraison($delivery){
        $delivery->update(['status'=>Config::get('constants.EN_COURS_DE_LIVRAISON')]);
        $tab=NotificationController::notifyLancementLivraison();
        $tab['tokens']=[0=>$delivery->customer->user->notify_token];
        NotificationController::sendNotification($tab);
    }



}
