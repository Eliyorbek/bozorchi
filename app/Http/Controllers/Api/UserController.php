<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
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
            ], 200,[] , JSON_UNESCAPED_SLASHES);
        }
    }

    public function googleAuth()
    {
       return Socialite::driver('google')->redirect();

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
            ],  200, [], JSON_UNESCAPED_SLASHES);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Google login failed'], 500);
        }
    }

    public function authGoogle(Request $request){
        $request->validate([
            'email' => 'required|string|email',
            'name'=>'required|string',
        ]);
        $user = User::where('email' , $request->email)->first();
        if (!$user){
           $user = User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'image'=>$request->avatar,
                'role'=>3,
                'google_id'=>$request->google_id,
            ]);
        }else{
            $user->update([
                'name'=>$request->name,
                'google_id'=>$user->google_id,
                'image'=>$user->avatar,
            ]);
        }

        $token = JWTAuth::fromUser($user);

        return response()->json([
            'success'=>true,
            'data'=>[
                'id'=>$user->id,
                'name'=>$user->name,
                'email'=>$user->email,
                'google_id'=>$user->google_id,
                'image'=>$user->avatar,
            ],
            'token'=>$token,
        ],200, [], JSON_UNESCAPED_SLASHES);
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


    public function register(Request $request) {
        $user = User::where('email', $request->email)->first();
        if($user){
            return response()->json([
               'message' => 'Bu email mavjud!'
            ]);
        }else{
           $validate =  Validator::make($request->only(['name' , 'email' , 'password']) , [
                'email' =>'required|string|email',
                'password' => 'required|string|min:8',
                'name'=>'required|string',
            ]);
            if($validate->fails()){
                return response()->json([
                    'errors' => $validate->errors(),
                    'message' => 'validatsiya hato!',
                ]);
            }
               $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'role' => 3,
                ]);
                $token = JWTAuth::fromUser($user);
                return response()->json([
                    'success'=>true,
                     'data'=>[
                         'id'=>$user->id,
                         'name'=>$user->name,
                         'email'=>$user->email,
                     ],
                     'token'=>$token,
                 ],200, [], JSON_UNESCAPED_SLASHES);
        }
        }


        public function login(Request $request) {
            $validate =  Validator::make($request->only(['name' , 'email' , 'password']) , [
                'email' =>'required',
                'password' => 'required|string|min:8',
            ]);
            if($validate->fails()){
                return response()->json([
                    'errors' => $validate->errors(),
                    'message' => 'validatsiya hato!',
                ]);
            }
            $user = User::where('email', $request->email)->first();
            if($user != null){
                if(Hash::check($request->password,$user->password)){
                    $token = JWTAuth::fromUser($user);
                    return response()->json([
                        'success'=>true,
                         'data'=>[
                             'id'=>$user->id,
                             'name'=>$user->name,
                             'email'=>$user->email,
                         ],
                         'token'=>$token,
                     ],200, [], JSON_UNESCAPED_SLASHES);
                }else{
                    return response()->json([
                       'message'=>'Parol xato'
                    ], 401);
                }
            }else{
                return response()->json([
                   'message'=>'User topilmadi'
                ], 404);
            }
        }

}
