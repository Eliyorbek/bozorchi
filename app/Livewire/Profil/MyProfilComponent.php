<?php

namespace App\Livewire\Profil;

use App\Livewire\MyComponent;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class MyProfilComponent extends MyComponent
{
    public $title = "Shaxsiy kabinet";
    public $name,$id,$role,$email,$car_number,$phone,$image,$password1,$password2;
    public function updateWindow($id){
        $this->updateOpen();
        $user = User::find($id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = $user->password;
        $this->role = $user->role;
        $this->id = $user->id;
        $this->car_number = $user->car_number;
        $this->phone = $user->phone;
        $this->image = '/storage/user_img/'.$user->image;
    }

    public function editPassword($id){
        $user = User::find($id);
        if($this->password1 != null && $this->password2 != null && $this->password1 == $this->password2){
            $user->password = Hash::make($this->password1);
            $user->save();
            return redirect()->route('my-profile')->with('update' , 'sadfasd');
        }else{
            return $this->redirect()->back();
        }
    }
    public function render()
    {
        $models = User::where('id' , Auth::user()->id)->first();
        return view('livewire.profil.my-profil-component' , compact('models'));
    }
}
