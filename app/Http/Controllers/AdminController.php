<?php

namespace App\Http\Controllers;

use App\AuthorizedDepartment;
use App\Customer;
use App\Delivery;
use App\Dispute;
use App\Driver;
use App\HistoriqueNotification;
use App\Http\Controllers\phone\MobileController;
use App\Http\Controllers\phone\NotificationController;
use App\Justificatif;
use App\Partner;
use App\Price;
use App\TypeBag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Validator;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin')->except(['login']);
    }


    /**
     * Doit outrepasser le middleware
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login()
    {

        return view('admin.login.login');
    }

    public function getForgotPassword()
    {
        return view('admin.login.password');
    }

    public function home()
    {
        if (Auth::check()) return redirect('backoffice/deliveries/inProgress');
        else return redirect('backoffice/login');
    }

    /*************** Customers ***************/

    public function getCustomers()
    {
        $customers = Customer::where('deleted', '0')->get();
        return view('admin.customer.customers')->with([
            'customers' => $customers
        ]);
    }

    public function getCustomer($id)
    {
        $customer = Customer::findOrFail($id);
        return view('admin.customer.customer')->with(['customer' => $customer]);
    }

    public function updateCustomer(Request $request, $id)
    {


        $customer = Customer::findOrFail($id);
        //on verifie que la requete fournie contient le mobile_token du customer
        if (!MobileController::checkToken($customer->user->mobile_token, $request))
            throw new \Error('Vous n\'avez pas le droit de modifier cet utilisateur');

        $v = Validator::make($request->all(), [
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'phone' => 'nullable|numeric'
        ], [
            'name.required' => 'Le champ nom est requis',
            'surname.required' => 'Le champ prénom est requis',
            'email.required' => 'Le champ email est requis',
            'email.email' => 'L\'adresse mail est invalide'
        ]);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v);
        } else {
            $customer->update($request->all());
            // Le siret passe passe dans le update...
            $customer->user->email = $request->email;
            $customer->user->save();
            $customer->save();
            return redirect()->back()->with(['success' => 'Les informations ont été mises à jour']);
        }
    }

    public function deleteCustomer(Request $request)
    {
        $customer = Customer::find($request->id);
        if ($customer) {
            $customer->deleted = true;
            $customer->save();
        }
        return $customer;
    }


    /*************** DRIVERS ***************/

    public function getDrivers()
    {
        $drivers = Driver::where('deleted', '0')->get();
        return view('admin.driver.drivers')->with([
            'drivers' => $drivers
        ]);
    }

    public function getDriver($id)
    {
        $driver = Driver::findOrFail($id);
        $historique = $driver->historique();
        return view('admin.driver.driver')->with(['driver' => $driver, 'historique' => $historique]);
    }

    public function getFactureDriver($id, $year, $month) {
        $driver = Driver::findOrFail($id);
        $sorted_deliveries = $driver->sortedDeliveries();

        // Si il n'existe pas de récap pour le mois voulu, on renvoie un code Bad Request
        if(!array_key_exists($year, $sorted_deliveries)) abort(400);
        if(!array_key_exists($month, $sorted_deliveries[$year])) abort(400);

        // Génération de la facture avec FactureController::genererFactureDriverMonth -> return path
        $path = FactureController::genererFactureDriverMonth($id, $year, $month);


        // On retourne le fichier grâce au path
        header('Content-Type: application/pdf');
        header('Content-Length: ' . filesize($path));
        readfile($path);
        return;
    }

    public function validateDriver($id)
    {
        $driver = Driver::findOrFail($id);
        $driver->is_op = true;
        $driver->save();
        return redirect()->back()->with(['success' => 'Le chauffeur a été validé']);
    }

    public function validateDriverJustificatif($idDriver, $idJustificatif)
    {
        $driver = Driver::findOrFail($idDriver);
        $justificatif = Justificatif::findOrFail($idJustificatif);

        if ($justificatif->driver_id != $driver->id) {
            return abort(400);
        }

        $justificatif->is_valide = true;
        $justificatif->save();

        return redirect()->back()->with(['success' => 'La pièce justificative a été validée']);
    }

    public function revokeDriver($id)
    {
        $driver = Driver::findOrFail($id);
        $driver->is_op = false;
        $driver->save();
        return redirect()->back()->with(['success' => 'Le chauffeur a été invalidé']);
    }

    public function revokeDriverJustificatif($idDriver, $idJustificatif)
    {
        $driver = Driver::findOrFail($idDriver);
        $justificatif = Justificatif::findOrFail($idJustificatif);

        if ($justificatif->driver_id != $driver->id) {
            return abort(400);
        }

        $justificatif->is_valide = false;
        $justificatif->save();

        return redirect()->back()->with(['success' => 'La pièce justificative a été invalidée']);
    }

    public function deleteDriver(Request $request)
    {
        $driver = Driver::find($request->id);
        if ($driver) {
            $driver->deleted = true;
            $driver->save();
        }
    }

    public function updateDriver(Request $request, $id)
    {
        $driver = Driver::findOrFail($id);

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
            return redirect()->back()->with(['success' => 'Les informations ont été mises à jour']);
        }
    }

    /*************** DISPUTES ***************/


    public function getDisputesOuvertes()
    {
        $disputes = Dispute::where('status', '=', 'Ouvert')->get();
        return view('admin.dispute.disputes')->with([
            'disputes' => $disputes
        ]);
    }

    public function getDisputesTraitement()
    {
        $disputes = Dispute::where('status', '=', 'En cours de traitement')->get();
        return view('admin.dispute.disputes')->with([
            'disputes' => $disputes
        ]);
    }

    public function getDisputesFermees()
    {
        $disputes = Dispute::where('status', '=', 'Fermé')->get();
        return view('admin.dispute.disputes')->with([
            'disputes' => $disputes
        ]);
    }

    public function deleteDispute(Request $request)
    {
        $dispute = Dispute::findOrFail($request->id);
        $dispute->delete();

        Session::flash('success', 'La dispute a été supprimé');
        return redirect()->back();
    }

    public function dispute($id)
    {
        $dispute = Dispute::FindOrFail($id);

        return view('admin.dispute.dispute')->with(['dispute' => $dispute]);
    }

    public function update($id, Request $request)
    {
        $dispute = Dispute::FindOrFail($id);

        $dispute->update($request->all());
        $dispute->save();

        Session::flash('success', 'La dispute a été mise à jour');
        return redirect('backoffice/disputes_ouvertes');
    }


    public function getDeliveriesInProgress()
    {
        $deliveries = Delivery::getAllDeliveryInProgress();
        return view('admin.delivery.deliveries_in_progress')->with([
            'deliveries' => $deliveries
        ]);
    }

    public function getDeliveriesPast()
    {
        $deliveries = Delivery::getAllDeliveryFinished();
        return view('admin.delivery.deliveries_past')->with([
            'deliveries' => $deliveries
        ]);
    }

    public function getDeliveriesUpComing()
    {
        $deliveries = Delivery::getAllDeliveryWaitingTakeOver();
        return view('admin.delivery.deliveries_up_coming')->with([
            'deliveries' => $deliveries
        ]);
    }

    public function deleteDelivery(Request $request)
    {
        $delivery = Delivery::find($request->id);
        if ($delivery) {
            $delivery->deleted = true;
            $delivery->save();
        }
    }

    /***************** DEPARTMENTS ************************/
    public function getDepartments()
    {
        $departments = AuthorizedDepartment::all();
        return view('admin.config.departments')->with([
            'departments' => $departments
        ]);
    }

    public function addDepartment(Request $request)
    {
        AuthorizedDepartment::create($request->toArray());
        return redirect()->back();
    }

    public function deleteDepartment(Request $request)
    {
        $department = AuthorizedDepartment::find($request->id);
        AuthorizedDepartment::destroy($department->id);
        return $department;
    }

    /************************ END DEPARTMENTS *******************/

    /***************** PRICES ************************/
    public function oldPrice(Request $request) {
        $prices = Price::all();
        foreach ($prices as $price){
            $price->delete();
            $price->save();
        }
        Price::create($request->toArray());
        return redirect()->back();
    }

    public function getOldPrices() {
        $price = Price::all()->first();
        return view('admin.config.prices_att')->with(['price' => $price]);
    }


    public function getPrice()
    {
        $prices = Price::all();
        return view('admin.config.prices')->with([
            'prices' => $prices
        ]);
    }

    public function addPrice(Request $request)
    {
        $request_tab = $request->toArray();
        if($request->promotion){
            $request_tab['promotion'] = true;
        }else{
            $request_tab['promotion'] = false;
        }
        Price::create($request_tab);
        return redirect('backoffice/configuration/prices#rowPrices');
    }

    public function deletePrice(Request $request)
    {
        $price = Price::find($request->id);
        Price::destroy($price->id);
        return $price;
    }

    /************************ END PRICES *******************/

    public function getTypeBagages()
    {
        $typeBags = TypeBag::all();
        return view('admin.config.type_bagages')->with([
            'typeBags' => $typeBags
        ]);
    }

    public function addTypeBagages(Request $request)
    {
        TypeBag::create($request->toArray());
        return redirect()->back();
    }

    public function deleteTypeBagages(Request $request)
    {
        $typebag = TypeBag::find($request->id);
        TypeBag::destroy($typebag->id);
        return $typebag;
    }

    public function deleteDeliveries(Request $request)
    {
        $delivery = Delivery::find($request->id);
        Delivery::destroy($delivery->id);
        return $delivery;
    }


    //Get vue des notifications
    public function getNotifications()
    {
        return view('admin.notification.create_notification');
    }

    //Envoi des notifications
    public function postNotifications(Request $request)
    {
        $historique = new HistoriqueNotification();
        $historique->titre = $request->titre;
        $historique->contenu = $request->contenu;
        $historique->createur = Auth::user()->name;
        $historique->moyen = 'Notification application téléphone';
        $envoi = ['title' => $request->titre,
            'body' => $request->contenu,
            'datas' => ['url' => '']];
        $tokens = [];

        if ($request->customer) {//On veut envoyer aux customers
            $historique->cible = 'Clients ';
            $customers = Customer::all();
            foreach ($customers as $customer) {
                $user = $customer->user;
                if (!empty($user->notify_token)) {//On envoie qu'a ceux qui se sont connecté avec un téléphone
                    array_push($tokens, $user->notify_token);
                }
            }
        }
        if ($request->driver) {
            $historique->cible .= 'Chauffeurs';
            $drivers = Driver::all();
            foreach ($drivers as $driver) {
                $user = $driver->user;
                if (!empty($user->notify_token)) {//On envoie qu'a ceux qui ont un token ok
                    array_push($tokens, $user->notify_token);
                }
            }
        }
        if (sizeof($tokens) == 0) {
            Session::flash('error', 'Aucun utilisateur choisi pour envoyer la notification ou aucun utilisateur ne s\'est encore connecté sur mobile');
        } else {
            $envoi['tokens'] = $tokens;
            NotificationController::sendNotification($envoi);
            $historique->hits = sizeof($envoi['tokens']);
            $historique->save();
            Session::flash('success', 'Notification envoyée à ' . sizeof($envoi['tokens']) . ' comptes');
        }
        return redirect()->back();
    }

    //Affichage de la vue admin pour envoyer des emails groupés
    public function getEmails()
    {
        return view('admin.notification.create_email');
    }

    //Envoi de l'email groupé aux customers ou aux drivers (tous valides)
    public function postEmails(Request $request)
    {
        $historique = new HistoriqueNotification();
        $historique->titre = $request->subject;
        $historique->contenu = $request->html;
        $historique->createur = Auth::user()->name;
        $historique->moyen = 'Emails';
       if ($request->customer) {
           $historique->cible = 'Clients ';
           $retour = MailController::send_email_all_customers($request->subject, $request->html);
       }
       if ($request->driver) {
           $historique->cible .= 'Chauffeurs';
           $retour = MailController::send_email_all_drivers($request->subject, $request->html);
       }
       if(!empty($retour['tokens'])) $historique->hits = sizeof($retour['tokens']);
       else $historique->hits = 0;
       $historique->save();
       Session::flash('success', 'Vous venez d\'envoyer ' . sizeof($retour) . ' emails');
       return redirect()->back();
    }

    public function getHistoriqueEnvoi(Request $request){
        $historiques = HistoriqueNotification::all();
        return view('admin.notification.historique')->with([
            'historiques'=>$historiques
        ]);
    }

    /****************** PARTNERS ************************/
    public function getPartners(){
        return view('admin.partner.partners');
    }

    public function addPartner(Request $request){
        $partner = new Partner();
        $partner->name = $request->name;
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $partner->logo = $file->store('logos');
        }
        $partner->save();

        return redirect('backoffice/partners');
    }

    public function testPaybox(){
        $authorizationRequest = \App::make(\Devpark\PayboxGateway\Requests\AuthorizationWithCapture::class);

        return $authorizationRequest->setAmount(1)->setCustomerEmail('simon@sup.sarl')
            ->setPaymentNumber(1)->send('paybox.send');
    }
}
