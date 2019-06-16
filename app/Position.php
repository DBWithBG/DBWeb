<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Position extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address', 'lat', 'lng', 'type', 'created_at', 'updated_at', 'postal_code'
    ];

    public function deliveryStart()
    {
        return $this->hasOne('App\Delivery', 'start_position_id');
    }


    public function deliveryEnd()
    {
        return $this->hasOne('App\Delivery', 'end_position_id');
    }
}
