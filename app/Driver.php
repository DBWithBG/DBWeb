<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Config;

class Driver extends Model
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'birth_date', 'is_online', 'phone', 'created_at','updated_at', 'user_id','canceled_deliveries',
        'current_lat','current_lng', 'max_bags'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function takeOverDeliveries()
    {
        return $this->hasMany('App\TakeOverDelivery', 'driver_id');
    }

    public function justificatifs() {
        return $this->hasMany('App\Justificatif', 'driver_id');
    }

    /**
     * @return int La chiffre d'affaires du driver
     */
    public function ca() {
        $ca = 0;

        foreach ($this->takeOverDeliveries as $tod) {
            if ($tod->delivery->status == Config::get('constants.TERMINE')) {
                $ca += $tod->delivery->price;
            }
        }

        return $ca;
    }

    /**
     * @return string Une string contenant la note du driver
     */
    public function note() {
        $total = 0;
        $number = 0;
        foreach ($this->takeOverDeliveries as $takeOverDelivery) {
            if ($takeOverDelivery->delivery->rating != null) {
                $total += ($takeOverDelivery->delivery->rating->rating / 10);
                $number++;
            }
        }

        if ($number == 0) return '';
        return '' . ($total / $number);
    }
}
