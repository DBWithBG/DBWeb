<?php

return [
    /*
     * Whether test environment is enabled
     */
    'test' => env('PAYBOX_TEST', false),

    /*
     * Site number (provided by Paybox)
     */
    'site' => env('PAYBOX_SITE', '1644823'),

    /*
     * Rank number (provided by Paybox)
     */
    'rank' => env('PAYBOX_RANK', '01'),

    /*
     * Internal identifier (provided by Paybox)
     */
    'id' => env('PAYBOX_ID', '688642506'),

    /*
     * Password for Paybox back-office (It's required for Paybox direct - when you use
     * capturing, otherwise it won't be used)
     */
    'back_office_password' => env('PAYBOX_BACK_OFFICE_PASSWORD', ''),

    /*
     * HMAC authentication key - it should be generated in Paybox merchant panel
     */

    'hmac_key' => env('PAYBOX_HMAC_KEY', '87C0AA0F1E6C6F11B5A8971DB8B63B7502B9AE2E3E93FF03CB84229DC6B79341795ECBAFB8E338C515DFB63C855B163F3AF73FF692C0F583FEDC4D296CA663FC'),

    /*
     * HMAC authentication PRE PROD key - it should be generated in Paybox merchant panel
     */
    //'hmac_key' => env('PAYBOX_HMAC_KEY', '7cd328ffe1e04e30eb6d0a6b252e0a16394536b2cfcac453f298b97d540a2321ea48c29b3f31b59a9f652a875691d611c93debe7b3acfac880aeb22a41c7db4d'),


    /*
     * Paybox public key location - you can get it from 
     * http://www1.paybox.com/wp-content/uploads/2014/03/pubkey.pem
     */
    'public_key' => storage_path('paybox/pubkey.pem'),

    /*
     * Default return fields when going back from Paybox. You can change here keys as you want,
     * you can add also more values from ResponseField class     
     */
    'return_fields' => [
        'amount' => \Devpark\PayboxGateway\ResponseField::AMOUNT,
        'authorization_number' => \Devpark\PayboxGateway\ResponseField::AUTHORIZATION_NUMBER,
        'order_number' => \Devpark\PayboxGateway\ResponseField::ORDER_NUMBER,
        'response_code' => \Devpark\PayboxGateway\ResponseField::RESPONSE_CODE,
        'payment_type' => \Devpark\PayboxGateway\ResponseField::PAYMENT_TYPE,
        'call_number' => \Devpark\PayboxGateway\ResponseField::PAYBOX_CALL_NUMBER,
        'transaction_number' => \Devpark\PayboxGateway\ResponseField::TRANSACTION_NUMBER,
        // signature should be always last return field
        'signature' => \Devpark\PayboxGateway\ResponseField::SIGNATURE,
    ],

    /*
     * Those are routes names (not urls) where customer will be redirected after payment. If you 
     * want to use custom route with params in url you should set them dynamically when creating
     * authorization data. You shouldn't change keys here. Those urls will be later launched using 
     * GET HTTP request
     */
    'customer_return_routes_names' => [
        'accepted' => 'paybox.accepted',
        'refused' => 'paybox.refused',
        'aborted' => 'paybox.aborted',
        'waiting' => 'paybox.waiting',
    ],

    /*
     * This is route name (not url) where Paybox will send transaction status. This url is
     * independent from customer urls and it's the only url that should be used to track current
     * payment status for real. If you want to use custom route with params in url you should set it
     * dynamically when creating authorization data. This url will be later launched using GET HTTP
     * request
     */
    'transaction_verify_route_name' => 'paybox.process',

    /*
     * Access urls for Paybox for production environment
     */
    'production_urls' => [
        /*
         * Paybox System urls
         */
        'paybox' => [
            'https://tpeweb.e-transactions.fr/cgi/MYchoix_pagepaiement.cgi',
            'https://tpeweb1.e-transactions.fr/cgi/MYchoix_pagepaiement.cgi',
        ],

        /*
         * Paybox Direct urls
         */
        'paybox_direct' => [
            'https://ppps.e-transactions.fr/PPPS.php',
            'https://ppps1.e-transactions.fr/PPPS.php',
        ],
    ],

    /*
     * Access urls for Paybox for test environment
     */
    'test_urls' => [
        /*
         * Paybox System urls
         */
        'paybox' => [
            'https://preprod-tpeweb.e-transactions.fr/cgi/MYchoix_pagepaiement.cgi',
        ],

        /*
         * Paybox Direct urls
         */
        'paybox_direct' => [
            'https://preprod-ppps.e-transactions.fr/PPPS.php',
        ],
    ],
];
