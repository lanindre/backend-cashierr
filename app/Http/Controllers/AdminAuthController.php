<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            $token =Auth::user()-> createToken('TokenName')->accessToken;

            return response()->json(['token'=>$token, 'user'=>$user], JsonResponse::HTTP_OK);
        }else {
            return response()->json(['message' => "Email or Password doesn't Match record"],
            JsonResponse::HTTP_UNAUTHORIZED);
        }
    }
}

