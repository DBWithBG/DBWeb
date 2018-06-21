<?php

namespace App\Http\Controllers\phone;

use App\AuthorizedDepartment;
use App\Bag;
use App\Customer;
use App\Delivery;
use App\Driver;
use App\Http\Controllers\Controller;
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
        if($del->status==1){
            $take=new TakeOverDelivery;
            $take->driver_id=$u->driver->id;
            $take->status=0;
            $take->delivery_id=$del->id;
            $take->actual_position_id=null;
            $take->save();
            $del->update(['status'=>2]);
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

        return json_encode(Bag::where('customer_id','=',$u->customer->id)->get());
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
        foreach($request['bagages'] as $cate=>$bs){
            foreach($bs as $b){
                if(isset($b->id)){
                    Bag::find($b->id)->update($b)->restore();
                }else{
                    $b=new Bag;
                    $b->name=$b->name;
                    if(isset($b->descr))
                        $b->details=$b->descr;
                    else
                        $b->details="";
                }
            }
        }
    }



}
