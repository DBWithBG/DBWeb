<?php

namespace App\Http\Controllers\phone;

use App\Driver;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MailController;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class APIRegisterController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:users',
            'name' => 'required',
            'password'=> 'required',
            'phone' => 'required|min:10|numeric',
            'type' => 'required|string'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $user = new User([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
        ]);
        $type = '';
        if($request->get('type') == 'driver'){
            $user->save();
            $driver = new Driver([
                'name' => $request->get('name'),
                'surname' => $request->get('surname'),
                'phone' => $request->get('phone'),
                'user_id' => $user->id
            ]);

            // Envoie du mail de confirmation
            try {
                $token = bin2hex(random_bytes(78));
            } catch (\Exception $e) {
            }
            $driver->user->email_confirmation_token = $token;
            $driver->user->save();
            $driver->save();
            MailController::confirm_driver_email_address($driver, $token);
            $type = 'driver';
        }else if($request->get('type') == 'customer'){
            $user->save();
            $customer = new Driver([
                'name' => $request->get('name'),
                'surname' => $request->get('surname'),
                'phone' => $request->get('phone'),
                'user_id' => $user->id
            ]);
            // Envoie du mail de confirmation
            try {
                $token = bin2hex(random_bytes(78));
            } catch (\Exception $e) {
            }
            $customer->user->email_confirmation_token = $token;
            $customer->user->save();
            $customer->save();
            MailController::confirm_customer_email_address($customer, $token);
            $type = 'customer';
        }else{
            $error = "Type of registered user not found, operation aborted";
            return \response()->json(compact('error'))
                ->setCallback(Input::get('callback'));
        }
        //Génération du token
        $token = JWTAuth::fromUser($user);

        return \response()->json(compact('token', 'type'))
            ->setCallback(Input::get('callback'));
    }
}
