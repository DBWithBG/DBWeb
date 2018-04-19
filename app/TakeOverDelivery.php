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
}
