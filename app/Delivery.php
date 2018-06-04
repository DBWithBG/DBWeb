<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

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
        'name', 'surname', 'comment', 'price', 'created_at', 'updated_at', 'start_position_id', 'end_position_id', 'customer_id', 'status'
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
        return $this->hasOne('App\TakeOverDelivery', 'deliverie_id');

    }
}
