<?php

namespace App\Http\Controllers\Auth;

use App\Customer;
use App\Driver;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    /**
     * SocialController constructor.
     * On autorise la route seulement pour les utilisateurs non connectés
     */
    public function __construct(){
        if(Input::get('type') == 'customer') Session::put('type', 'customer');
        else if(Input::get('type') == 'driver') Session::put('type', 'driver');
        $this->middleware('guest');
    }

    /**
     * @param $provider
     * @return mixed
     * Fonction qui va se charger de rediriger notre application vers l'url du provider
     */
    public function redirect($provider){
        return Socialite::driver($provider)->redirect();
    }

    /**
     * @param $provider
     * @return mixed
     * @throws \Exception
     * Fonction de callback ou le provider nous redirige en passant l'utilisateur
     */
    public function callback($provider){
        //Récupération de l'utilisateur renvoyé
        try{
            $providerUser = Socialite::driver($provider)->user();
        }catch(\Exception $e){
            throw $e;
        }

        //Ici vous pouvez dd($providedUser) pour voir à quoi ressemble
        //les données renvoyées selon le provider

        //Si j'ai déjà le provider_id dans la base de donnée
        //je connecte directement l'utilisateur
        $user = $this->checkIfProviderIdExists($provider, $providerUser->id);

        if($user){
            Auth::guard()->login($user, true);
            return redirect('/');
        }

        //Je vérifie si j'ai un email
        if($providerUser->email !== null){
            //Je rajoute le provider_id a l'utilisateur dont le mail
            //correspond et je redirige vers la page appelé
            $user = User::where('email', $providerUser->email)->first();
            if($user){
                $field = $provider.'_id';
                $user->$field = $providerUser->id;

                Auth::guard()->login($user, true); // true pour garder l'utilisateur connecté ( remember me )
                return redirect('/');
            }
        }

        //Je crée l'utilisateur si j'arrive jusque là
        $user = User::create([
            'name' => $providerUser->name,
            'email' => $providerUser->email,
            $provider.'_id' => $providerUser->id,
            'is_confirmed' => 1
        ]);
        if(Session::get('type') == 'customer'){
            $customer = new Customer();
            $customer->user_id = $user->id;
            $customer->name = explode(' ', $providerUser->name )[1];
            $customer->surname = explode(' ', $providerUser->name )[0];
            $customer->save();
        }elseif(Session::get('type') == 'driver'){
            $driver = new Driver();
            $driver->user_id = $user->id;
            $driver->name = explode(' ', $providerUser->name )[1];
            $driver->surname = explode(' ', $providerUser->name )[0];
            $driver->save();
        }

        if($user) Auth::guard()->login($user, true);
        return redirect('/');

    }

    /**
     * @param $provider
     * @param $providerId
     * @return mixed
     * Fonction qui vérifie si l'utilisateur à déjà un identifiant
     * venant d'un réseau social
     */
    public function checkIfProviderIdExists($provider, $providerId){

        $field = $provider."_id";

        $user = User::where($field, $providerId)->first();

        return $user;

    }
}
