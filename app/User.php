<?php

namespace App;

use App\Http\Controllers\MailController;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'admin', 'is_confirmed','created_at', 'updated_at', 'facebook_id', 'twitter_id', 'google_id', 'mobile_token','notify_token', 'lang',
        'is_pro', 'pro_adresse', 'pro_siret', 'pro_telephone', 'pro_referent'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'email_confirmation_token'
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
        $email = $this->getEmailForPasswordReset();
        MailController::reset_password_email($token, $email);
    }

}
