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
use App\InfoBag;
use App\Rating;
use App\TakeOverDelivery;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class MobileController extends Controller
{

    public function __construct()
    {
        $this->middleware('jwt.auth')->except(['showDelivery']);
    }

    //Get all deliveries  with status passed in request
    public function getDeliveries(Request $request){

        $res=Delivery::where('status','=',$request->get('status'))
            ->with('customer')
            ->with('startPosition')
            ->with('endPosition')
            ->with('takeOverDelivery')
            ->with('bags')
            ->get()->toJson();
        return response()
            ->json($res)
            ->setCallback($request->input('callback'));
    }

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
        return response()->json($takeovers)->setCallback($request->input('callback'));;

    }

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


    //get deliveries pour debloquer donovan en attendant
    public function getCustomers(Request $request){
        $res=Customer::with('deliveries')->get()->toJson();
        return response()
            ->json($res)
            ->setCallback($request->input('callback'));
    }
    //get delivery pour debloquer donovan en attendant
    public function getCustomer(Request $request){
        $user = auth()->user();

        if(!$user->customer) return response()->json(['error' => 'user_not_customer'], 403);

        $res=Customer::where('id',$user->customer->id)->with('deliveries')->get()->toJson();
        return response()
            ->json($res)
            ->setCallback($request->input('callback'));
    }

    //get deliveries pour debloquer donovan en attendant
    public function getDrivers(Request $request){
        $res=Driver::all()->toJson();
        return response()
            ->json($res)
            ->setCallback($request->input('callback'));
    }
    //get delivery pour debloquer donovan en attendant
    public function getDriver(Request $request){
        $user = auth()->user();

        if(!$user->driver) return response()->json(['error' => 'user_not_driver'], 403);

        $res=Driver::where('id',$user->driver->id)->get()->toJson();
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
            'email' => 'required|email',
            'siret' => 'nullable|digits_between:14,14',
            'phone' => 'nullable|numeric'
        ], [
            'name.required' => 'Le champ nom est requis',
            'surname.required' => 'Le champ prénom est requis',
            'email.required' => 'Le champ email est requis',
            'email.email' => 'L\'adresse mail est invalide',
            'siret.digits_between' => 'Le numéro de SIRET est invalide. Celui-ci doit être composé de 14 chiffres'
        ]);

        if ($v->fails()) {
            return response()->json(['error' => $v], 401);
        } else {
            $driver->update($request->all());
            // Le siret passe passe dans le update...
            $driver->siret = $request->siret;
            $driver->user->email = $request->email;
            $driver->user->save();
            $driver->save();
        }
        return response()
            ->json($driver)
            ->setCallback($request->input('callback'));
    }

    //get departement autorises
    public function getAuthorizedDepartments(Request $request){
        $departments = AuthorizedDepartment::all()->toJson();
        return response()->json($departments)->setCallback($request->input('callback'));
    }

    //POST connexion mobile deprecated
    public function mobileLogin(Request $request){

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            //clear des users au meme mobile_token
            User::where('mobile_token','=',$request->mobile_token)->where('email','!=',$request->email)->update(['mobile_token'=>'']);
            $user = Auth::user();
            $user->mobile_token = $request->mobile_token;
            $user->save();

            $user['customer']=Customer::where('user_id','=',$user->id)->first();
            $user['driver']=Driver::where('user_id','=',$user->id)->first();
            return response()->json($user)->setCallback($request->input('callback'));
        }else{
            throw new \Error('Erreur de connexion');
        }

    }

    //get deliveries par client
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


    //modification d'une delivery
    public function modificationDelivery($id){

        $u=auth()->user();

        if($id==null || !$del=Delivery::find($id)) response()->json(['error' => 'delivery_not_found'], 403);

        if(User::find($del->customer_id)!=$u) response()->json(['error' => 'operation_not_allowed'], 403);


        if(!$infos=Input::get('delivery'))
            $infos=[];

        return json_encode(Delivery::find($id)->update($infos));
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
            $tab=NotificationController::notifyPriseEnCharge();
            $tab['tokens']=[0=>$del->customer->user->notify_token];
            NotificationController::sendNotification($tab);
        }
        return json_encode($res_id);
    }


    public function getUser(){
        $user=auth()->user();

        $user['customer']=Customer::where('user_id','=',$user->id)->first();
        $user['driver']=Driver::where('user_id','=',$user->id)->first();
        return json_encode($user);
    }


    public function getBagsUsers($id=null){

        $u=auth()->user();
        if(!$u->customer) response()->json(['error' => 'user_is_not_customer'], 403);

        return json_encode(Bag::where('customer_id','=',$u->customer->id)->where('saved','=',true)->get());
    }


    //TODO A VERIFIER
    //methode permettant de verifier que le token fournit correspond au token utilisateur (methode amenee a devenir plus complexe)
    public static function checkToken($t1,Request $request){
        if(isset($request->chk_mobile_token))
            return $t1==$request->chk_mobile_token;
        else
            return true;
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

    //get delivery pour consulter les informations d'une delivery
    // TODO DEPRECTED
    public function showDelivery(Request $request,$delivery_id){
        JWTAuth::setToken(Input::get('token'));
        $u = JWTAuth::authenticate();
        $delivery=Delivery::where('id',$delivery_id)->with('customer')->with('startPosition')->with('endPosition')->first();
        if(!$delivery) response()->json(['error' => 'delivery_not_found'], 403);

        $deliveries=Delivery::where('customer_id','=',$u->customer->id)->orderBy('created_at','DESC')->with('customer')->with('startPosition')->with('endPosition')->get();

        return view('customer.showDelivery')->with(compact('delivery','deliveries'));

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


    //methode permettant de modifier le notify_token
    public function setNotifyToken(Request $request){
        $u=auth()->user();


        $u->notify_token=$request->notify_token;
        $u->save();
    }

    //methode de paiement depuis l'appli mobile
    //TODO link paybox
    public function payment(Request $request){
        $u=auth()->user();

        if(!$request->delivery_id) response()->json(['error' => 'delivery_id_not_provided'], 403);

        $d=Delivery::find($request->delivery_id);
        if(!$d) response()->json(['error' => 'delivery_not_found'], 403);

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
        if(!Delivery::isAnnulableByCustomer($d)) response()->json(['error' => 'delivery_not_canceled'], 403);

        return json_encode(DeliveryController::gestionAnnulationDeliveryCustomer($d,$u->customer));

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
        $delivery=Delivery::find($request->delivery_id);

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


       public function setPosition(Request $request){
           $u=auth()->user();

           if(!$u->driver) response()->json(['error' => 'user_is_not_driver'], 403);

           $u->driver->update(['current_lng'=>$request->current_lng,'current_lat'=>$request->current_lat]);
           return json_encode($u);
       }

       public function postDelivery(Request $request){
        $dc = new DeliveryController();
            return $dc->postDeliveryMobile($request, Auth::user()->customer->id);
       }
}
