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


    //notification de prise en charge
    public static function notifyPriseEnCharge(){
        return ['title'=>'Vos bagages sont pris en charge !',
            'body'=>'Un chauffeur vient de prendre vos bagages en charge.',
            'datas'=>['url'=>'courses']];
    }

    //notification d'arrivee de client
    public static function notifyArrivee(){
        return ['title'=>'Vos bagages sont arrivés !',
            'body'=>'Vos bagages sont arrivés à leur lieu de destination.',
            'datas'=>['url'=>'courses']];
    }

    //notification de demande de contact infructueuse pour client
    public static function notifyDemandeDeContact(){
        return ['title'=>'Votre chauffeur veut vous contacter !',
            'body'=>'Votre chauffeur veut vous contacter mais n\'y arrive pas, contactez-le.',
            'datas'=>['url'=>'courses']];
    }

    //notification d'annulation pour client
    public static function notifyAnnulation(){
        return['title'=>'Votre chauffeur s\'est désisté !',
            'body'=>'Votre demande a automatiquement été remise en attente',
            'datas'=>['url'=>'courses']];
    }

    //notification de demande d'avis pour client
    public static function notifyDemandeAvis(){
        return ['title'=>'Notez votre expérience DeliverBag !',
            'body'=>'Améliorez nos services en notant votre chauffeur.',
            'datas'=>['url'=>'courses']];
    }


    //notification de retard d'un client pour chauffeur
    public static function notifyRetardClient($tps){
        return ['title'=>'Votre client aura'.$tps.' minutes de retard !',
            'body'=>'Nos services ont détecté un retard client.',
            'datas'=>['url'=>'']];
    }


    //notification de validation d'inscription
    public static function notifyValidationInscription($code){
        return ['title'=>'Bienvenue, votre code : '.$code,
            'body'=>'Bienvenue sur l\'application DELIVERBAG.',
            'datas'=>['url'=>'']];
    }

    //notification de lancement de consigne
    public static function notifyConsigne(){
        return ['title'=>'Votre chauffeur a bien consigné votre bagage!',
            'body'=>'Votre chauffeur garde votre bagage avant sa livraison.',
            'datas'=>['url'=>'courses']];
    }

    public static function notifyLancementLivraison(){
        return ['title'=>'Vos bagages sont en routes !',
            'body'=>'Votre chauffeur transporte vos bagages vers leur lieu de livraison.',
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
