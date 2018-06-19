<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class InfoBag extends Model
{
    use Notifiable;

    protected $table = 'infos_bags';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bag_id','delivery_id',
        'details_start_driver',
        'details_end_driver',
        'details_start_customer',
        'details_end_customer',
        'rating_start_driver',
        'rating_end_driver','rating_start_customer',
        'rating_end_customer'
    ];


    public function delivery()
    {
        return $this->belongsTo('App\Delivery', 'delivery_id');
    }
    public function bag()
    {
        return $this->belongsTo('App\Bag', 'bag_id');
    }
}

