<?php

namespace App;

use App\Http\Controllers\MailController;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'admin', 'is_confirmed','created_at', 'updated_at', 'facebook_id', 'twitter_id', 'google_id', 'mobile_token','notify_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function driver()
    {
        return $this->hasOne('App\Driver', 'user_id');
    }//

    public function customer()
    {
        return $this->hasOne('App\Customer', 'user_id');
    }//

    public function sendPasswordResetNotification($token)
    {
        MailController::reset_password_email($token);
    }

}
