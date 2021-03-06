<?php

namespace App\Http\Controllers;

use App\Delivery;
use App\Dispute;
use App\InfoBag;
use App\Justificatif;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Validator;

class DriverController extends Controller
{
    //Deprecated, remplacée par une inscription commune
    public function getRegister(){
        return view('driver.register');
    }

    //partage de la page de login des customers et des drivers
    public function login() {
        return view('customer.login');
    }

    //Page d'accueil des driver
    public function home(){
        $driver = Auth::user()->driver;
        return view('driver.home', ['driver' => $driver]);
    }

    //Post des informations du driver
    public function update(Request $request) {
        $driver = Auth::user()->driver;

        $v = Validator::make($request->all(), [
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'siret' => 'nullable|digits_between:14,14',
            'phone' => 'nullable|numeric'
        ], [
            'name.required' => 'Le champ nom est requis',
            'surname.required' => 'Le champ prénom est requis',
            'email.required' => 'Le champ email est requis',
            'email.email' => 'L\'adresse mail est invalide',
            'siret.digits_between' => 'Le numéro de SIRET est invalide. Celui-ci doit être composé de 14 chiffres'
        ]);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v);
        } else {
            $driver->update($request->all());
            // Le siret passe passe dans le update...
            $driver->siret = $request->siret;
            $driver->user->email = $request->email;
            $driver->user->save();
            $driver->save();
            return redirect()->back()->with(['success' => 'Vos informations ont été mises à jour']);
        }

    }

    //Get des take over deliveries du chauffeur
    public function deliveries(){
        $user = Auth::user();
        $driver = $user->driver;
        $take_over_deliveries = $driver->takeOverDeliveries;

        return view('driver.deliveries')->with([
            'take_over_deliveries' => $take_over_deliveries,
        ]);
    }

    //Ajout d'une pièce justificative au chauffeur
    public function addJustificatif(Request $request) {
        $driver = Auth::user()->driver;

        // On vérifie la présence du fichier
        if (!$request->hasFile('justificatif')) {
            return redirect()->back()->withErrors(['Aucun fichier fourni']);
        }

        // La présence du nom
        $v = Validator::make($request->all(), [
            'name' => 'required'
            ], [
           'name.required' => 'Le nom de la pièce justificative est requis'
        ]);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v);
        }

        // Le type du fichier
        $file = $request->file('justificatif');
        $extension = $file->getClientOriginalExtension();
        if (!in_array($extension, ['jpg', 'jpeg', 'png', 'pdf'])) {
            return redirect()->back()->withErrors(['Ce type de fichier n\'est pas supporté. Les extensions supportées sont les suivantes : jpg, png, pdf']);
        }

        // On enregistre
        $path = $file->store('justificatifs');
        $justificatif = new Justificatif;
        $justificatif->driver_id = $driver->id;
        $justificatif->name = $request->name;
        $justificatif->file_path = $path;
        $justificatif->save();

        return redirect()->back()->with(['success' => 'Pièce justificative ajoutée']);

    }

    //Suppression d'un justificatif
    public function deleteJustificatif($id) {
        $user = Auth::user();
        $driver = $user->driver;
        $justificatif = Justificatif::findOrFail($id);

        // Si le user est un driver, il faut que le justi lui appartienne et que le justi n'est pas été validé
        if ($driver !== null) {
            if ($driver->id != $justificatif->driver_id) {
                return abort(404);
            }

            if ($justificatif->is_valide) {
                return abort(400);
            }
        }

        else {
            return abort(404);
        }



        Storage::delete($justificatif->file_path);
        $justificatif->delete();
        return redirect()->back()->with(['success' => 'Pièce justificative supprimée']);
    }

    //Récuparétion de la vue d'un justificatif
    public function viewJustificatif($id) {
        $user = Auth::user();
        $driver = $user->driver;
        $justificatif = Justificatif::findOrFail($id);

        // Si le user est un driver, il faut que le justi lui appartienne
        if ($driver !== null) {
            if ($driver->id != $justificatif->driver_id) {
                return abort(404);
            }
        }

        // Si user n'est pas un admin
        else if (!$user->admin) {
            return abort(404);
        }

        $file = Storage::get($justificatif->file_path);
        $mimetype = \GuzzleHttp\Psr7\mimetype_from_filename($justificatif->file_path);
        return response($file, 200)->header('Content-Type', $mimetype);
    }

    //Confirmation de l'email d'un driver
    public function confirmEmail(Request $request) {
        $email = $request->email;
        $token = $request->token;
        $user = User::where('email', $email)->first();
        if ($user->email_confirmation_token == $token) {
            $user->is_confirmed = true;
            $user->save();
            return redirect('/')->with(['success' => 'Votre adresse mail a été confirmée']);
        }
        return abort(400);
    }

    //Renvoi de l'email de confirmation d'un driver
    public function resendConfirmationEmail() {
        $user = Auth::user();
        $driver = $user->driver;

        // Envoyer le mail de confirmation
        $token = bin2hex(random_bytes(78));
        $driver->user->email_confirmation_token = $token;
        $driver->user->save();
        MailController::confirm_driver_email_address($driver, $token);

        return redirect()->back()->with(['success' => 'Un mail de confirmation vient de vous être envoyé']);
    }

    public function litiges($id) {
        $user = Auth::user();
        $driver = $user->driver;

        $delivery = Delivery::findOrFail($id);
        if ($delivery->takeOverDelivery == null) {
            return abort(400);
        }

        if ($delivery->takeOverDelivery->driver_id != $driver->id) {
            return abort(404);
        }

        return view('driver.litiges')->with(['delivery' => $delivery]);
    }

    //Post de la création d'un litige
    public function newLitige($id, Request $request) {
        $user = Auth::user();
        $driver = $user->driver;

        $delivery = Delivery::findOrFail($id);
        if ($delivery->takeOverDelivery == null) {
            return abort(400);
        }

        if ($delivery->customer_id != $driver->id) {
            return abort(404);
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

        $litige = new Dispute;
        $litige->title = $request->get('title', '');
        $litige->reason = $request->get('reason', '');
        $litige->take_over_delivery_id = $delivery->takeOverDelivery->id;
        $litige->is_customer = false;
        $litige->status = 'Ouvert';
        $litige->save();

        Session::flash('success', 'Votre litige a bien été enregistré');
        return redirect()->back();
    }

}
