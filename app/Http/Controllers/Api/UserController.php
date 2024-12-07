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

            // Foydalanuvchini bazaga tekshirish yoki yaratish
            $user = User::updateOrCreate(
                ['email' => $googleUser->email],
                [
                    'name' => $googleUser->name,
                    'google_id' => $googleUser->id,
                    'avatar' => $googleUser->avatar,
                ]
            );

            // Sanctum token yaratish
            $token = $user->createToken('auth-token')->plainTextToken;

            return response()->json([
                'token' => $token,
                'user' => $user,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Google login failed'], 500);
        }
    }



}
