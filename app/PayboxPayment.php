<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PayboxPayment extends Model
{
    //
    protected $table = 'paybox_payments';

    protected $fillable = [
        'amount', 'authorization_number', 'payment_type', 'transaction_number', 'call_number', 'signature', 'created_at'
        , 'updated_at', 'status', 'id_app', 'email', 'id_in_app', 'retour_url'
    ];

    public function delivery()
    {
        return $this->belongsTo('App\Delivery', 'delivery_id');
    }//
}
