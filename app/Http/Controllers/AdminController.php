<?php

namespace App\Http\Controllers;

use App\AuthorizedDepartment;
use App\Customer;
use App\Delivery;
use App\Dispute;
use App\Driver;
use App\Http\Controllers\phone\MobileController;
use App\Http\Controllers\phone\NotificationController;
use App\Justificatif;
use App\TypeBag;
use CiroVargas\GoogleDistanceMatrix\GoogleDistanceMatrix;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
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
    public function login(){

        return view('admin.login.login');
    }

    public function getForgotPassword(){
        return view('admin.login.password');
    }

    public function home(){
        if(Auth::check()) return redirect('backoffice/deliveries/inProgress');
        else return redirect('backoffice/login');
    }

    /*************** Customers ***************/

    public function getCustomers(){
        $customers = Customer::where('deleted', '0')->get();
        return view('admin.customer.customers')->with([
            'customers' => $customers
        ]);
    }

    public function getCustomer($id) {
        $customer = Customer::findOrFail($id);
        return view('admin.customer.customer')->with(['customer' => $customer]);
    }

    public function updateCustomer(Request $request, $id) {


        $customer = Customer::findOrFail($id);
        //on verifie que la requete fournie contient le mobile_token du customer
        if(!MobileController::checkToken($customer->user->mobile_token,$request))
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

    public function deleteCustomer(Request $request){
        $customer = Customer::find($request->id);
        if($customer){
            $customer->deleted = true;
            $customer->save();
        }
        return $customer;
    }


    /*************** DRIVERS ***************/

    public function getDrivers(){
        $drivers = Driver::where('deleted', '0')->get();
        return view('admin.driver.drivers')->with([
            'drivers' => $drivers
        ]);
    }

    public function getDriver($id) {
        $driver = Driver::findOrFail($id);
        return view('admin.driver.driver')->with(['driver' => $driver]);
    }

    public function validateDriver($id) {
        $driver = Driver::findOrFail($id);
        $driver->is_op = true;
        $driver->save();
        return redirect()->back()->with(['success' => 'Le chauffeur a été validé']);
    }

    public function validateDriverJustificatif($idDriver, $idJustificatif) {
        $driver = Driver::findOrFail($idDriver);
        $justificatif = Justificatif::findOrFail($idJustificatif);

        if ($justificatif->driver_id != $driver->id) {
            return abort(400);
        }

        $justificatif->is_valide = true;
        $justificatif->save();

        return redirect()->back()->with(['success' => 'La pièce justificative a été validée']);
    }

    public function revokeDriver($id) {
        $driver = Driver::findOrFail($id);
        $driver->is_op = false;
        $driver->save();
        return redirect()->back()->with(['success' => 'Le chauffeur a été invalidé']);
    }

    public function revokeDriverJustificatif($idDriver, $idJustificatif) {
        $driver = Driver::findOrFail($idDriver);
        $justificatif = Justificatif::findOrFail($idJustificatif);

        if ($justificatif->driver_id != $driver->id) {
            return abort(400);
        }

        $justificatif->is_valide = false;
        $justificatif->save();

        return redirect()->back()->with(['success' => 'La pièce justificative a été invalidée']);
    }

    public function deleteDriver(Request $request){
        $driver = Driver::find($request->id);
        if($driver){
            $driver->deleted = true;
            $driver->save();
        }
    }

    public function updateDriver(Request $request, $id) {
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


    public function getDisputesOuvertes(){
        $disputes = Dispute::where('status', '=', 'Ouvert')->get();
        return view('admin.dispute.disputes')->with([
            'disputes' => $disputes
        ]);
    }

    public function getDisputesFermees(){
        $disputes = Dispute::where('status', '=', 'Fermé')->get();
        return view('admin.dispute.disputes')->with([
            'disputes' => $disputes
        ]);
    }

    public function deleteDispute(Request $request){
        $dispute = Dispute::findOrFail($request->id);
        $dispute->delete();

        Session::flash('success', 'La dispute a été supprimé');
        return redirect()->back();
    }

    public function dispute($id) {
        $dispute = Dispute::FindOrFail($id);

        return view('admin.dispute.dispute')->with(['dispute' => $dispute]);
    }

    public function update($id, Request $request) {
        $dispute = Dispute::FindOrFail($id);

        $dispute->update($request->all());
        $dispute->save();

        Session::flash('success', 'La dispute a été mise à jour');
        return redirect()->back();
    }


    public function getDeliveriesInProgress(){
        $deliveries = Delivery::getAllDeliveryInProgress();
        return view('admin.delivery.deliveries_in_progress')->with([
            'deliveries' => $deliveries
        ]);
    }

    public function getDeliveriesPast(){
        $deliveries = Delivery::getAllDeliveryFinished();
        return view('admin.delivery.deliveries_past')->with([
            'deliveries' => $deliveries
        ]);
    }

    public function getDeliveriesUpComing(){
        $deliveries = Delivery::getAllDeliveryWaitingTakeOver();
        return view('admin.delivery.deliveries_up_coming')->with([
            'deliveries' => $deliveries
        ]);
    }

    public function deleteDelivery(Request $request){
        $delivery = Delivery::find($request->id);
        if($delivery){
            $delivery->deleted = true;
            $delivery->save();
        }
    }

    /***************** DEPARTMENTS ************************/
    public function getDepartments(){
        $departments = AuthorizedDepartment::all();
        return view('admin.config.departments')->with([
            'departments' => $departments
        ]);
    }

    public function addDepartment(Request $request){
        AuthorizedDepartment::create($request->toArray());
        return redirect()->back();
    }

    public function deleteDepartment(Request $request){
        $department = AuthorizedDepartment::find($request->id);
        AuthorizedDepartment::destroy($department->id);
        return $department;
    }
    /************************ END DEPARTMENTS *******************/

    public function getTypeBagages(){
        $typeBags = TypeBag::all();
        return view('admin.config.type_bagages')->with([
            'typeBags' => $typeBags
        ]);
    }

    public function addTypeBagages(Request $request){
        TypeBag::create($request->toArray());
        return redirect()->back();
    }

    public function deleteTypeBagages(Request $request){
        $typebag = TypeBag::find($request->id);
        TypeBag::destroy($typebag->id);
        return $typebag;
    }



    //Get vue des notifications
    public function getNotifications(){
        return view('admin.notification.create_notification');
    }

    //Envoi des notifications
    public function postNotifications(Request $request){
        $envoi = ['title'=>$request->titre,
            'body'=>$request->contenu,
            'datas'=>['url'=>'']];
        $tokens = [];
        if($request->customer){//On veut envoyer aux customers
            $customers = Customer::all();
            foreach($customers as $customer){
                $user = $customer->user;
                if(!empty($user->notify_token)){//On envoie qu'a ceux qui se sont connecté avec un téléphone
                    array_push($tokens, $user->notify_token);
                }
            }
        }
        if($request->driver){
            $drivers = Driver::all();
            foreach($drivers as $driver){
                $user = $driver->user;
                if(!empty($user->notify_token)){//On envoie qu'a ceux qui ont un token ok
                    array_push($tokens, $user->notify_token);
                }
            }
        }
        if(sizeof($tokens) == 0){
            Session::flash('error', 'Aucun utilisateur choisi pour envoyer la notification ou aucun utilisateur ne s\'est encore connecté sur mobile');
        }else{
            $envoi['tokens'] = $tokens;
            NotificationController::sendNotification($envoi);
            Session::flash('success', 'Notification envoyée à '.sizeof($envoi['tokens']).' comptes');
        }
        return redirect()->back();
    }

    //Affichage de la vue admin pour envoyer des emails groupés
    public function getEmails(){
       return view('admin.notification.create_email');
    }

    //Envoi de l'email groupé aux customers ou aux drivers (tous valides)
    public function postEmails(Request $request){
       if($request->customer){
            $retour = MailController::send_email_all_customers($request->subject, $request->html);
       }
       if($request->driver){
           $retour = MailController::send_email_all_drivers($request->subject, $request->html);
       }
        Session::flash('success', 'Vous venez d\'envoyer '.sizeof($retour). ' emails');
       return redirect()->back();
    }


}
