<?php

namespace App\Http\Controllers\phone;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PushNotification;

class NotificationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //TODO RELANCER LA SECURE WAY
       // $this->middleware('auth');
    }

    public function notify(){
        PushNotification::app('android')
            ->to("d4kS9phcDYQ:APA91bEq6BOBrJv2sNER7Jbh-5ipTqWsQLnfpXbh4cYpW0g3-m-SBSUiQCzu0yyLgIR1LFYYQixIq2tdmJfKcTt8KZWv5UpZQtMNi4w00I-F0envS-wieht04hY8aLzoiodikBaSe4uq")
            ->send('Hello World, i`m a push message');
    }

}
