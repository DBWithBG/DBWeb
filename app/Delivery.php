<?php

namespace App;

use Carbon\Carbon;
use CiroVargas\GoogleDistanceMatrix\GoogleDistanceMatrix;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Config;

class Delivery extends Model
{
    use Notifiable;

    protected $table = 'deliveries';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'start_date','surname', 'comment', 'price', 'created_at', 'updated_at', 'start_position_id', 'remuneration_driver', 'remuneration_deliver', 'nb_bags',

        'end_position_id', 'customer_id', 'status', 'estimated_time', 'distance', 'no_train', 'no_flight', 'time_consigne', 'end_date', 'promo_code_id',
        'pro_cust_name', 'pro_cust_surname', 'pro_cust_email', 'pro_cust_tel', 'is_pro', 'pro_cust_lang'
    ];

    protected $hidden = [
        'remuneration_deliver'
    ];

    public function startPosition()
    {
        return $this->belongsTo('App\Position', 'start_position_id');
    }

    public function endPosition()
    {
        return $this->belongsTo('App\Position', 'end_position_id');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer', 'customer_id');
    }

    public function promo_code()
    {
        return $this->belongsTo('App\PromoCode', 'promo_code_id');
    }

    public function takeOverDelivery(){
        return $this->hasOne('App\TakeOverDelivery', 'delivery_id');

    }

    public function rating(){
        return $this->hasOne('App\Rating', 'delivery_id');

    }

    public function bags(){
        return $this->belongsToMany('App\Bag','infos_bags')->with('type');
    }

    public function paiement(){
        return $this->hasOne('App\PayboxPayment', 'delivery_id');
    }

    public function note() {
        if ($this->rating == null) return '';
        return $this->rating->rating / 10;
    }

    public function bagsWithTypes(){
        $res = [];
        foreach ($this->bags as $bag){
            if(empty($res[$bag->type->name])) $res[$bag->type->name] = 0;
            $res[$bag->type->name] ++;
        }

        return $res;
    }


    public static function getAllDeliveryWaitingTakeOver(){
        return Delivery::where('status', Config::get('constants.EN_ATTENTE_DE_PRISE_EN_CHARGE'))->where('deleted', 0)->get();
    }

    public static function getAllDeliveryInProgress(){
        return Delivery::where('status',
            Config::get('constants.PRIS_EN_CHARGE'))->orWhere('status', Config::get('constants.EN_COURS_DE_LIVRAISON'))->orWhere('status',
            Config::get('constants.CONSIGNE'))->where('deleted', 0)->get();
    }

    public static function getAllDeliveryFinished(){
        return Delivery::where('status', Config::get('constants.TERMINE'))->where('deleted', 0)->get();
    }

    //methode permettant d'annuler une prise en charge
    public static function isAnnulable($d){
        return $d->status==Config::get('constants.PRIS_EN_CHARGE');
    }
    //methode permettant d'annuler une delivery
    public static function isAnnulableByCustomer($d){
        return $d->status==Config::get('constants.EN_ATTENTE_DE_PRISE_EN_CHARGE');
    }


    public static function computePrice($type_bags, $start_position, $end_position, $distance = null, $start_date = null, $retour=false){
        $nb_bags = 0;
        foreach ($type_bags as $type_bag){
            $nb_bags += sizeof($type_bag);
        }
        if($distance == null) {
            $distanceMatrix = new GoogleDistanceMatrix('AIzaSyDOS-liFW3p5AkwwvO9XlFY8YimZJjpPmE');
            $distance = $distanceMatrix->setLanguage('fr')
                ->addOrigin($start_position['lat'] . ', ' . $start_position['lng'])
                ->addDestination($end_position['lat'] . ', ' . $end_position['lng'])
                ->sendRequest();

        }
        if(!is_float($distance)){
            $distance = explode(' ', $distance->getRows()[0]->getElements()[0]->getDistance()->getText())[0];
            $distance = str_replace(',', '.', $distance);
        }
        /// $start_date_copy = $start_date->copy();
        // =(3+2*RACINE(B14)*(1*RACINE($A$2)))*1,2
        //$priceLine = Price::where('bags_min', '<=', $nb_bags)->where('bags_max', '>=', $nb_bags)
          //  ->where('promotion', '1')->where('start_date', '<=',$start_date)->where('end_date', '>=', $start_date_copy->addDays(-1))->first();
        $priceLine = Price::all()->first();
        if(empty($priceLine)){
            $priceLine = Price::where('bags_min', '<=', $nb_bags)->where('bags_max', '>=', $nb_bags)
                ->where('promotion', '0')->first();
        }


        //$remuneration_driver = round(($priceLine->to_add_driver + $priceLine->coef_kilometers_driver * sqrt($distance)*($priceLine->coef_bags_driver * sqrt($priceLine->bags_min))) * $priceLine->coef_total_driver, 2);
        $remuneration_driver = 0;
        //$remuneration_deliver = round($remuneration_driver * $priceLine->coef_deliver*$nb_bags, 2);
        if(!!strpos($priceLine->postal_codes, $start_position->postal_code) && !!strpos($priceLine->postal_codes, $end_position->postal_code)) {
            $remuneration_deliver = round($priceLine->price_per_bag*$nb_bags,2);
        }else {
            $diff = $nb_bags - 3;
            $remuneration_deliver = round($priceLine->price_hors_postal,2);
            if($diff > 0) {
                $remuneration_deliver += round($priceLine->price_hors_postal_supp*$diff,2);
            }
        }
        //if($retour) $total = round($remuneration_driver + $remuneration_deliver + $priceLine->to_add_retour, 2);
        if($retour) {
            $total = round($remuneration_deliver + ($priceLine->price_ret_per_bag * $nb_bags), 2);
        }
        else $total = round($remuneration_driver + $remuneration_deliver, 2);

        return [
            'remuneration_driver' => $remuneration_driver,
            'remuneration_deliver' => $remuneration_deliver,
            'total' => $total
        ];
    }

}

