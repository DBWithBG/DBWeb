<?php

namespace App\Http\Controllers;

use App\PayboxPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class PayboxController extends Controller
{
    //TODO MODIFICATION AVEC LA BONNE TABLE
    public static function process(Request $request){
        $log = new Logger('reception_paiement');
        dd(session("paiement"));

        if(session("paiement")){
            $authorizationRequest = \App::make(\Devpark\PayboxGateway\Requests\AuthorizationWithCapture::class);
            $paiement = session("paiement");
            $paiement->status='en cours';
            $paiement->email = session("email");
            $paiement->save();
            //dd($request, $paiement);
            $auth=$authorizationRequest->setAmount($paiement->amount)->setCustomerEmail($paiement->email)
                ->setPaymentNumber($paiement->id)->send('paybox.send');
            $log->pushHandler(new StreamHandler(storage_path().DIRECTORY_SEPARATOR.'logs'.DIRECTORY_SEPARATOR.'paiement_recu.log', Logger::INFO));
            $log->info('Demande paiement recue');
            return $auth;
        }else{
            $payboxVerify = App::make(\Devpark\PayboxGateway\Responses\Verify::class);
            $log = new Logger('reception_paiement_serveur');
            //dd($request);
            $log->pushHandler(new StreamHandler(storage_path().DIRECTORY_SEPARATOR.'logs'.DIRECTORY_SEPARATOR.'paiement_recu.log', Logger::INFO));
            $log->info('Reception des serveurs paybox : '.$request->input('order_number'). ' statut : '.$payboxVerify->isSuccess($request->input('amount')));

        }
    }

    public static function accepted(Request $request){
        $paiement = PayboxPayment::where('id', $request->input('order_number'))->firstOrFail();
        $payboxVerify = App::make(\Devpark\PayboxGateway\Responses\Verify::class);
        try {
            $success = $payboxVerify->isSuccess($paiement->amount);
            if ($success) {
                //on enregistre le paiement paybox
                $paiement->authorization_number=$request->input('authorization_number');
                $paiement->payment_type=$request->input('payment_type');
                $paiement->transaction_number=$request->input('transaction_number');
                $paiement->call_number=$request->input('call_number');
                $paiement->signature=$request->input('signature');
                $paiement->status="valide";
                $paiement->save();

                //envoi du mail

                // process order here after making sure it was real payment
                $log = new Logger('reception_paiement');
                $log->pushHandler(new StreamHandler(storage_path().DIRECTORY_SEPARATOR.'logs'.DIRECTORY_SEPARATOR.'paiement_accepte.log', Logger::INFO));
                $log->info('Paiement accepte : '.$request);
                return redirect('/paybox/confirmation')->with(['idPaiement'=>$paiement->id]);
            }else{

                $log = new Logger('erreur_paiement');
                $log->pushHandler(new StreamHandler(storage_path().DIRECTORY_SEPARATOR.'logs'.DIRECTORY_SEPARATOR.'paiement_erreur.log', Logger::INFO));
                $log->info('Erreur paiement : '.$request);
            }
        }
        catch (InvalidSignature $e) {
            $log = new Logger('crash_paiement');
            $log->pushHandler(new StreamHandler(storage_path().DIRECTORY_SEPARATOR.'logs'.DIRECTORY_SEPARATOR.'paiement_catch_accepted.log', Logger::INFO));
            $log->info('Crash paiement : '.$request);
        }

    }
    public static function waiting(Request $request){
        try {
            $paiement = PayboxPayment::where('id', $request->input('order_number'))->firstOrFail();
            $paiement->status = "attente";
            $paiement->save();

            return redirect('/paybox/attente')->with(['idPaiement'=>$paiement->id]);
        }
        catch (Exception $e) {
            $log = new Logger('erreur_mise_en_attente_paiement');
            $log->pushHandler(new StreamHandler(storage_path().DIRECTORY_SEPARATOR.'logs'.DIRECTORY_SEPARATOR.'paiement_catch_waiting.log', Logger::INFO));
            $log->info('Erreur mise en attente paiement : '.$request);
        }

    }
    public static function aborted(Request $request){
        try{
            if(empty($request->input('order_number'))){//Annulation sans choisir de mode de paiement
                return redirect()->back();
            }else {
                $paiement = PayboxPayment::where('id', $request->input('order_number'))->firstOrFail();
                $paiement->status = "abandon";
                $paiement->save();
                return redirect('/paybox/abandon')->with(['idPaiement'=>$paiement->id]);
            }


        }
        catch (Exception $e) {
            $log = new Logger('erreur_abandon_paiement');
            $log->pushHandler(new StreamHandler(storage_path().DIRECTORY_SEPARATOR.'logs'.DIRECTORY_SEPARATOR.'paiement_catch_aborted.log', Logger::INFO));
            $log->info('Erreur abandon paiement : '.$request);
        }
    }
    public static function refused(Request $request){
        try{
            $paiement = PayboxPayment::where('id', $request->input('order_number'))->firstOrFail();
            $paiement->status="refus";
            $paiement->save();


            return redirect('/paybox/refus')->with(['idPaiement'=>$paiement->id]);
        }
        catch (Exception $e) {
            $log = new Logger('erreur_refus_paiement');
            $log->pushHandler(new StreamHandler(storage_path().DIRECTORY_SEPARATOR.'logs'.DIRECTORY_SEPARATOR.'paiement_catch_refused.log', Logger::INFO));
            $log->info('Erreur refus paiement : '.$request);
        }
    }



    /**
     * AFFICHAGES DE RETOUR UTILISATEUR
     */
    //TODO LES BONS RETOURS EN FONCTION DES REPONSES
    //affiche retour paiment accepte a l'utilisateur
    public static function confirmation_paiement_paybox(){
        $paiement=PayboxPayment::find(session('idPaiement'));
        //dd($paiement, "OK");
        return redirect($paiement->retour_url."?status=".$paiement->status."&refPaiement=".$paiement->id."&idInApp=".$paiement->id_in_app);
        //return view('paiement.confirmation_paybox')->with(['slug_evenement'=>$paiement->slug_evenement,'evenement'=>Evenement::find($paiement->id_evenement)]);
    }

    //affiche retour paiment refuse a l'utilisateur
    public static function refus_paybox(){
        $paiement=PayboxPayment::find(session('idPaiement'));
        return redirect($paiement->retour_url."?status=".$paiement->status."&refPaiement=".$paiement->id."&idInApp=".$paiement->id_in_app);

    }

    //affiche retour paiment en attente a l'utilisateur
    public static function attente_paiement_paybox(){
        $paiement=PayboxPayment::find(session('idPaiement'));
        return redirect($paiement->retour_url."?status=".$paiement->status."&refPaiement=".$paiement->id."&idInApp=".$paiement->id_in_app);
    }

    //affiche retour paiment refuse a l'utilisateur
    public static function annule_paiement_paybox(){
        $paiement=PayboxPayment::find(session('idPaiement'));
        return redirect($paiement->retour_url."?status=".$paiement->status."&refPaiement=".$paiement->id."&idInApp=".$paiement->id_in_app);
    }
}
