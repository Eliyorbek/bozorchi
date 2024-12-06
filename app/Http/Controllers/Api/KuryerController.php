<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KuryerController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->where('role' , 2)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            return response()->json([
                'success' => true,
                'data'=>new UserResource($user),
            ],200 ,[],JSON_UNESCAPED_SLASHES);
        } else {
            return response()->json([
                'success' => false,
                'message'=>'Parol hato!'
            ]);
        }
    }
}
