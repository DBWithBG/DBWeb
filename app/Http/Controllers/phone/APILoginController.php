<?php

    namespace App\Http\Controllers\phone;

    use App\Http\Controllers\Controller;
    use App\User;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Validator;
    use Tymon\JWTAuth\Exceptions\JWTException;
    use Tymon\JWTAuth\Facades\JWTAuth;
    use Tymon\JWTAuth\JWTManager;

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
            if (!empty($user->driver)) {
                $type = 'driver';
            }elseif (!empty($user->customer)) {
                $type = 'customer';
            }else return response()->json(['error' => 'user_doesnot_exist'], 403);
            return response()->json(compact('token', 'type'));
        }

        public function logout(Request $request){
            $user = Auth::user();
            dd($user);
            if(!empty($user->id)){
                $user->notify_token = null;
                $user->save();
            }else {
                return response()->json(['error' => 'user_not_logged'], 403);
            }
            return response()->json(['blacklisted'=> JWTAuth::invalidate($request->get('token'))]);

        }
    }
