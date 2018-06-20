<?php

namespace App\Http\Controllers;

use App\Justificatif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Validator;

class DriverController extends Controller
{
    //

    public function getRegister(){
        return view('driver.register');
    }

    public function login() {
        return view('customer.login');
    }

    public function home(){
        $driver = Auth::user()->driver;
        return view('driver.home', ['driver' => $driver]);
    }

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

    public function deliveries(){
        $take_over_deliveries = Auth::user()->driver->takeOverDeliveries;
        return view('driver.deliveries')->with([
            'take_over_deliveries' => $take_over_deliveries,
        ]);
    }

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
}
