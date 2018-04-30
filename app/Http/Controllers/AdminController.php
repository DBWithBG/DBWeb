<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin')->except(['login', 'getForgotpassword']);
    }


    public function login(){
        return view('admin.login.login');
    }

    public function getForgotPassword(){
        return view('admin.login.password')
    }

}
