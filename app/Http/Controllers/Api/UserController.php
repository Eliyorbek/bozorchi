<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function register(UserRequest $request){
        $client = new User();
        $client->setClientId(env('GOOGLE_CLIENT_ID'));

        $idToken = $request->input('idToken');

        try {
            $payload = $client->verifyIdToken($idToken);

            if ($payload) {
                $googleId = $payload['sub']; // Google user ID
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
                return response()->json(['error' => 'Invalid ID token'], 400);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Google sign-in failed', 'message' => $e->getMessage()], 500);
        }
    }

}
