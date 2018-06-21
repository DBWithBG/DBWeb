<?php

namespace App\Http\Controllers\Auth;

use App\Customer;
use App\Driver;
use App\Http\Controllers\MailController;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if(empty($data['surname'])) $data['surname'] ='';
        if(empty($data['type'])) $data['type'] ='';
        $user = User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'admin' => false,
            'is_confirmed' => false
        ]);

        if($data['type'] == 'Customer'){
            $customer = new Customer();
            $customer->name = $data['name'];
            $customer->surname = $data['surname'];
            $customer->user_id = $user->id;
            $customer->save();
        }elseif($data['type'] == 'Driver'){
            $driver = new Driver();
            $driver->name = $data['name'];
            $driver->surname = $data['surname'];
            $driver->user_id = $user->id;
            $driver->save();

            // Envoyer le mail de confirmation
            $token = bin2hex(random_bytes(78));
            $driver->user->email_confirmation_token = $token;
            $driver->user->save();
            MailController::confirm_driver_email_adresse($driver, $token);
        }else{
            $user->admin = true;
            $user->save();
        }
        return $user;
    }
}
