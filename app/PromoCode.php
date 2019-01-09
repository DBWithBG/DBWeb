<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class PromoCode extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'createur', 'active', 'name', 'start_date', 'end_date', 'percent'
    ];
    public $timestamps = true;

    public function deliveries(){
        return $this->hasMany('App\Rating', 'promo_code_id');
    }
}
