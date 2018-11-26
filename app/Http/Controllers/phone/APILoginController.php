<?php

    namespace App\Http\Controllers\phone;

    use App\Http\Controllers\Controller;
    use App\User;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;
    use Tymon\JWTAuth\Exceptions\JWTException;
    use Tymon\JWTAuth\Facades\JWTAuth;

    class APILoginController extends Controller
    {
        public function login(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'email' => 'required|string|email|max:255',
                'password'=> 'required'
            ]);
            if ($validator->fails()) {
                return response()->json($validator->errors());
            }
            $credentials = $request->only('email', 'password');
            try {
                if (! $token = JWTAuth::attempt($credentials)) {
                    return response()->json(['error' => 'invalid_credentials'], 401);
                }
            } catch (JWTException $e) {
                return response()->json(['error' => 'could_not_create_token'], 500);
            }
            //$user =  Auth::user();
            $user = User::where('email', $request->email)->first();
            if ($user->driver) {
                $type = 'driver';
            }elseif ($user->customer) {
                $type = 'customer';
            }else return response()->json(['error' => 'An error has occured, user does\'nt exists']);
            return response()->json(compact('token', 'type'));
        }
    }
