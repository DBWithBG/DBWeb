<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DriverController extends Controller
{
    //

    public function getRegister(){
        return view('driver.register');
    }

    public function home(){
        return view('driver.home');
    }

    public function deliveries(){
        $take_over_deliveries = Auth::user()->driver->takeOverDeliveries;
        return view('driver.deliveries')->with([
            'take_over_deliveries' => $take_over_deliveries,
        ]);
    }
}
