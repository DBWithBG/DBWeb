<?php

namespace App\Http\Controllers;

use App\Delivery;
use App\Driver;
use Illuminate\Support\Facades\DB;
use niklasravnsborg\LaravelPdf\Facades\Pdf;
use Illuminate\Support\Facades\Config;

class FactureController extends Controller
{

    /* methode de generation de factures
    * elles seront generees dans /storages/files/factures/ID_DU_GROUPE.pdf
    */
    public static function genererFactureDelivery($idDelivery)
    {
        $delivery = Delivery::find($idDelivery);
        //TODO AJOUTER LE CHECK DU PAIEMENT VALIDE AVEC PAYBOX POUR CONSULTER LA FACTURE
        if (!$delivery->num_facture || $delivery->num_facture == 1) {

            $inc = DB::table('reglages')->where('id', '=', '1')
                ->increment('no_facture');
            $reg = DB::table('reglages')->where('id', '=', '1')->first();

            $delivery->num_facture = $reg->no_facture;
            $delivery->save();
        }


        $data = [
            'delivery' => $delivery,
        ];
        $pdf = PDF::loadView('pdf.facture_customer', $data);
        //$pdf= PDF::loadView('pdf.facture_en', $data);
        $pdf->save('../storage/app/files/factures/' . $idDelivery . '.pdf');

        $filename2 = $idDelivery . ".pdf";
        $path = storage_path() . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR . 'factures' . DIRECTORY_SEPARATOR . $filename2;

        return $path;

        /*if (file_exists($path)) {
            $type = "application/pdf";
            header('Content-Type:' . $type);
            header('Content-Length: ' . filesize($path));
            readfile($path);
        }*/
    }

    /*
       * methode de generation de factures anglaises
       * elles seront generees dans /storages/files/factures/ID_DU_GROUPE.pdf
  */
    public static function genererFactureGroupeAnglais($idDelivery)
    {

        $delivery = Delivery::find($idDelivery);

        if(!$delivery->num_facture || $delivery->num_facture==1){
            $inc=DB::table('reglages')->where('id','=','1')
                ->increment('id_facture');
            $reg=DB::table('reglages')->where('id','=','1')->first();

            $delivery->num_facture=$reg->id_facture;
            $delivery->save();
        }

        $data = [
            'groupe_participants' => $delivery,
            'infos'=>DB::table('reglages')->where('id','=','1')->first(),
            'numFact'=>$delivery->num_facture
        ];
        $pdf = PDF::loadView('pdf.facture_en', $data);
        $pdf->save('../storage/app/files/factures/' . $idDelivery . '.pdf');
    }

    //acces a la facture
    public function getFacture($filename)
    {
        //$this->middleware('droitsAdmin');
        $filename2 = $filename . ".pdf";
        $path = storage_path() . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR . 'factures' . DIRECTORY_SEPARATOR . $filename2;

        if (File::exists($path)) {
            $type = "application/pdf";
            header('Content-Type:' . $type);
            header('Content-Length: ' . filesize($path));
            readfile($path);
        } else {
            if (Delivery::find($filename)) {
                //TODO ERRORS
                return view('/errors/facture_inexistante')->with(['idFacture' => $filename]);
            }
            return view('/errors/facture_inexistante');
        }
    }

    //generation et access rapide a une
    public function genererFactureGroupeFlash($filename)
    {
        $delivery = Delivery::where('id', $filename)->first();
        /*if (empty($delivery->langue)) {
            $gp->langue = 'fr';
            $gp->save();
        }*/
        //FactureController::genererFactureGroupe($filename,true);
        FactureController::genererFactureDeliveryFrancais($delivery->id, true);
        return redirect('/facture/consulter/' . $delivery->id);
    }

    public static function genererFactureDriverMonth($idDriver, $year, $month) {
        $driver = Driver::find($idDriver);
        $sorted_deliveries = $driver->sortedDeliveries();

        $filename = "driver-$idDriver-$month-$year.pdf";
        $path = storage_path() . '/app/files/factures/' . $filename;


        $numFacture = "$idDriver-$month-$year";

        $deliveries = $sorted_deliveries[$year][$month];
        $totalHT = 0;

        foreach($deliveries as $takeOverDelivery) {
            $totalHT += $takeOverDelivery->delivery->remuneration_driver;
        }

        $TVA = Config::get('constants.TVA');
        $totalTTC = $totalHT + (($TVA / 100) * $totalHT);

        $data = [
            'driver' => $driver,
            'deliveries' => $deliveries,
            'totalHT' => $totalHT,
            'totalTTC' => $totalTTC,
            'TVA' => $TVA,
            'numFacture' => $numFacture
        ];

        $pdf = PDF::loadView('pdf.facture_driver', $data);
        $pdf->save($path);

        return $path;
        
    }
}
