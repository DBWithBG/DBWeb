<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Rating extends Model
{
    use Notifiable;
    protected $table = 'rating_drivers';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'driver_id', 'delivery_id', 'customer_id', 'rating', 'details', 'created_at', 'updated_at'
    ];


    public function customer()
    {
        return $this->belongsTo('App\Position', 'actual_position_id');
    }

    public function delivery()
    {
        return $this->belongsTo('App\delivery', 'delivery_id');
    }

    public function driver()
    {
        return $this->belongsTo('App\Driver', 'driver_id');
    }
}
