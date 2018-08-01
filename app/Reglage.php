<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reglage extends Model
{
    protected $fillable = [
        'no_facture'
    ];
    public $timestamps = false;
}
