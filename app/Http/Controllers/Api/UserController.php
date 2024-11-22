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

    public function register(Request $request)
    {
        $idToken = $request->input('idToken');

        try {
            $client = new \Google_Client(['client_id' => env('GOOGLE_CLIENT_ID')]); // Google Client-ni sozlash
            $payload = $client->verifyIdToken($idToken);

            if ($payload) {
                $googleId = $payload['sub'];
                $email = $payload['email'];
                $name = $payload['name'];
                $picture = $payload['picture'];

                $user = User::where('email', $email)->first();

                if (!$user) {
                    $user = User::create([
                        'name' => $name,
                        'email' => $email,
                        'google_id' => $googleId,
                        'profile_picture' => $picture,
                    ]);
                }

                Auth::login($user);

                return response()->json([
                    'success' => true,
                    'message' => 'Foydalanuvchi muvaffaqiyatli tizimga kirdi',
                    'user' => $user,
                ], 200);
            } else {
                return response()->json(['error' => 'ID token hato'], 400);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Google orqali o\'tib bo\'madi', 'message' => $e->getMessage()], 500);
        }
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->stateless()->user();
            $googleId = $user->getId();
            $googleName = $user->getName();
            $googleEmail = $user->getEmail();
            $existingUser = User::where('email', $googleEmail)->first();

            if ($existingUser) {
                Auth::login($existingUser);
            } else {
                $newUser = User::create([
                    'name' => $googleName,
                    'email' => $googleEmail,
                    'google_id' => $googleId,
                ]);
                Auth::login($newUser);
            }

            return response()->json([
                'success' => true,
                'message'=>'User qo\'shildi!',
            ]);
        } catch (\Exception $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Google orqali o\'tib bo\'madi'
                ], 500);
        }
    }



}
