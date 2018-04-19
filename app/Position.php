<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address', 'lat', 'lng', 'type', 'created_at', 'updated_at'
    ];
}
