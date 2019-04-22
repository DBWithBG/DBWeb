<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Price extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'createur', 'bags_min', 'bags_max', 'to_add_driver', 'coef_kilometers_driver', 'coef_bags_driver',
        'price_per_bags', 'price_ret_per_bags',
        'coef_total_driver', 'coef_total_driver', 'coef_deliver', 'start_date', 'end_date', 'promotion', 'to_add_retour'
    ];
    public $timestamps = true;
}
