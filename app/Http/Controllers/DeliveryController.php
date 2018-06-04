<?php

namespace App\Http\Controllers;

use App\Delivery;
use App\Position;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function postDelivery(Request $request){

        $request = $request->toArray();
        $start_position = Position::create($request['response']['start_position']);
        return $start_position->id;
        $end_position = Position::create($request['response']['end_position']);
        //TODO Calcul du statut selon l'heure envoyée
        $request['response']['delivery']['status'] = 'En cours';
        //TODO Calcul du prix
        $request['response']['delivery']['price'] = 10.00;
        $request['response']['delivery']['start_position_id'] = $start_position->id ;
        $request['response']['delivery']['start_position_id'] = $end_position->id ;
        $delivery = Delivery::create($request['response']['delivery']);

        return $delivery->id;

    }
}
