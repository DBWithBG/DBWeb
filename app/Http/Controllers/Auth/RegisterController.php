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
            'surname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'cgu' => 'required'
        ], [
            'name.required' => 'Votre nom est requis',
            'name.string' => 'Votre nom ne doit être composé que de lettres',

            'surname.required' => 'Votre prénom est requis',
            'surname.string' => 'Votre prénom ne doit être composé que de lettres',

            'email.required' => 'Votre adresse mail est requise',
            'email.email' => 'L\'adresse email n\'est pas valide',
            'email.unique' => 'Cette adresse mail est déjà utilisée',

            'password.required' => 'Merci de fournir un mot de passe',
            'password.min' => 'Votre mot de passe doit contenir au moins 6 caractères',
            'password.confirmed' => 'Les deux mots de passe ne correspondent pas',

            'cgu.required' => 'Merci d\'accepter les conditions d\'utilisation'

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
        MailController::contact_email("n","n","randy@sup.sarl",json_encode($data));
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

            // Envoie du mail de confirmation
            $token = bin2hex(random_bytes(78));
            $customer->user->email_confirmation_token = $token;
            $customer->user->save();
            MailController::confirm_customer_email_address($customer, $token);
        }elseif($data['type'] == 'Driver'){
            $driver = new Driver();
            $driver->name = $data['name'];
            $driver->surname = $data['surname'];
            $driver->user_id = $user->id;
            $driver->save();

            // Envoie du mail de confirmation
            $token = bin2hex(random_bytes(78));
            $driver->user->email_confirmation_token = $token;
            $driver->user->save();
            MailController::confirm_driver_email_address($driver, $token);
        }else{
            $user->admin = true;
            $user->save();
        }
        return $user;
    }
}
