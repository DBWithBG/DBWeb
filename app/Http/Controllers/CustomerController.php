<?php

namespace App\Http\Controllers;

use App\AuthorizedDepartment;
use App\Bag;
use App\Delivery;
use App\Dispute;
use App\Rating;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Validator;

class CustomerController extends Controller
{
    //Accueil pour les customers
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

    //Formulaire de contact
    public function contact() {
        return view('customer.contact');
    }

    //Envoi du formulaire de contact
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

    //Inscription pour le chauffeur et le client
    public function inscription(){
        return view('customer.inscription_commune');
    }

    //Connexion commune chauffeur et client
    public function connexion(){
        return view('customer.login');
    }

    //Récupération des départements
    public function ajaxDepartments(){
        return AuthorizedDepartment::all();
    }

    //Quand clique de la confirmation d'email, on valide le compte
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

    //Renvoi d'une nouvelle confirmation par email
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

    //Récuparation de la page d'historique des courses de l'utilisateur connecté
    public function historique() {
        $user = Auth::user();
        $customer = $user->customer;

        $deliveries = $customer->deliveries;
        $takeOverDeliveries = [];
        foreach ($deliveries as $delivery) {
            if ($delivery->takeOverDelivery != null) {
                array_push($takeOverDeliveries, $delivery);
            }
        }

        return view('customer.historique')->with([
            'deliveries' => $deliveries,
            'takeOverDeliveries' => $takeOverDeliveries
        ]);
    }

    //Récupération de la page d'accueil du profil utilisateur
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

    //Get du formulaire de changement d'email
    public function modificationEmail() {
        $user = Auth::user();
        $customer = $user->customer;

        return view('customer.modificationEmail')->with(['customer' => $customer]);
    }

    //Post du changement d'email
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

    //get du formulaire de modification de mot de passe
    public function modificationMotDePasse() {
        $user = Auth::user();
        $customer = $user->customer;

        return view('customer.modificationMotDePasse')->with(['customer' => $customer]);
    }

    //Post du changement de mot de passe
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

    //Post du commentaire d'une delivery
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

    //Get de la modale de commentaire d'une delivery
    public function modalComment($id) {
        $user = Auth::user();
        $customer = $user->customer;

        $delivery = Delivery::findOrFail($id);

        if ($delivery->customer_id != $customer->id) {
            abort(403);
        }

        return view('customer.modalComment')->with(['delivery' => $delivery]);
    }

    //get de la modal de notation d'une course
    public function modalRating($id) {
        $user = Auth::user();
        $customer = $user->customer;

        $delivery = Delivery::findOrFail($id);

        if ($delivery->customer_id != $customer->id) {
            abort(403);
        }

        return view('customer.modalRating')->with(['delivery' => $delivery]);
    }


    //Post de la notation d'une course (modification + création)
    public function rate(Request $request) {
        $user = Auth::user();
        $customer = $user->customer;

        $delivery = Delivery::findOrFail($request->get('delivery_id', -1));

        if ($delivery->customer_id != $customer->id || $delivery->takeOverDelivery == null) {
            return abort(400);
        }

        if ($delivery->rating == null) {
            $rating = new Rating;
            $rating->delivery_id = $delivery->id;
            $rating->driver_id = $delivery->takeOverDelivery->driver_id;
            $rating->customer_id = $delivery->customer_id;
        } else {
            $rating = $delivery->rating;
        }

        $rating->rating = $request->rating * 10;
        $rating->details = $request->comment;
        $rating->save();

        Session::flash('success', 'Votre note a été prise en compte');
        return redirect()->back();

    }

    //Get litige
    public function litiges($id) {
        $user = Auth::user();
        $customer = $user->customer;

        $delivery = Delivery::findOrFail($id);
        if ($delivery->customer_id != $customer->id) {
            return abort(404);
        }

        if ($delivery->takeOverDelivery == null) {
            return abort(400);
        }

        return view('customer.litiges')->with(['delivery' => $delivery]);
    }

