<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Bag extends Model
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $table = 'bags';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','details','customer_id', 'type_id'
    ];


    public function customer()
    {
        return $this->belongsTo('App\Customer', 'customer_id');
    }

    public function type()
    {
        return $this->belongsTo('App\TypeBag', 'type_id');
    }
}

