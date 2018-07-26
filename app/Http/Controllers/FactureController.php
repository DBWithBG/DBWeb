<?php

namespace App\Http\Controllers;

use App\Delivery;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use niklasravnsborg\LaravelPdf\Facades\Pdf;

class FactureController extends Controller
{

    /* methode de generation de factures
    * elles seront generees dans /storages/files/factures/ID_DU_GROUPE.pdf
    */
    public static function genererFactureDeliveryFrancais($idDelivery)
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
            'delivery' => $delivery,
            'infos'=>DB::table('reglages')->where('id','=','1')->first(),
            'numFact'=>$delivery->num_facture
        ];
        $pdf = PDF::loadView('pdf.facture', $data);
        //$pdf= PDF::loadView('pdf.facture_en', $data);
        $pdf->save('../storage/app/files/factures/' . $idDelivery . '.pdf');
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
}
