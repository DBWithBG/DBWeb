<?php

    namespace App\Http\Controllers;

    use App\Bag;
    use App\Delivery;
    use App\Http\Controllers\phone\NotificationController;
    use App\InfoBag;
    use App\PayboxPayment;
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


        public function postDeliveryMobile(Request $request, $customer_id){
            return $this->postDelivery($request, $customer_id);
        }

        //Enregistrement d'une delivery (Mobile + 1ere étape web
        public function postDelivery(Request $request, $customer_id = null){


            //$request=HomeController::checkCustomerMobile($request);
            $request = $request->toArray();
            if(isset($customer_id)) {
                $request['customer_id'] = $customer_id;
                $request['delivery']['customer_id'] = $customer_id;
            }



            if(empty($request['delivery']['start_date']))
                $request['delivery']['start_date'] = Carbon::now();

            $start_position = Position::create($request['start_position']);
            $end_position = Position::create($request['end_position']);

            //TODO Calcul du statut selon l'heure envoyée
            if(!empty($request['delivery']['time_consigne'])){
                //TODO TIME CONSIGNE ENVOYER EN MINUTE
            }

            $request['delivery']['status'] = Config::get('constants.NON_FINALISE');

            //TODO Calcul du prix
            /******* CALCUL DU PRIX ************/
            $distanceMatrix = new GoogleDistanceMatrix('AIzaSyDOS-liFW3p5AkwwvO9XlFY8YimZJjpPmE');
            $distance = $distanceMatrix->setLanguage('fr')
                ->addOrigin($start_position->lat.', '.$start_position->lng)
                ->addDestination($end_position->lat.', '.$end_position->lng)
                ->sendRequest();

            $request['delivery']['distance'] = explode(' ', $distance->getRows()[0]->getElements()[0]->getDistance()->getText())[0];
            $request['delivery']['distance'] = str_replace(',', '.',$request['delivery']['distance']);

            if (!empty($request['nb_bags'])) {
                $nb_bags = $request['nb_bags'];
                $bagages = [];
                for ($i = 0; $i < $nb_bags; $i++) {
                    array_push($bagages, ['a' => 'a']);
                }


                $prices = Delivery::computePrice($bagages, $start_position, $end_position, $distance, $request['delivery']['start_date'], false);
            }

            else if(empty($request['bagages'])) {
                $request['bagages']= [['a'=>'a']];
                $prices = Delivery::computePrice($request['bagages'], $start_position, $end_position, $distance, $request['delivery']['start_date'], false);
                $request['bagages'] = null;
            }

            else {
                $prices = Delivery::computePrice($request['bagages'], $start_position, $end_position, $distance, $request['delivery']['start_date'], false);
            }

            $request['delivery']['price'] = $prices['total'];
            $request['delivery']['remuneration_driver'] = $prices['remuneration_driver'];
            $request['delivery']['remuneration_deliver'] = $prices['remuneration_deliver'];
            $time = $distance->getRows()[0]->getElements()[0]->getDuration()->getText();
            $time = explode(' ', $time);
            if(sizeof($time) <4){ // 37 min
                $time = $time[0];
            }else{//1 heures 37 min
                $time = $time[0]*60 + $time[2];
            }
            $request['delivery']['estimated_time'] = $time;
            //dd($distance->getRows()[0]->getElements()[0]->getDuration()->getText(),$distance->getRows()[0]->getElements()[0]->getDistance()->getText());
            /** FIN CALCUL PRIX */

            $request['delivery']['start_position_id'] = $start_position->id ;
            $request['delivery']['end_position_id'] = $end_position->id ;
            $delivery = Delivery::create($request['delivery']);

            //ajout des bagages
            if(empty($request['bagages'])) $request['bagages'] = [];
            if(empty($request['customer_id'])) $request['customer_id'] = "";
            if(!Auth::check()) session('delivery_id', $delivery->id);
            //if(!isset($request['customer_id']))
                //$request['customer_id']=Auth::user()->customer->id;

            $this->saveBags($request, $delivery->id, $request['customer_id']);

            return $delivery;

        }

        //Enregistrement d'une demande 2eme étape (saisie des bagages en plus)
        public function postBagsWithDelivery(Request $request){
            $request = $request->toArray();
            $delivery = Delivery::find($request['delivery_id']);
            $date_sliced = explode(' ',$request['datetimevalue'])[0];
            $time_sliced = explode(' ',$request['datetimevalue'])[1];
            if(empty($request['bagages'])){
                throw new \Error('Please enter a least a bag');
            }
            $start_date = Carbon::create(explode('/',$date_sliced)[2],explode('/',$date_sliced)[1],
                explode('/',$date_sliced)[0],explode(':',$time_sliced)[0], explode(':',$time_sliced)[1]);
            //$start_date = Carbon::createFromFormat('Y-m-j',$request['date_prise_en_charge']);
            //$start_date->setTimeFromTimeString($request['time_prise_en_charge']);
            $request['time_consigne'] = null;
            if(!empty($request['time_consigne'])){
                //REmove because of pierre Mail
                $delivery->time_consigne = Carbon::createFromTimeString($request['time_consigne']);
                $delivery->end_date = $start_date->copy();

                $delivery->end_date = $delivery->end_date->addHours($delivery->time_consigne->hour)->addMinutes($delivery->time_consigne->minute);
            }

            $retour = false;
            if(!empty($request['has_retour']) && !empty($request['date_retour'])){
                $delivery->date_retour = Carbon::createFromFormat("d/m/Y H:i",$request['date_retour']);
                $retour = true;
            }


            $prices = Delivery::computePrice($request['bagages'], null, null, $delivery->distance, $start_date, $retour);
            $delivery->price = $prices['total'];
            $delivery->remuneration_driver = $prices['remuneration_driver'];
            $delivery->remuneration_deliver = $prices['remuneration_deliver'];
            $delivery->status = Config::get('constants.NON_FINALISE');

            $delivery->start_date = $start_date;
            $delivery->save();
            dd($request);


            $this->saveBags($request, $delivery->id, Auth()->user()->customer->id);

            //TODO A RETIRER QUAND PAIEMENT
            //MailController::send_customer_facture($delivery->id, Auth()->user());
            Session::flash('success', 'Commande enregistrée');

            return view('customer.paiement')->with([
                'delivery' =>$delivery
            ]);
        }

        public function getPaiement(Request $request){
            $delivery = Delivery::find($request->delivery_id);
            if(empty($delivery->id)){
                return "ERROR_DELIVERY_NOT_FOUND";
            }
            if(Auth::user()->id != $delivery->customer->user->id){
                return "OPERATION_NOT_ALLOWED";
            }

            Session::put('paiement', 'paiement');
            return redirect('paybox/paiment_process')->with(['paiement' => $delivery->price, 'delivery_id' => $delivery->id, 'email' => Auth::user()->email]);
        }


        /**
         * Enregistrement des bagages
         * @param $request
         * @param $delivery_id
         */
        private function saveBags($request, $delivery_id,$customerid){

            foreach($request['bagages'] as $k=>$bags){
                foreach($bags as $key=>$b){
                    if(!isset($b['name'])) {
                        if($k==Config::get('constants.BAGAGE_CABINE')){
                            $b['name']="BAGAGE CABINE ".($key+1);
                        }
                        if($k==Config::get('constants.BAGAGE_SOUTE')){
                            $b['name']="BAGAGE SOUTE ".($key+1);
                        }
                        if($k==Config::get('constants.BAGAGE_AUTRE')){
                            $b['name']="BAGAGE AUTRE ".($key+1);
                        }
                    }
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
        /*public function getPaiement($id){
            $delivery = Delivery::find($id);
            if($delivery->status == 'non payé'){
                /*$authorizationRequest = \App::make(\Devpark\PayboxGateway\Requests\AuthorizationWithCapture::class);

                return $authorizationRequest->setAmount(10)->setCustomerEmail('simon@sup.sarl')
                    ->setPaymentNumber(1)->send('paybox.send');


                //TODO A REMPLACER AVEC CI-DESSUS
                return view('');
            }

        }*/

        public function getSaveDelivery($delivery_id){
            $delivery = Delivery::find($delivery_id);
            if(Auth::check()){//S'il s'est connecté entre temps
                $delivery->customer_id = Auth::user()->customer->id;
                $delivery->save();
                Session::forget('delivery_id');
            }else{
                Session::put('delivery_id', $delivery_id);
                Session::flash('message', 'Connectez-vous pour finaliser la demande de prise en charge');
                return redirect('connexion');
            }

            $nb_bags = Input::get('nb_bags', 0);

            // Si quelqu'un bidouille l'URL :
            if ($nb_bags < 1) return redirect('/');

            return view('customer.createDelivery')->with([
                'delivery' => $delivery,
                'nb_bags' => $nb_bags,
                'num_train' => Input::get('num_train', null),
                'num_vol' => Input::get('num_vol', null)
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
            $ret = $delivery->delete();
            $customer->canceled_deliveries++;
            $customer->save();
            return $ret;
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

        public function success(){
            $delivery=session('delivery');
            return view('customer.paybox.accepted')->with([
                'delivery' => $delivery
            ]);
        }

        //affiche retour paiment refuse a l'utilisateur
        public function refused(){
            $delivery=session('delivery');
            return view('customer.paybox.refused')->with([
                'delivery' => $delivery
            ]);
        }

        //affiche retour paiment en attente a l'utilisateur
        public function waiting(){
            $delivery=session('delivery');
            return view('customer.paybox.waiting')->with([
                'delivery' => $delivery
            ]);
        }

        //affiche retour paiment refuse a l'utilisateur
        public function aborted(){
            $delivery=session('delivery');
            return view('customer.paybox.aborted')->with([
                'delivery' => $delivery
            ]);
        }



    }
