<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request){
        $registrationData = $request->all();
        $validate = Validator::make($registrationData, [
            'name' => 'required|max:60',
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'required'
        ]);// membuat validasi input

        if($validate->fails())
            return response(['message' => $validate->errors()],400);

        $registrationData['password'] = bcrypt($request->password); //untuk enkripsi password
        $user = User::create($registrationData); // membuat user baru
        return response([
            'message' => 'Register Success',
            'user' => $user
        ],200); //return data user dalam bentuk json
    }

    public function login(Request $request)
    {
        $loginData = $request->all();
        $validate = Validator::make($loginData, [
            'email' => 'required|email:rfc,dns',
            'password' => 'required'
        ]);

        if($validate->fails())
            return response(['message' => $validate->errors()],400);

        if(!Auth::attempt($loginData))
            return response(['message' => 'Invalid Credentials'],401);
        
            /** @var \App\Models\User $user **/
        $user = Auth::user();
        $token = $user->createToken('Authenticatin Token')->accessToken;

        return response([
            'message' => 'Authenticated',
            'user' => $user,
            'token_type' => 'Bearer',
            'access_token' => $token
        ]); // return data user dan token dalam bentuk json
    }
}
