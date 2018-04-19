<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Dispute extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'author', 'reason', 'take_over_delivery_id', 'created_at', 'updated_at'
    ];


    public function takeOverDelivery()
    {
        return $this->hasOne('App\TakeOverDelivery', 'take_over_delivery_id');
    }
}
