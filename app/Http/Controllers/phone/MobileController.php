<?php

namespace App\Http\Controllers;

use App\AuthorizedDepartment;
use App\Customer;
use App\Delivery;
use App\Driver;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

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
            if(empty($user->mobile_token)){//Première connexion depuis le mobile
                $user->mobile_token = $request->mobile_token;
                if(!empty($user->driver)) $user['driver'] = $user->driver;
                else $user['customer'] = $user->customer;
                $user->save();
            }
            return response()->json($user)->setCallback($request->input('callback'));
        }else{
            return "authentification failed";
        }

    }

    //get deliveries par client
    public function getDeliveriesByCustomers(){

        if(Input::get('mobile_token')){
            $u=User::where('mobile_token','=',Input::get('mobile_token'))->first();
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
        }else{
            throw new \Error('Pas de token fourni :( ! ');
        }

    }
}
