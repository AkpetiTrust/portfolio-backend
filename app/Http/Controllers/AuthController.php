<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        $name = $request->name;
        $password = $request->password;

        $credentials = [
            "name" => $name,
            "password" => $password,
        ];

        if(Auth::attempt($credentials)){
            $user = Auth::user();
            $token = $user->createToken("access_token")->plainTextToken;
            return response()->json([
                "token" => $token
            ]);
        }

        return response()->json([
            "response" => "Invalid credentials"
        ], 401);
    }

    public function logout(){
        Auth::user()->tokens()->delete();

        return [
            'response' => 'Logged out'
        ];
    }
}
