<?php

namespace App\Http\Controllers;

use App\AuthorizedDepartment;
use App\Customer;
use App\Delivery;
use App\Dispute;
use App\Driver;
use App\Http\Controllers\phone\MobileController;
use App\Justificatif;
use App\TypeBag;
use CiroVargas\GoogleDistanceMatrix\GoogleDistanceMatrix;
use Illuminate\Http\Request;
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
       //$this->middleware('admin')->except(['login', 'getForgotPassword']);
    }


    public function login(){

        return view('admin.login.login');
    }

    public function getForgotPassword(){
        return view('admin.login.password');
    }

    public function home(){
        return redirect('backoffice/deliveries/inProgress');
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


    public function getDisputes(){
        $disputes = Dispute::where('deleted', '0');
        return view('admin.dispute.disputes')->with([
            'disputes' => $disputes
        ]);
    }

    public function deleteDispute(Request $request){
        $dispute = Dispute::find($request->id);
        Dispute::destroy($dispute);
    }


    public function getDeliveriesInProgress(){
        $deliveries = Delivery::where('status', 'En cours')->where('deleted', 0)->get();
        return view('admin.delivery.deliveries_in_progress')->with([
            'deliveries' => $deliveries
        ]);
    }

    public function getDeliveriesPast(){
        $deliveries = Delivery::where('status', 'Passée')->where('deleted', 0)->get();
        return view('admin.delivery.deliveries_in_progress')->with([
            'deliveries' => $deliveries
        ]);
    }

    public function getDeliveriesUpComing(){
        $deliveries = Delivery::where('status', 'A venir')->where('deleted', 0)->get();
        return view('admin.delivery.deliveries_in_progress')->with([
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





}
