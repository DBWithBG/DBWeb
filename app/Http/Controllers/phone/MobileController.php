<?php

namespace App\Http\Controllers\phone;

use App\AuthorizedDepartment;
use App\Bag;
use App\Customer;
use App\Delivery;
use App\Dispute;
use App\Driver;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\FactureController;
use App\InfoBag;
use App\Justificatif;
use App\Rating;
use App\TakeOverDelivery;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class MobileController extends Controller
{

    public function __construct()
    {
        $this->middleware('jwt.auth');
    }

    /************************************ GENERAL FUNCTIONS (ALL) **************************************/

    //Get all deliveries  with status passed in request
    //TODO VERIF SI CALL PAR DRIVER
    public function getDeliveries(Request $request){

        $user = auth()->user();
        if(!$user->driver) return response()->json(['error' => 'user_not_driver'], 403);


        $res=Delivery::where('status','=',$request->get('status'))
            ->with('customer')
            ->with('startPosition')
            ->with('endPosition')
            ->with('takeOverDelivery')
            ->with('bags')
            ->get();

        $final_res = [];
        foreach ($res as $delivery){
            if(sizeof($delivery->getRelation('bags')) <= $user->driver->max_bags){
                array_push($final_res, $delivery);
            }
        }

        return response()
            ->json($res)
            ->setCallback($request->input('callback'));
    }

    public function getCustomers(Request $request){
        $res=Customer::with('deliveries')->get()->toJson();
        return response()
            ->json($res)
            ->setCallback($request->input('callback'));
    }

    //get departement autorises
    public function getAuthorizedDepartments(Request $request){
        $departments = AuthorizedDepartment::all()->toJson();
        return response()->json($departments)->setCallback($request->input('callback'));
    }

    function updatePassword(Request $request) {
        $user = auth()->user();

        $v = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required',
            'new_password_again' => 'required'
        ], [
            'current_password.required' => 'current_password_required',
            'new_password.required' => 'new_password_required',
            'new_password_again.required' => 'new_password_again_required'
        ]);

        if ($v->fails()) {
            return response()->json(['error' => $v->errors()], 403);
        }

        $current_password = $request->current_password;
        $new_password = $request->new_password;
        $new_password_again = $request->new_password_again;

        if (!Hash::check($current_password, $user->password)) {
            return response()->json(['error' => 'actual_password_invalid'], 403);
        }

        if ($new_password != $new_password_again) {
            return response()->json(['error' => 'two_new_passwords_not_correspond'], 403);
        }

        $user->password = Hash::make($new_password);
        $user->save();

        return response()->json()->setCallback($request->input('callback'));

    }

    //Post du changement d'email
    public function updateEmail(Request $request) {
        $user = auth()->user();

        $v = Validator::make($request->all(), [
            'email' => 'required|email|unique:users'
        ], [
            'email.required' => 'email_required',
            'email.email' => 'email_invalid',
            'email.unique' => 'email_already_used'
        ]);

        if ($v->fails()) {
            return response()->json(['error' => $v->errors()], 403);
        }

        $user->email = $request->email;
        try {
            $token = bin2hex(random_bytes(78));
        } catch (\Exception $e) {
        }
        $user->email_confirmation_token = $token;
        $user->is_confirmed = false;
        $user->save();

        if(!$user->customer) MailController::confirm_customer_email_address($user->driver, $token);
        else MailController::confirm_customer_email_address($user->customer, $token);

        return response()->json()->setCallback($request->input('callback'));
    }

    //TODO SECU
    public function getDrivers(Request $request){
        $res=Driver::all()->toJson();
        return response()
            ->json($res)
            ->setCallback($request->input('callback'));
    }

    public function getUser(){
        $user=auth()->user();

        $user['customer']=Customer::where('user_id','=',$user->id)->first();
        $user['driver']=Driver::where('user_id','=',$user->id)->first();
        return json_encode($user);
    }

    //methode permettant de modifier le notify_token
    public function setNotifyToken(Request $request){
        $u=auth()->user();


        $u->notify_token=$request->notify_token;
        $u->save();
    }

    //Renvoi d'une nouvelle confirmation par email
    public function resendConfirmationEmail() {
        $user = auth()->user();
        // Envoyer le mail de confirmation
        try {
            $token = bin2hex(random_bytes(78));
        } catch (\Exception $e) {
        }

        if(!$user->customer){
            $driver = $user->driver;

            $driver->user->email_confirmation_token = $token;
            $driver->user->save();

            MailController::confirm_driver_email_address($driver, $token);

        }else{
            $customer = $user->customer;


            $customer->user->email_confirmation_token = $token;
            $customer->user->save();

            MailController::confirm_customer_email_address($customer, $token);
        }

        return response()->json();

    }



    /************************************ END GENERAL FUNCTIONS (ALL) **********************************/

    /************************************ -CUSTOMER FUNCTIONS- *******************************************/

    //TODO CHECK, elle est fail ????
    public function getDelivery(Request $request,$id){
        $res=Delivery::where('id',$id)->where('customer_id', auth()->user()->id)
            ->with('customer')
            ->with('startPosition')
            ->with('endPosition')
            ->get()->toJson();
        return response()
            ->json($res)
            ->setCallback($request->input('callback'));
    }

    public function getCustomer(Request $request){
        $user = auth()->user();

        if(!$user->customer) return response()->json(['error' => 'user_not_customer'], 403);

        $res=Customer::where('id',$user->customer->id)->with('user')->get()->toJson();
        return response()
            ->json($res)
            ->setCallback($request->input('callback'));
    }


    //get deliveries par
    //TODO CHECK SI USER CUSTO
    public function getDeliveriesByCustomers(){
        $u = auth()->user();
        $deliveries=Delivery::where('customer_id','=',$u->customer->id)
            ->orderBy('created_at','DESC')
            ->with('takeOverDelivery')
            ->with('startPosition')
            ->with('endPosition')
            ->with('takeOverDelivery.driver')
            ->with('takeOverDelivery.disputes')
            ->with('rating')
            ->get();
        $tab=[];
        foreach($deliveries as $d){

            $d->tracking=[null,null];
            if($d->status==Config::get('constants.EN_COURS_DE_LIVRAISON')){
                //TODO calculer tracking => [temps restant estime, pourcentage sur la demande]
                $d->tracking=[20,10];
            }
            if(!isset($tab[$d->status])){
                $tab[$d->status]=[];

            }
            array_push($tab[$d->status],$d);
        }



        return response()
            ->json($tab)
            ->setCallback(Input::get('callback'));
    }


    public function updateCustomer(Request $request) {
        $user = auth()->user();
        $customer = $user->customer;

        if(!$user->customer) return response()->json(['error' => 'user_is_not_customer'], 403);

        $v = Validator::make($request->all(), [
            'name' => 'required',
            'surname' => 'required',
            'phone' => 'nullable|min:10'
        ], [
            'name.required' => 'name_required',
            'surname.required' => 'surname_required',
            'phone.min' => 'phone_min_length_10'
        ]);

        if ($v->fails()) {
            return response()->json(['error' => $v->errors()], 403);
        }

        $customer->update($request->all());
        $customer->save();

        return response()->json()->setCallback($request->input('callback'));
    }

    //modification d'une delivery
    // TODO CHECK SI FAIL
    public function modificationDelivery($id){

        $u=auth()->user();

        if($id==null || !$del=Delivery::find($id)) response()->json(['error' => 'delivery_not_found'], 403);

        if(User::find($del->customer_id)!=$u) response()->json(['error' => 'operation_not_allowed'], 403);


        if(!$infos=Input::get('delivery'))
            $infos=[];

        return json_encode(Delivery::find($id)->update($infos));
    }


    public function getBagsUsers($id=null){

        $u=auth()->user();
        if(!$u->customer) response()->json(['error' => 'user_is_not_customer'], 403);

        return json_encode(Bag::where('customer_id','=',$u->customer->id)->where('saved','=',true)->get());
    }


    public function editBagsUsers(Request $request){
        $u=auth()->user();

        if(!$u->customer) response()->json(['error' => 'user_is_not_customer'], 403);

        Bag::where('customer_id','=',$u->customer->id)->delete();
        $request=$request->toArray();
        if(isset($request['bagages'])){
            foreach($request['bagages'] as $cate=>$bs){
                foreach($bs as $b){
                    if(isset($b['id'])){
                        $obj=Bag::withTrashed()->find($b['id']);
                        if($obj){
                            $obj->restore();
                            $obj->update($b);
                        }
                    }else{
                        $bnew=new Bag;
                        if($b['name'])
                            $bnew->name=$b['name'];
                        else
                            $bnew->name="";
                        if(isset($b['details']))
                            $bnew->details=$b['details'];
                        else
                            $bnew->details="";
                        $bnew->type_id=$cate;
                        $bnew->customer_id=$u->customer->id;
                        $bnew->saved=true;
                        $bnew->save();
                    }
                }
            }
        }
    }

    //TODO methode de check des params
    //post d'un rating de delivery
    public function ratingDelivery(Request $request){
        $u=auth()->user();
        if(!$u->customer) response()->json(['error' => 'user_is_not_customer'], 403);

        $delivery=Delivery::where('id',$request->delivery_id)->first();
        if(!$delivery) response()->json(['error' => 'delivery_not_found'], 403);

        if(!$delivery->takeOverDelivery) response()->json(['error' => 'take_over_delivery_not_found'], 403);
        $driver=Driver::find($delivery->takeOverDelivery->driver->id);

        if(!$driver) response()->json(['error' => 'driver_not_found'], 403);
        if($r=Rating::where('delivery_id','=',$delivery->id)
            ->where('customer_id','=',$u->customer->id)
            ->where('driver_id','=',$driver->id)->first()){
            if(!$request->details)
                $request->details="";
            $r->update(['details'=>$request->details,'rating'=>$request->rating]);
        }else{
            $r=new Rating;
            $r->driver_id=$driver->id;
            $r->delivery_id=$delivery->id;
            $r->rating=$request->rating;
            if(!$request->details)
                $request->details="";
            $r->details=$request->details;
            $r->customer_id=$u->customer->id;
            $r->save();
        }

        return($r);
    }

    //envoie d'une dispute delivery
    public function disputeDelivery(Request $request){
        $u=auth()->user();
        if(!$u->customer) response()->json(['error' => 'user_is_not_customer'], 403);

        $delivery=Delivery::where('id',$request->delivery_id)->first();
        if(!$delivery) response()->json(['error' => 'delivery_not_found'], 403);
        if($delivery->customer_id!=$u->customer->id) response()->json(['error' => 'delivery_not_found'], 403);
        if(!$delivery->takeOverDelivery) response()->json(['error' => 'take_over_delivery_not_found'], 403);
        $d=new Dispute;
        $d->take_over_delivery_id=$delivery->takeOverDelivery->id;
        $d->reason=$request->reason;
        $d->is_customer = true;
        $d->status = "ouvert";
        $d->save();
        return $d;
    }

    public function computePrice(Request $request){
        $u = auth()->user();
        if(empty($u->customer)) return response()->json(['error' => 'user_not_customer'], 403);
        //TODO A VOIR SI CA MARCHE
        $date_sliced = explode(' ',$request['datetimevalue'])[0];
        $time_sliced = explode(' ',$request['datetimevalue'])[1];
        if(empty($request['bagages'])){
            throw new \Error('Please enter a least a bag');
        }
        $start_date = Carbon::create(explode('/',$date_sliced)[2],explode('/',$date_sliced)[1],
            explode('/',$date_sliced)[0],explode(':',$time_sliced)[0], explode(':',$time_sliced)[1])->format('Y-m-d H:m');

        return response()->json(['price' => Delivery::computePrice($request->get('bagages'), $request->get('start_position'), $request->get('end_position'), false)['total']], $start_date);
    }


    //methode de paiement depuis l'appli mobile
    //TODO link paybox + Check user customer + que c'est bien sa delivery
    public function payment(Request $request){
        $u=auth()->user();

        if(!$request->delivery_id) response()->json(['error' => 'delivery_id_not_provided'], 403);

        $d=Delivery::find($request->delivery_id);
        if(!$d) response()->json(['error' => 'delivery_not_found'], 403);

        MailController::send_customer_facture($d->id, Auth()->user());

        $d->update(['status'=>Config::get('constants.EN_ATTENTE_DE_PRISE_EN_CHARGE')]);
    }

    public function annulationDelivery(Request $request){
        $u=auth()->user();

        /*if(!$u->driver)
            throw new \Error('Utilisateur non driver :( ! ');
        */ //MODIF DU 13/07 Bug quand suppression utilisateur
        if(!$request->delivery_id) response()->json(['error' => 'delivery_id_not_provided'], 403);

        $d=Delivery::find($request->delivery_id);
        if(!$d) response()->json(['error' => 'delivery_not_found'], 403);
        if($d->customer->user->id != $u->id) response()->json(['error' => 'operation_not_allowed_from_user'], 403);
        if(!Delivery::isAnnulableByCustomer($d)) response()->json(['error' => 'delivery_not_cancelable'], 403);

        return json_encode(DeliveryController::gestionAnnulationDeliveryCustomer($d,$u->customer));

    }


    //TODO CHECK CA Sécu ??
    public function postDelivery(Request $request){
        $dc = new DeliveryController();

        $delivery = $dc->postDeliveryMobile($request, Auth::user()->customer->id);

        return $delivery;

    }


    /************************************ END -CUSTOMER- FUNCTION ****************************************/

    /************************************ -DRIVER- FUNCTIONS *********************************************/


    public function getDeliveriesByDriverByStatus(Request $request){
        $user = auth()->user();

        if(!$user->driver) return response()->json(['error' => 'user_not_driver'], 403);


        $takeovers=TakeOverDelivery::where('driver_id','=',$user->driver->id)
            ->with('delivery')
            ->with('delivery.customer')
            ->with('delivery.startPosition')
            ->with('delivery.endPosition')
            ->with('delivery.bags')
            ->get()->toJson();


        //TO json
        return response()->json($takeovers)->setCallback($request->input('callback'));;

    }

    //get delivery pour debloquer donovan en attendant
    public function getDriver(Request $request){
        $user = auth()->user();

        if(!$user->driver) return response()->json(['error' => 'user_not_driver'], 403);

        $res=Driver::where('id',$user->driver->id)->with('user')->get()->toJson();
        return response()
            ->json($res)
            ->setCallback($request->input('callback'));
    }


    public function updateDriver(Request $request){
        $user = auth()->user();
        if(!$user->driver) return response()->json(['error' => 'user_not_driver'], 403);

        $driver = $user->driver;
        $v = Validator::make($request->all(), [
            'name' => 'required',
            'surname' => 'required',
            'siret' => 'nullable|digits_between:14,14',
            'phone' => 'nullable|min:10'
        ], [
            'name.required' => 'name_required',
            'surname.required' => 'surname_required',
            'siret.digits_between' => 'siret_invalid_need_to_be_size_14_digits',
            'phone.min' => 'phone_length_min_10'
        ]);

        if ($v->fails()) {
            return response()->json(['error' => $v->errors()], 401);
        } else {

            $driver->update($request->all());
            // Le siret passe passe dans le update...
            $driver->siret = $request->siret;
            $driver->save();
        }
        return response()
            ->json($driver)
            ->setCallback($request->input('callback'));
    }

    //prise en charge d'une delivery par chauffeur
    public function priseEnChargeDelivery(){

        $u=auth()->user();

        if(!$u->driver) return response()->json(['error' => 'user_is_not_driver'], 403);

        if(!Input::get('delivery_id') || !$del=Delivery::find(Input::get('delivery_id')))
            return response()->json(['error' => 'delivery_not_found'], 403);

        $res_id=null;
        //TODO utilise pour debug mettre en attente de pris en charge
        if($del->status==Config::get('constants.EN_ATTENTE_DE_PRISE_EN_CHARGE')){
            $take=new TakeOverDelivery;
            $take->driver_id=$u->driver->id;
            $take->status=0;
            $take->delivery_id=$del->id;
            $take->actual_position_id=$del->startPosition->id;
            $take->save();
            $del->update(['status'=>Config::get('constants.PRIS_EN_CHARGE')]);
            $res_id=$take->id;
            //TODO Envoi mail
            MailController::send_customer_priseEnCharge($del);
            $tab=NotificationController::notifyPriseEnCharge();
            $tab['tokens']=[0=>$del->customer->user->notify_token];
            NotificationController::sendNotification($tab);
        }

    }


    public function getDriversDeliveries(){
        $u=auth()->user();

        if(!$u->driver) response()->json(['error' => 'user_is_not_driver'], 403);

        $takeovers=TakeOverDelivery::where('driver_id','=',$u->driver->id)->with('delivery')->get();
        return $takeovers;
    }

    //modification du status d'une delivery par un driver
    public function editStatusDriver(Request $request){
        $u=auth()->user();
        if(!$u->driver) response()->json(['error' => 'user_is_not_driver'], 403);
        $delivery=Delivery::where('id', $request->delivery_id)->first();

        if(!$delivery) response()->json(['error' => 'delivery_not_found'], 403);
        if(!$request->status_id==Config::get('constants.PRIS_EN_CHARGE')){
            if((!$delivery->takeOverDelivery || $delivery->takeOverDelivery->driver_id != $u->driver->id))
                response()->json(['error' => 'toke_over_delivery_not_found'], 403);
        }
        if($request->status_id==Config::get('constants.EN_ATTENTE_DE_PRISE_EN_CHARGE')){
            DeliveryController::gestionAnnulationDelivery($delivery,$u->driver);
        }

        if($request->status_id==Config::get('constants.PRIS_EN_CHARGE'))
            $this->priseEnChargeDelivery($request);

        if($request->status_id==Config::get('constants.EN_COURS_DE_LIVRAISON'))
            DeliveryController::gestionLancementLivraison($delivery);

        if($request->status_id==Config::get('constants.CONSIGNE'))
            DeliveryController::gestionLancementConsigne($delivery);
        if($request->status_id==Config::get('constants.TERMINE'))
            DeliveryController::gestionLivraisonEffectuee($delivery);
    }

    public function modificationEtatDesLieux(Request $request){
        $u=auth()->user();

        if(!$u->driver) response()->json(['error' => 'user_is_not_driver'], 403);

        if(!$request->delivery_id) response()->json(['error' => 'delivery_not_found'], 403);
        if($request->details){
            foreach($request->details as $d){
                InfoBag::where('bag_id','=',$d["bag_id"])
                    ->where('delivery_id','=',$request->delivery_id)
                    ->first()
                    ->update(["details_start_driver"=>$d["detail"]]);
            }
        }
    }

    public function getJustificatifs(){
        $driver = Auth::user()->driver;

        return response()->json(['justificatifs' => $driver->justificatifs]);
    }

    public function getJustificatif($id){
        $driver = Auth::user()->driver;
        $justificatif = Justificatif::findOrFail($id);

        // Si le user est un driver, il faut que le justi lui appartienne
        if ($driver !== null) {
            if ($driver->id != $justificatif->driver_id) {
                return response()->json(['error' => 'driver_not_allowed'], 403);
            }
        }

        $file = Storage::get($justificatif->file_path);
        $mimetype = \GuzzleHttp\Psr7\mimetype_from_filename($justificatif->file_path);
        return response($file, 200)->header('Content-Type', $mimetype);
    }

    public function getFactureDriver($year, $month) {
        $driver = Auth::user()->driver;

        $sorted_deliveries = $driver->sortedDeliveries();

        // Si il n'existe pas de récap pour le mois voulu, on renvoie un code Bad Request
        if(!array_key_exists($year, $sorted_deliveries)) abort(400);
        if(!array_key_exists($month, $sorted_deliveries[$year])) abort(400);

        // Génération / Récup de la facture avec FactureController::genererFactureDriverMonth -> return path
        $path = FactureController::genererFactureDriverMonth($driver->id, $year, $month);


        // On retourne le fichier grâce au path
        header('Content-Type: application/pdf');
        header('Content-Length: ' . filesize($path));
        readfile($path);
        return;
    }

    //Ajout d'une pièce justificative au chauffeur
    public function addJustificatif(Request $request) {
        $driver = Auth::user()->driver;

        // On vérifie la présence du fichier
        if (!$request->hasFile('justificatif')) {
            return response()->json(['error' => 'no_file_provided'], 403);
        }

        // La présence du nom
        $v = Validator::make($request->all(), [
            'name' => 'required'
        ], [
            'name.required' => 'Le nom de la pièce justificative est requis'
        ]);

        if ($v->fails()) {
            return response()->json(['error' => $v], 400);
        }

        // Le type du fichier
        $file = $request->file('justificatif');
        $extension = strtolower($file->getClientOriginalExtension());
        if (!in_array($extension, ['jpg', 'jpeg', 'png', 'pdf'])) {
            return response()->json(['error' => 'wrong_file_type'], 400);
        }

        // On enregistre
        $path = $file->store('justificatifs');
        $justificatif = new Justificatif;
        $justificatif->driver_id = $driver->id;
        $justificatif->name = $request->name;
        $justificatif->file_path = $path;
        $justificatif->save();

        return response()->json(['justificatif' => $justificatif])->setCallback($request->input('callback'));
    }

    //Suppression d'un justificatif
    public function deleteJustificatif($id) {
        $user = Auth::user();
        $driver = $user->driver;
        $justificatif = Justificatif::findOrFail($id);

        // Si le user est un driver, il faut que le justi lui appartienne et que le justi n'est pas été validé
        if ($driver !== null) {
            if ($driver->id != $justificatif->driver_id) {
                return response()->json(['error' => 'driver_not_allowed'], 403);
            }

            if ($justificatif->is_valide) {
                return response()->json(['error' => 'justificatif_valid_cant_delete'], 403);
            }
        } else {
            return response()->json(['error' => 'user_not_driver'], 403);
        }



        Storage::delete($justificatif->file_path);
        $justificatif->delete();
        return response()->json();
    }


    public function setPosition(Request $request){
        $u=auth()->user();

        if(!$u->driver) response()->json(['error' => 'user_is_not_driver'], 403);

        $u->driver->update(['current_lng'=>$request->current_lng,'current_lat'=>$request->current_lat]);
        return json_encode($u);
    }

    /************************************ END DRIVER FUNCTION *****************************************/

    //get delivery pour consulter les informations d'une delivery
    // TODO DEPRECTED
    /*public function showDelivery(Request $request,$delivery_id){
        JWTAuth::setToken(Input::get('token'));
        $u = JWTAuth::authenticate();
        $delivery=Delivery::where('id',$delivery_id)->with('customer')->with('startPosition')->with('endPosition')->first();
        if(!$delivery) response()->json(['error' => 'delivery_not_found'], 403);

        $deliveries=Delivery::where('customer_id','=',$u->customer->id)->orderBy('created_at','DESC')->with('customer')->with('startPosition')->with('endPosition')->get();

        return view('customer.showDelivery')->with(compact('delivery','deliveries'));

    }*/

    public function updateSiretDriver(Request $request){
        $user = auth()->user();
        if(!$user->driver) return response()->json(['error' => 'user_not_driver'], 403);

        $driver = $user->driver;
        $v = Validator::make($request->all(), [
            'siret' => 'nullable|digits_between:14,14'
        ], [
            'siret.required' => 'siret_required',
            'siret.digits_between' => 'siret_invalid'
        ]);

        if ($v->fails()) {
            return response()->json(['error' => $v->errors()], 401);
        } else {
            $driver->siret = $request->siret;
            $driver->save();
        }
        return response()->json($driver);
    }


}
