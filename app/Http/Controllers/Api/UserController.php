<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Tymon\JWTAuth\Facades\JWTAuth;


class UserController extends Controller
{
    public function getUser($id){
        $user = User::find($id);
        if (!$user){
            return response()->json([
                'message' => 'User topilmadi'
            ]);
        }else{
            return response()->json([
                'data'=>new UserResource($user)
            ]);
        }
    }

    public function googleAuth()
    {
       return  Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
            $user = User::where('email' ,$googleUser->email)->first();
            if (!$user){
                $user = User::create([
                    'email' => $googleUser->email,
                    'name' => $googleUser->name,
                    'google_id' => $googleUser->id,
                    'image' => $googleUser->avatar,
                    'role' => 3
                ]);
            }else{
                $user->update([
                    'name' => $googleUser->name,
                    'google_id' => $googleUser->id,
                    'image' => $googleUser->avatar,
                ]);
            }


            // Sanctum token yaratish
            $token = JWTAuth::fromUser($user);

            return response()->json([
                'token' => $token,
                'user' => $user,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Google login failed'], 500);
        }
    }

    public function me()
    {
        return response()->json(auth()->user());
    }

    public function refreshToken()
    {
        try {
            // Yangi tokenni yangilash
            $newToken = JWTAuth::parseToken()->refresh();

            return response()->json([
                'success' => true,
                'access_token' => $newToken,
                'token_type' => 'Bearer',
                'expires_in' => auth('api')->factory()->getTTL() * 336 // Tugash vaqti (soniyalar)
            ]);
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid refresh token'
            ], 401);
        }
    }



}
