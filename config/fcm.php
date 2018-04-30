<?php

return [
    'driver' => env('FCM_PROTOCOL', 'http'),
    'log_enabled' => false,

    'http' => [
        'server_key' => env('FCM_SERVER_KEY', 'AAAAtjTkRSM:APA91bHIhb_2j4jPna3HzTnjNhqYY_ftpKRLQ3tBhtnwxe8p9MbTBN3GCvNmy_5iRfUsVtkPljDVnLihogEFIa0OUqsr00gT6y-QjXAXVSs189sJtaHoqzAsF-RqWyevb95Cq4nkgxKu'),
        'sender_id' => env('FCM_SENDER_ID', '782571423011'),
        'server_send_url' => 'https://fcm.googleapis.com/fcm/send',
        'server_group_url' => 'https://android.googleapis.com/gcm/notification',
        'timeout' => 30.0, // in second
    ],
];
