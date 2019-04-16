<?php

namespace App\Http\Controllers\Auth;

use App\Customer;
use App\Driver;
use App\User;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use Psy\Util\Json;
use Tymon\JWTAuth\Facades\JWTAuth;

class SocialController extends Controller
{
    /**
     * SocialController constructor.
     * On autorise la route seulement pour les utilisateurs non connectés
     */
    public function __construct(){
        //Pour différencier le click depuis un driver ou depuis un customer
        if(Input::get('type') == 'customer') Session::put('type', 'customer');
        else if(Input::get('type') == 'driver') Session::put('type', 'driver');
        //Traitement pour utiliser et sur mobile et sur web
        if(Input::get('from_type') == 'mobile') Session::put('from_type', 'mobile');
        else if(Input::get('from_type') == 'web') Session::put('from_type', 'web');
        $this->middleware('guest');
    }

    /**
     * @param $provider
     * @return mixed
     * Fonction qui va se charger de rediriger notre application vers l'url du provider
     */
    public function redirect($provider){
        if(Input::get('from_type') == 'mobile') return Socialite::driver($provider)->stateless()->redirect();
        else if(Input::get('from_type') == 'web') return Socialite::driver($provider)->redirect();
    }

    /**
     * @param $provider
     * @return mixed
     * @throws \Exception
     * Fonction de callback ou le provider nous redirige en passant l'utilisateur
     */
    public function callback($provider){
        if(Input::get('type') == 'customer') Session::put('type', 'customer');
        else if(Input::get('type') == 'driver') Session::put('type', 'driver');
        //Traitement pour utiliser et sur mobile et sur web
        if(Input::get('from_type') == 'mobile') Session::put('from_type', 'mobile');
        else if(Input::get('from_type') == 'web') Session::put('from_type', 'web');

        //Récupération de l'utilisateur renvoyé
        try{
            if(Session::get('from_type') == 'mobile') $providerUser = Socialite::driver($provider)->stateless()->user();
            else if(Session::get('from_type') == 'web') $providerUser = Socialite::driver($provider)->user();
        }catch(\Exception $e){
            throw $e;
        }


        //Ici vous pouvez dd($providedUser) pour voir à quoi ressemble
        //les données renvoyées selon le provider

        //Si j'ai déjà le provider_id dans la base de donnée
        //je connecte directement l'utilisateur
        $user = $this->checkIfProviderIdExists($provider, $providerUser->id);
        if($user){
            if(Session::get('from_type') == 'mobile') {
                $token = JWTAuth::fromUser($user);
                !empty($user->driver) ? $type= 'driver' : $type = 'customer';
                return response()->json(compact('token', 'type'));
            } else if(Session::get('from_type') == 'web'){
                Auth::guard()->login($user, true);

                if(Session::get('delivery_id')){
                    return redirect('delivery/'.Session::get('delivery_id').'/save');
                }
                return redirect('/');
            }
        }

        //Je vérifie si j'ai un email
        if($providerUser->email !== null){
            //Je rajoute le provider_id a l'utilisateur dont le mail
            //correspond et je redirige vers la page appelé
            $user = User::where('email', $providerUser->email)->first();
            if($user){
                $field = $provider.'_id';
                $user->$field = $providerUser->id;
                $user->save();

                if(Session::get('from_type') == 'mobile') {
                    $token = JWTAuth::fromUser($user);
                    !empty($user->driver) ? $type= 'driver' : $type = 'customer';
                    return response()->json(compact('token', 'type'));
                } else if(Session::get('from_type') == 'web'){
                    Auth::guard()->login($user, true);

                    if(Session::get('delivery_id')){
                        return redirect('delivery/'.Session::get('delivery_id').'/save');
                    }
                    return redirect('/');
                }
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
            $type = 'customer';
        }elseif(Session::get('type') == 'driver'){
            $driver = new Driver();
            $driver->user_id = $user->id;
            $driver->name = explode(' ', $providerUser->name )[1];
            $driver->surname = explode(' ', $providerUser->name )[0];
            $driver->save();
            $type = 'driver';
        }


        if(Session::get('from_type') == 'mobile') {
            $token = JWTAuth::fromUser($user);
            return response()->json(compact('token', 'type'));
        } else if(Session::get('from_type') == 'web'){
            Auth::guard()->login($user, true);
            return redirect('/');
        }
    }

    public function mobileCheckAccessToken(Request $request){

        if(!$request->input('input_token')) return response()->json(['error' => 'input_token_not_provided'], 403);

        $client = new Client();
        $uri = 'https://graph.facebook.com/debug_token?input_token='.
            $request->input('input_token').'&access_token='.Config::get('services.facebook.client_id').'|'.Config::get('services.facebook.client_secret');
        $res = $client->get($uri);

        $content = \GuzzleHttp\json_decode($res->getBody()->getContents());

        if(!$content->data->is_valid) {
            return response()->json(['error' => 'input_token_not_valid'], 403);
        }



        $headers = [
            'Authorization' => 'Bearer ' . $request->input('input_token'),
            'Accept'        => 'application/json',
        ];

        $res = $client->get('https://graph.facebook.com/v3.2/'.$content->data->user_id.'?fields=id,email,first_name,last_name', [
            'headers' => $headers
        ]);
        $content = \GuzzleHttp\json_decode($res->getBody()->getContents());

        $user = User::where('facebook_id', $content->id)->first();
        if(!empty($user->id)){
            $token = JWTAuth::fromUser($user);
            !empty($user->driver) ? $type= 'driver' : $type = 'customer';
            return response()->json(compact('token', 'type'));
        }

        $user = User::where('email', $content->email)->first();
        if($user){
            $user->facebook_id = $content->id;
            $user->save();
            $token = JWTAuth::fromUser($user);
            !empty($user->driver) ? $type= 'driver' : $type = 'customer';
            return response()->json(compact('token', 'type'));
        }

        if(!$request->input('type')) return response()->json(['error' => 'type_not_provided'], 403);

        //Si on est là c'est que l'user existe pas, on le crée
        $user = User::create([
            'name' => $content->first_name . ' '.$content->last_name ,
            'email' => $content->email,
            'facebook_id' => $content->id,
            'is_confirmed' => 1
        ]);

        if($request->input('type') == 'customer'){
            $customer = new Customer();
            $customer->user_id = $user->id;
            $customer->name = $content->last_name;
            $customer->surname = $content->first_name;
            $customer->save();
            $type = 'customer';
        }else if($request->input('type') == 'driver'){
            $driver = new Driver();
            $driver->user_id = $user->id;
            $driver->name = $content->last_name;
            $driver->surname = $content->first_name;
            $driver->save();
            $type = 'driver';
        }



        $token = JWTAuth::fromUser($user);
        return response()->json(compact('token', 'type'));


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
