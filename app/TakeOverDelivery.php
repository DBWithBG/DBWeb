<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class TakeOverDelivery extends Model
{
    use Notifiable;
    protected $table = 'take_over_deliveries';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status', 'driver_id', 'delivery_id', 'actual_position_id', 'created_at', 'updated_at'
    ];


    public function customer()
    {
        return $this->belongsTo('App\Position', 'actual_position_id');
    }

    public function delivery()
    {
        return $this->belongsTo('App\Delivery', 'delivery_id');
    }

    public function driver()
    {
        return $this->belongsTo('App\Driver', 'driver_id');
    }

    public function disputes() {
        return $this->hasMany('App\Dispute', 'take_over_delivery_id');
    }
}
