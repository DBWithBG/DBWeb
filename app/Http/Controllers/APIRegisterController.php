<?php

namespace App\Http\Controllers\phone;

use App\Driver;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Response;

class APIRegisterController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:users',
            'name' => 'required',
            'password'=> 'required',
            'phone' => 'required|min:10|numeric'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
        ]);
        $type = '';
        if($request->get('driver')){
            $driver = new Driver([
                'name' => $request->get('name'),
                'surname' => $request->get('surname'),
                'phone' => $request->get('phone')
            ]);
            $type = 'driver';
        }else if($request->get('user')){
            $customer = new Driver([
                'name' => $request->get('name'),
                'surname' => $request->get('surname'),
                'phone' => $request->get('phone')
            ]);
            $type = 'customer';
        }else{
            $error = "Type of registered user not found, operation aborted";
            return Response::json(compact('error'));
        }

        //Génération du token
        $token = JWTAuth::fromUser($user);

        return Response::json(compact('token', 'type'));
    }
}
