<?php

namespace App\Http\Controllers;

use App\Delivery;
use Illuminate\Http\Request;

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
        return view('home');
    }

    //get deliveries pour debloquer donovan en attendant
    public function getDeliveries(){
        return(Delivery::with('customer')->with('startPosition')->with('endPosition')->get()->toJson());
    }


}
