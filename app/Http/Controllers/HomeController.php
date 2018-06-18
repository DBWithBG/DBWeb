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
        return redirect('backoffice/home');
        //return view('home');
    }

}
