<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Bag extends Model
{
    use Notifiable;

    protected $table = 'bags';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','details','customer_id'
    ];


    public function customer()
    {
        return $this->belongsTo('App\Customer', 'customer_id');
    }
}

