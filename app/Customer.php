<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Customer extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'birth_date', 'phone', 'created_at', 'updated_at', 'user_id','canceled_deliveries', 'is_pro'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function deliveries()
    {
        return $this->hasMany('App\Delivery', 'customer_id');
    }


    public function bags(){
        return $this->hasMany('App\Bag','customer_id');
    }

    public function identity() {
        return $this->name . ' ' . $this->surname;
    }
}
