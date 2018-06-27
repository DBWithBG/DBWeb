<?php

namespace App\Http\Controllers\phone;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;

class NotificationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //TODO RELANCER LA SECURE WAY
       // $this->middleware('auth');
    }


    public function notify(){
        $options=[];
        $options['tokens']= ["c3vWTsHIiH4:APA91bHt39y22gcGN9z-UqecCd0CAH3HVsW8uqTzN8jWW7tcWnl8x2JM-fINuW5RAONGUtVFIzoiWB7BSqueuyD9GvGjm5xg13c-G4qu6zp2zid8N8jZflCZL5uQ6ZcyUSKwn9DiWSgJYwtbi13BtKJi0LjP8oQXtw"];
        $options['title']="Title !";
        $options["body"]="Body informations ! ";
        $options["datas"]=["url"=>"une/url/donnee"];
        dd(NotificationController::sendNotification($options));

    }


    public static function notifyPriseEnCharge(){
        return ['title'=>'Vos bagages sont pris en charge !',
            'body'=>'Un chauffeur vient de prendre vos bagages en charge.',
            'datas'=>['url'=>'courses']];
    }
    /*
    * ENVOI DE NOTIFICATION
    * on appel la methode statique avec un array parametre :
    * tokens => les tokens destinataires
    * title => le titre de la notification
     * body => le corps de la notification
     * datas => un array concernant les datas de la notification sous forme cle=>valeur
    */
    public static function sendNotification($options){

        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60*20);
        $notificationBuilder = new PayloadNotificationBuilder($options['title']);
        $notificationBuilder->setBody($options['body'])
            ->setSound('default');
        $dataBuilder = new PayloadDataBuilder();
        $dataBuilder->addData($options['datas']);
        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();
        $downstreamResponse = FCM::sendTo($options["tokens"], $option, $notification, $data);
        return $downstreamResponse;
    }

}
