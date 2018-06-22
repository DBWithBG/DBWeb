<?php

namespace App\Http\Controllers\phone;

use App\AuthorizedDepartment;
use App\Bag;
use App\Customer;
use App\Delivery;
use App\Dispute;
use App\Driver;
use App\Http\Controllers\Controller;
use App\Rating;
use App\TakeOverDelivery;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use function MongoDB\BSON\toJSON;

class MobileController extends Controller
{
    //get deliveries pour debloquer donovan en attendant
    public function getDeliveries(Request $request){
        $res=Delivery::with('customer')->with('startPosition')->with('endPosition')->get()->toJson();
        return response()
            ->json($res)
            ->setCallback($request->input('callback'));
    }
    //get delivery pour debloquer donovan en attendant
    public function getDelivery(Request $request,$id){
        $res=Delivery::where('id',$id)->with('customer')->with('startPosition')->with('endPosition')->get()->toJson();
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
    public function getCustomer(Request $request,$id){
        $res=Customer::where('id',$id)->with('deliveries')->get()->toJson();
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
    public function getDriver(Request $request,$id){
        $res=Driver::where('id',$id)->get()->toJson();
        return response()
            ->json($res)
            ->setCallback($request->input('callback'));
    }

    //get departement autorises
    public function getAuthorizedDepartments(Request $request){
        $departments = AuthorizedDepartment::all()->toJson();
        return response()->json($departments)->setCallback($request->input('callback'));
    }

    //POST connexion mobile
    public function mobileLogin(Request $request){

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
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

        if(!Input::get('mobile_token'))
            throw new \Error('Pas de token fourni :( ! ');
        $u=User::where('mobile_token','=',Input::get('mobile_token'))->first();
        if(!$u)
            throw new \Error('Pas d\'utilisateur trouvé :( ! ');

        $deliveries=Delivery::where('customer_id','=',$u->customer->id)
            ->orderBy('created_at','DESC')
            ->with('takeOverDelivery')
            ->with('startPosition')
            ->with('endPosition')
            ->get();
        $tab=[];
        foreach($deliveries as $d){

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

        if(!Input::get('mobile_token'))
            throw new \Error('Pas de token fourni :( ! ');
        $u=User::where('mobile_token','=',Input::get('mobile_token'))->first();
        if(!$u)
            throw new \Error('Pas d\'utilisateur trouvé :( ! ');

        if($id==null || !$del=Delivery::find($id))
            throw new \Error('Pas de commande fournie ou trouvee  :( !');

        if(User::find($del->customer_id)!=$u)
            throw new \Error('Utilisateur non authorise a modifier la delivery');


        if(!$infos=Input::get('delivery'))
            $infos=[];

        return json_encode(Delivery::find($id)->update($infos));
    }

    //prise en charge d'une delivery par chauffeur
    public function priseEnChargeDelivery(){
        if(!Input::get('mobile_token'))
            throw new \Error('Pas de token fourni :( ! ');
        $u=User::where('mobile_token','=',Input::get('mobile_token'))->first();
        if(!$u)
            throw new \Error('Pas d\'utilisateur trouvé :( ! ');

        if(!$u->driver)
            throw new \Error('L\'utilisateur n\'est pas chauffeur');

        if(!Input::get('delivery_id') || !$del=Delivery::find(Input::get('delivery_id')))
            throw new \Error('Pas de commande fournie ou trouvee  :( !');

        $res_id=null;
        if($del->status=="Payé"){
            $take=new TakeOverDelivery;
            $take->driver_id=$u->driver->id;
            $take->status=0;
            $take->delivery_id=$del->id;
            $take->actual_position_id=$del->startPosition->id;
            $take->save();
            $del->update(['status'=>"Pris en charge"]);
            $res_id=$take->id;
        }
        return json_encode($res_id);
    }


    public function getUser($mobile_token){
        $user=User::where('mobile_token','=',$mobile_token)->first();
        if(!$user)
            return 'null';
        else
        {
            $user['customer']=Customer::where('user_id','=',$user->id)->first();
            $user['driver']=Driver::where('user_id','=',$user->id)->first();
            return json_encode($user);
        }
    }


    public function getBagsUsers($id=null){
        if(!$id)
            throw new \Error('Pas de token fourni :( ! ');
        $u=User::where('mobile_token','=',$id)->first();
        if(!$u)
            throw new \Error('Pas d\'utilisateur trouvé :( ! ');

        if(!$u->customer)
            throw new \Error('Utilisateur non customer');

        return json_encode(Bag::where('customer_id','=',$u->customer->id)->where('saved','=',true)->get());
    }


    //methode permettant de verifier que le token fournit correspond au token utilisateur (methode amenee a devenir plus complexe)
    public static function checkToken($t1,Request $request){
        if(isset($request->chk_mobile_token))
            return $t1==$request->chk_mobile_token;
        else
            return true;
    }


    public function editBagsUsers(Request $request){
        if(!isset($request->mobile_token))
            throw new \Error('Pas de token fourni :( ! ');
        $u=User::where('mobile_token','=',$request->mobile_token)->first();
        if(!$u)
            throw new \Error('Pas d\'utilisateur trouvé :( ! ');

        if(!$u->customer)
            throw new \Error('Utilisateur non customer');

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
                        if(isset($b['descr']))
                            $bnew->details=$b['descr'];
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
    public function showDelivery(Request $request,$delivery_id){
        if(!isset($request->mobile_token))
            throw new \Error('Pas de token fourni :( ! ');
        $u=User::where('mobile_token','=',$request->mobile_token)->first();
        if(!$u)
            throw new \Error('Pas d\'utilisateur trouvé :( ! ');
        if(!$u->customer)
            throw new \Error('Utilisateur non customer');
        $delivery=Delivery::where('id',$delivery_id)->with('customer')->with('startPosition')->with('endPosition')->first();
        if(!$delivery)
            throw new \Error('Delivery non trouvée :( !');
        if($delivery->customer_id!=$u->customer->id){
            throw new \Error('L\'utilisateur n\'a pas accès à cette course.');
        }


        return view('customer.showDelivery')->with(compact('delivery'));

    }

    //TODO methode de check des params
    //post d'un rating de delivery
    public function ratingDelivery(Request $request){
        if(!isset($request->mobile_token))
            throw new \Error('Pas de token fourni :( ! ');
        $u=User::where('mobile_token','=',$request->mobile_token)->first();
        if(!$u)
            throw new \Error('Pas d\'utilisateur trouvé :( ! ');
        if(!$u->customer)
            throw new \Error('Utilisateur non customer');

        $delivery=Delivery::where('id',$request->delivery_id)->first();
        if(!$delivery)
            throw new \Error('Delivery non trouvée :( !');

        if(!$delivery->takeOverDelivery)
            throw new \Error('Prise en charge non trouvée :( !');
        $driver=Driver::find($delivery->takeOverDelivery->driver->id);

        if(!$driver)
            throw new \Error('Driver non retrouvé :( !');
        $r=new Rating;
        $r->driver_id=$driver->id;
        $r->delivery_id=$delivery->id;
        $r->rating=$request->rating;
        if(!$request->details)
            $request->details="";
        $r->details=$request->details;
        $r->customer_id=$u->customer->id;
        $r->save();


        return($r);
    }


    //envoie d'une dispute delivery
    public function disputeDelivery(Request $request){
        $u=User::where('mobile_token','=',$request->mobile_token)->first();
        if(!$u)
            throw new \Error('Pas d\'utilisateur trouvé :( ! ');
        if(!$u->customer)
            throw new \Error('Utilisateur non customer');

        $delivery=Delivery::where('id',$request->delivery_id)->first();
        if(!$delivery)
            throw new \Error('Delivery non trouvée :( !');
        if($delivery->customer_id!=$u->customer->id)
            throw new \Error('User n\'a pas les droits de dispute sur cette delivery :( !');
        if(!$delivery->takeOverDelivery)
            throw new \Error('Prise en charge non trouvée :( !');
        $d=new Dispute;
        $d->take_over_deliveries=$delivery->takeOverDelivery->id;
        $d->reason=$request->reason;
        $d->save();
        return $d;
    }



}
