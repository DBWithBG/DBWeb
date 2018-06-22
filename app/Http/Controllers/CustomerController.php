<?php

namespace App\Http\Controllers;

use App\AuthorizedDepartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Validator;

class CustomerController extends Controller
{
    public function home(){
        if(Auth::check() && Auth::user()->admin){
            return redirect('backoffice/home');
        }
        if(!empty(Auth::user()->driver->id)){
            return redirect('driver/home');
        }
        return view('customer.home')->with([

        ]);
    }

    public function contact() {
        return view('customer.contact');
    }

    public function postContact(Request $request) {
        $v = Validator::make($request->all(), [
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ], [
            'name.required' => 'Merci de fournir votre nom et votre prénom',
            'surname.required' => 'Le champ prénom est requis',
            'email.required' => 'Votre adresse mail est requise',
            'email.email' => 'L\'adresse mail est invalide',
            'message.required' => "Votre message est vide"
        ]);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v);
        }

        MailController::contact_email($request->name, $request->surname, $request->email, $request->message);
        Session::flash('success', 'Votre message a bien été envoyé');
        return redirect()->back();

    }

    public function inscription(){
        return view('customer.inscription');
    }


    public function connexion(){
        return view('customer.login');
    }

    public function ajaxDepartments(){
        return AuthorizedDepartment::all();
    }



}
