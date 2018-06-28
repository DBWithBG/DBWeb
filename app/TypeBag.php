<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class TypeBag extends Model
{

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'length', 'width', 'height', 'created_at', 'updated_at'
    ];

    public function deliveryEnd()
    {
        return $this->hasMany('App\Bag', 'type_id');
    }

}
