<?php

namespace App\Http\Controllers;

use App\AuthorizedDepartment;
use App\Delivery;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        //TODO ERROR
        return abort(400);
    }

    public function resendConfirmationEmail() {
        $user = Auth::user();
        $customer = $user->customer;

        // Envoyer le mail de confirmation
        $token = bin2hex(random_bytes(78));
        $customer->user->email_confirmation_token = $token;
        $customer->user->save();
        MailController::confirm_customer_email_address($customer, $token);

        Session::flash('success', 'Un mail de confirmation vient de vous être envoyé');
        return redirect()->back();
    }

    public function historique() {
        $user = Auth::user();
        $customer = $user->customer;

        $deliveries = $customer->deliveries;

        return view('customer.historique')->with(['deliveries' => $deliveries]);
    }

    public function profil() {
        $user = Auth::user();
        $customer = $user->customer;

        return view('customer.profil')->with(['customer' => $customer]);
    }

    /**
     * Mise à jour des infos persos du customer
     */
    public function update(Request $request) {
        $user = Auth::user();
        $customer = $user->customer;

        $v = Validator::make($request->all(), [
            'name' => 'required',
            'surname' => 'required',
            'phone' => 'nullable|numeric'
        ], [
            'name.required' => 'Merci de fournir votre nom et votre prénom',
            'surname.required' => 'Merci de fournir votre nom et votre prénom',
            'phone.numeric' => "Le numéro de téléphone est invalide"
        ]);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v);
        }

        $customer->update($request->all());
        $customer->save();

        Session::flash('success', 'Vos informations personnelles ont été mises à jour');
        return redirect()->back();
    }

    public function modificationEmail() {
        $user = Auth::user();
        $customer = $user->customer;

        return view('customer.modificationEmail')->with(['customer' => $customer]);
    }

    public function updateEmail(Request $request) {
        $user = Auth::user();
        $customer = $user->customer;

        $v = Validator::make($request->all(), [
            'email' => 'required|email|unique:users'
        ], [
            'email.required' => 'Une nouvelle adresse mail est nécessaire',
            'email.email' => 'L\'adresse mail est invalide',
            'email.unique' => 'Cette adresse email est déjà utilisée'
        ]);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v);
        }

        $customer->user->email = $request->email;
        $token = bin2hex(random_bytes(78));
        $customer->user->email_confirmation_token = $token;
        $customer->user->is_confirmed = false;
        $customer->user->save();


        MailController::confirm_customer_email_address($customer, $token);

        Session::flash('success', 'Votre adresse mail a été modifiée');
        return redirect()->back();
    }

    public function modificationMotDePasse() {
        $user = Auth::user();
        $customer = $user->customer;

        return view('customer.modificationMotDePasse')->with(['customer' => $customer]);
    }

    function updatePassword(Request $request) {
        $user = Auth::user();

        $v = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required',
            'new_password_again' => 'required'
        ], [
            'current_password.required' => 'Merci de fournir votre mot de passe actuel',
            'new_password.required' => 'Merci de fournir votre nouveau mot de passe',
            'new_password_again.required' => 'Merci de fournir la confirmation de votre nouveau mot de passe'
        ]);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v);
        }

        $current_password = $request->current_password;
        $new_password = $request->new_password;
        $new_password_again = $request->new_password_again;

        if (!Hash::check($current_password, $user->password)) {
            return redirect()->back()->withErrors(['Mot de passe actuel invalide']);
        }

        if ($new_password != $new_password_again) {
            return redirect()->back()->withErrors(['Les deux mots de passe ne correspondent pas']);
        }

        $user->password = Hash::make($new_password);
        $user->save();

        Session::flash('success', 'Votre mot de passe a été modifié');
        return redirect()->back();
    }

    public function comment(Request $request) {
        $user = Auth::user();
        $customer = $user->customer;

        $delivery_id = $request->get('delivery_id', -1);
        $delivery = Delivery::findOrFail($delivery_id);

        if ($delivery->customer_id != $customer->id) {
            abort(403);
        }

        $delivery->comment = $request->get('comment', '');
        $delivery->save();

        Session::flash('success', 'Votre commentaire a bien été pris en compte');
        return redirect()->back();

    }



}
