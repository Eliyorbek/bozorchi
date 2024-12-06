<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class MyProfileController extends Controller
{
    public function index(){
        return view('backend.profil.index');
    }

    public function update(Request $request,$id){
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone=$request->phone;
        $user->car_number=$request->car_number;
        if ($request->hasFile('image')) {
            $imgName = md5(rand(111,9999).microtime()).'.'.$request->file('image')->extension();
            
            if (file_exists(public_path('storage/user_img/'.$user->image))) {
                unlink(public_path('storage/user_img/'.$user->image));
            }
            $request->file('image')->storeAs('public/user_img' , $imgName);
            $user->image = $imgName;
        }else{
            $user->image = $user->image;
        }
        $user->save();
        return redirect()->route('my-profile')->with('update','Profile Updated Successfully');
    }
}
