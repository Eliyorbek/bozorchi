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
        $user = User::where('id',$id)->where('role' , 3)->first();
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
            $user = Socialite::driver('google')->stateless()->user();
            $googleId = $user->getId();
            $googleName = $user->getName();
            $googleEmail = $user->getEmail();
            $existingUser = User::where('email', $googleEmail)->first();
            if ($existingUser!=null) {
                Auth::login($existingUser);
                return response()->json([
                    'success' => true,
                    'message'=>'User mavjud!',
                    'data'=>new UserResource($existingUser)
                ]);
            } else {
                $newUser = User::create([
                    'name' => $googleName,
                    'email' => $googleEmail,
                    'google_id' => $googleId,
                ]);
                Auth::login($newUser);
                return response()->json([
                    'success' => true,
                    'message'=>'User qo\'shildi!',
                    'data'=>new UserResource($newUser)
                ]);
            }
        } catch (\Exception $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Google orqali o\'tib bo\'madi'
                ], 500);
        }
    }



}
