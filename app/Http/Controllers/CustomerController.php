<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function home(){
        if(!empty(Auth::user()->driver->id)){
            return redirect('driver/home');
        }
        return view('customer.home');
    }

    public function inscription(){
        return view('customer.inscription');
    }


    public function connexion(){
        return view('customer.login');
    }

}