    //Post Litige
    public function newLitige($id, Request $request) {
        $user = Auth::user();
        $customer = $user->customer;

        $delivery = Delivery::findOrFail($id);
        if ($delivery->customer_id != $customer->id) {
            return abort(404);
        }

        if ($delivery->takeOverDelivery == null) {
            return abort(400);
        }

        $v = Validator::make($request->all(), [
            'title' => 'required',
            'reason' => 'required',
        ], [
            'title.required' => 'Merci de donner un titre à votre litige',
            'reason.required' => 'Merci de fournir une description de votre litige'
        ]);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v);
        }

        if (Carbon::parse($delivery->start_date)->addDays(1) < Carbon::now()) {
            return redirect()->back()->withErrors(['Vous ne pouvez déclarer de litige que pendant les 24 heures suivants la course']);
        }

        $litige = new Dispute;
        $litige->title = $request->get('title', '');
        $litige->reason = $request->get('reason', '');
        $litige->take_over_delivery_id = $delivery->takeOverDelivery->id;
        $litige->is_customer = true;
        $litige->status = 'Ouvert';
        $litige->save();

        Session::flash('success', 'Votre litige a bien été enregistré');
        return redirect()->back();
    }

    //Fermeture d'un litige
    public function closeLitige($id, Request $request) {
        $user = Auth::user();
        $customer = $user->customer;

        $delivery = Delivery::findOrFail($id);
        $dispute = Dispute::findOrFail($request->get('dispute_id', -1));

        if ($delivery->customer_id != $customer->id) {
            return abort(404);
        }

        if ($delivery->takeOverDelivery == null) {
            return abort(400);
        }

        if ($delivery->takeOverDelivery->id != $dispute->take_over_delivery_id) {
            return abort(400);
        }

        $dispute->status = 'Fermé';
        $dispute->save();

        Session::flash('success', 'Le litige a été fermé');
        return redirect()->back();

    }

    //Get bagages
    public function bagages() {
        $user = Auth::user();
        $customer = $user->customer;

        $bags = $customer->bags;

        return view('customer.bagages')->with(['bags' => $bags]);
    }

    //Post bagage
    public function addBagage(Request $request) {
        $user = Auth::user();
        $customer = $user->customer;

        $v = Validator::make($request->all(), [
            'name' => 'required',
            'details' => 'nullable',
            'type' => 'required|exists:type_bags,id',
        ], [
            'name.required' => 'Merci de donner un nom à votre bagage',
            'type.required' => 'Merci de choisir un type de bagage'

        ]);

        Log::debug('Type : ' . $request->type);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v);
        }

        $bag = new Bag;
        $bag->customer_id = $customer->id;
        $bag->name = $request->name;
        $bag->details = $request->details;
        $bag->type_id = $request->type;
        $bag->save();

        Session::flash('success', 'Le bagage a été ajouté');
        return redirect()->back();
    }

    //Suppression d'un bagage
    public function deleteBagage(Request $request, $id) {
        $user = Auth::user();
        $customer = $user->customer;

        $bag = Bag::findOrFail($id);

        if ($bag->customer_id != $customer->id) {
            return abort(400);
        }

        $bag->delete();

        Session::flash('success', 'Le bagage a été supprimé');
        return redirect()->back();
    }

    public function showEditBag($id){
        $user = Auth::user();
        $customer = $user->customer;

        $bag = Bag::findOrFail($id);

        if ($bag->customer_id != $customer->id) {
            abort(403);
        }

        return view('customer.modalEditBag')->with(['bag' => $bag]);
    }


    public function editBagage(Request $request, $id){
        $user = Auth::user();
        $customer = $user->customer;

        $bag = Bag::find($id);
        if($customer->id == $bag->customer_id){
            $bag->name = $request->name;
            $bag->details = $request->details;
            $bag->save();
            Session::flash('success', 'Le bagage a été modifié');
        }else{
            Session::flash('success', 'Bagage introuvable');
        }
        return redirect()->back();

    }

}
