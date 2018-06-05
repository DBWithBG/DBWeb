<?php

namespace App\Http\Controllers;

use App\Delivery;
use App\Position;
use App\TakeOverDelivery;
use CiroVargas\GoogleDistanceMatrix\GoogleDistanceMatrix;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeliveryController extends Controller
{
    public function postDelivery(Request $request){

        $request = $request->toArray();
        $start_position = Position::create($request['response']['start_position']);
        $end_position = Position::create($request['response']['end_position']);
        //TODO Calcul du statut selon l'heure envoyée
        $request['response']['delivery']['status'] = 'En cours';
        //TODO Calcul du prix
        /******* CALCUL DU PRIX ************/
        $distanceMatrix = new GoogleDistanceMatrix('AIzaSyDOS-liFW3p5AkwwvO9XlFY8YimZJjpPmE');
        $distance = $distanceMatrix->setLanguage('fr')
            ->addOrigin($start_position->lat.', '.$start_position->lng)
            ->addDestination($end_position->lat.', '.$end_position->lng)
            ->sendRequest();
        $request['response']['delivery']['distance'] = explode(' ', $distance->getRows()[0]->getElements()[0]->getDistance()->getText())[0];
        $time = $distance->getRows()[0]->getElements()[0]->getDuration()->getText();
        $time = explode(' ', $time);
        if(sizeof($time) <4){ // 37 min
            $time = $time[0];
        }else{//1 heures 37 min
            $time = $time[0]*60 + $time[2];
        }
        $request['response']['delivery']['estimated_time'] = $time;
        //dd($distance->getRows()[0]->getElements()[0]->getDuration()->getText(),$distance->getRows()[0]->getElements()[0]->getDistance()->getText());

        /** FIN CALCUL PRIX */
        $request['response']['delivery']['price'] = $request['response']['delivery']['distance']*5.00;
        $request['response']['delivery']['start_position_id'] = $start_position->id ;
        $request['response']['delivery']['end_position_id'] = $end_position->id ;
        $delivery = Delivery::create($request['response']['delivery']);

        return $delivery->id;

    }


}
