<?php

namespace App\Http\Controllers;

use App\Delivery;
use App\Position;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function postDelivery(Request $request){

        dd($request);
        $start_position = Position::create($request['start_position']);
        $end_position = Position::create($request['end_position']);
        //TODO Calcul du statut selon l'heure envoyée
        $request['response']['delivery']['status'] = 'En cours';
        //TODO Calcul du prix
        $request['response']['delivery']['price'] = 10.00;
        $request['response']['delivery']['start_position_id'] = $start_position->id ;
        $request['response']['delivery']['start_position_id'] = $end_position->id ;
        $delivery = Delivery::create($request['delivery']);

        return $delivery->id;

    }
}
