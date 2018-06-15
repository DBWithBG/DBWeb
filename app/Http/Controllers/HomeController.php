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
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //TODO RELANCER LA SECURE WAY
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('backoffice/home');
        //return view('home');
    }

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

    //get page de login mobile
    public function mobileLogin(Request $request){

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return $request->mobile_token;
        }else{
            return "pas ok";
        }

    }

    //get deliveries par client
    public function getDeliveriesByCustomers(){

        if(Input::get('mobile_token')){
            $u=User::where('mobile_token','=',Input::get('mobile_token'))->first();
            $deliveries=Delivery::where('customer_id','=',$u->customer->id)->groupBy('status')->get();
            return response()
                ->json($deliveries)
                ->setCallback(Input::get('callback'));
        }else{
            throw new \Error('Pas de token fourni :( ! ');
        }

    }

}
