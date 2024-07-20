<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only(['email','password']);

        if(Auth::attempt($credentials))
        {

            $user = Auth::user();

            $token = $user->createToken('authtoken')->plainTextToken;

            return response()->json([
                'status'=>true,
                'token'=>$token,
                'message'=>'User Logged in Successfulyy',
                'data'=>$user

            ]);



        }else{
            return response()->json([
                'status'=>false,
                'message'=>'Wrong Email or password'
            ]);
        }

    }


    public function register(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        if(is_null($user))
        {
            $user = new User();
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->password = bcrypt($request->password);
            $user->save();

            $token = $user->createToken('authtoken')->plainTextToken;

            return response()->json([
                'status'=>true,
                'message'=>'User Created Successfully',
                'token'=>$token,
                'data'=>$user
            ]);

        }else{
            return response()->json([
                'status'=>false,
                'message'=>"User Already Exists"
            ]);
        }
    }
}
