<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],




    //configuration firebase
    'firebase' => [
        'api_key' => 'AIzaSyBy-5ETkn-l3F1nmk9Iqjy6H3j_kEarHp0', // Only used for JS integration
        'auth_domain' => 'dbag-202408.firebaseapp.com', // Only used for JS integration
        'database_url' => 'https://your-database-at.firebaseio.com',
        'secret' => 'https://dbag-202408.firebaseio.com',
        'storage_bucket' => 'dbag-202408.appspot.com', // Only used for JS integration
    ]


];
