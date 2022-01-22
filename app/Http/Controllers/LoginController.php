<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login(Request $request){

        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)){
            return response([
                "message" => "El Usuario y/o contraseña es incorrecta."
            ], 401);
        }else{
            $user = Auth::user();
            $accessToken = $user->createToken('Token Name')->accessToken;

            return response([
            "user" => Auth::user(),
            "access_token" => $accessToken
            ]);
        }
    }
}
