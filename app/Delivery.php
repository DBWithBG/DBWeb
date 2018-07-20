<?php

namespace App;

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
        'name', 'start_date','surname', 'comment', 'price', 'created_at', 'updated_at', 'start_position_id',

        'end_position_id', 'customer_id', 'status', 'estimated_time', 'distance', 'no_train', 'no_flight', 'time_consigne', 'end_date'
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

}

