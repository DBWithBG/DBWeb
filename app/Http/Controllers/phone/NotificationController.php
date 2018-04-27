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
            ->to("testestokezjorjesiro")
            ->send('Hello World, i`m a push message');
    }

}
