<?php

return [
    'driver' => env('FCM_PROTOCOL', 'http'),
    'log_enabled' => false,

    'http' => [
        'server_key' => env('FCM_SERVER_KEY', 'AAAAjVw3jcU:APA91bHQWbTc0t9gcj0kAIRSRsT7plE5ZdCG-1rB-jLelYtlgrzujW-717BvwXuJGTJ5cyh7Q7JM54oP5BSBTe1yk_3eDf1pj9NQargHWISzoacN4ZIfkOoK0qHARUTo_S9LoWDnys2Q'),
        'sender_id' => env('FCM_SENDER_ID', '607137533381'),
        'server_send_url' => 'https://fcm.googleapis.com/fcm/send',
        'server_group_url' => 'https://android.googleapis.com/gcm/notification',
        'timeout' => 30.0, // in second
    ],
];
