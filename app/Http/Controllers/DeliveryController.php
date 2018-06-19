<?php

namespace App\Http\Controllers;

use App\Bag;
use App\Delivery;
use App\InfoBag;
use App\Position;
use App\TakeOverDelivery;
use CiroVargas\GoogleDistanceMatrix\GoogleDistanceMatrix;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class DeliveryController extends Controller
{
    public function postDelivery(Request $request){

        $request = $request->toArray();
        return json_encode($request);
        $start_position = Position::create($request['start_position']);
        $end_position = Position::create($request['end_position']);
        //TODO Calcul du statut selon l'heure envoyée
        $request['delivery']['status'] = 'Non payé';
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

        foreach($request['bagages'] as $k=>$bags){
            foreach($bags as $b){
                $bnew=new Bag;
                $bnew->customer_id=$delivery->customer_id;
                $bnew->name=$b->nom;
                $bnew->type_id=$k;
                $bnew->details=$b->details;
                $bnew->save();

                //ajout des bages a la course
                $i=new InfoBag;
                $i->details_start_driver=$b->descr;
                $i->save();
            }
        }
        return $delivery;

    }


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


}
