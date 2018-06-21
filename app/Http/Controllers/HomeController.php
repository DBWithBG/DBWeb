<?php

namespace App\Http\Controllers;

use App\AuthorizedDepartment;
use App\Customer;
use App\Delivery;
use App\Driver;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        return redirect('backoffice/deliveries/inProgress');
        //return view('home');
    }


    public function getProfile(Request $request){
        $request=self::checkCustomerMobile($request);


        $customer=Customer::find($request->customer_id);

        if(!$customer)
            throw new \Error('Customer non trouve');
        return view('customer.profile')->with(compact('customer'));
    }


    //methode permettant de recuperer le customer id d'un customer a partir de son mobile token et de le mettre dans la requete
    public static function checkCustomerMobile(Request $request){
        if(isset($request->mobile_token)){
            $u=User::where('mobile_token','=',$request->mobile_token)->first();
            if(!$u)
                throw new \Error('Pas d\'utilisateur trouvé :( ! ');

            if(!$u->customer)
                throw new \Error('Utilisateur non customer');

            $request->input('customer_id', $u->customer->id);
        }
        return $request;
    }

}
