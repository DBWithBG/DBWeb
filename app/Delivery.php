<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Delivery extends Model
{
    use Notifiable;

    protected $table = 'deliveries';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'comment', 'price', 'created_at', 'updated_at', 'start_position_id', 'end_position_id', 'customer_id'
    ];
}
