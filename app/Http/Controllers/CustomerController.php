<?php

namespace App\Http\Controllers;

use App\AuthorizedDepartment;
use App\User;
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

    public function confirmEmail(Request $request) {
        $email = $request->email;
        $token = $request->token;
        $user = User::where('email', $email)->first();
        if ($user->email_confirmation_token == $token) {
            $user->is_confirmed = true;
            $user->save();
            Session::flash('success', 'Votre adresse mail a été confirmée');
            return redirect('/');
        }
        return abort(400);
    }

    public function resendConfirmationEmail() {
        $user = Auth::user();
        $driver = $user->customer;

        // Envoyer le mail de confirmation
        $token = bin2hex(random_bytes(78));
        $driver->user->email_confirmation_token = $token;
        $driver->user->save();
        MailController::confirm_customer_email_address($driver, $token);

        Session::flash('success', 'Un mail de confirmation vient de vous être envoyé');
        return redirect()->back();
    }



}
