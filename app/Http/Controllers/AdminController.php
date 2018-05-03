<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Delivery;
use App\Dispute;
use App\Driver;
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
        $this->middleware('admin')->except(['login', 'getForgotPassword']);
    }


    public function login(){
        return view('admin.login.login');
    }

    public function getForgotPassword(){
        return view('admin.login.password');
    }

    public function home(){
        return view('admin.home');
    }

    public function getCustomers(){
        $customers = Customer::where('deleted', '0');
        return view('admin.customer.customers')->with([
            'customers' => $customers
        ]);
    }

    public function deleteCustomer(Request $request){
        $customer = Customer::find($request->id);
        if($customer){
            $customer->deleted = true;
            $customer->save();
        }
    }

    public function getDrivers(){
        $drivers = Driver::where('deleted', '0');
        return view('admin.driver.drivers')->with([
            'drivers' => $drivers
        ]);
    }

    public function deleteDriver(Request $request){
        $driver = Driver::find($request->id);
        if($driver){
            $driver->deleted = true;
            $driver->save();
        }
    }


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


}
