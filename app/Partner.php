<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name', 'description', 'logo'
    ];

}
