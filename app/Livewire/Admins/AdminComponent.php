<?php

namespace App\Livewire\Admins;

use App\Livewire\MyComponent;
use App\Models\User;
use Livewire\WithPagination;

class AdminComponent extends MyComponent
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $title = 'Kuryerlar',$subtitle = 'Home' , $id,$name,$email,$role,$password ,$phone,$create=0,$editPage=0,$password1,$password2,$car_number;
    public $search;
    public $thead = [
        0=>'id',
        1=>'name',
        2=>'email',
        3=>'phone',
        4=>'avtomibil raqami',
        5=>'action',
    ];

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ];
    }


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
    }


    public function deleteUser($id){
        User::destroy($id);
        return $this->redirect('/add');
    }

    public function editPageOpen($id){
        $this->show=1;
        $this->editPage=1;
        $this->id = $id;
    }
    public function clos(){
        $this->editPage=0;
        $this->show=0;
    }



    public function render()
    {
        if($this->search != null){
            $users = User::where('name','like','%'.$this->search.'%')
            ->orWhere('email','like','%'.$this->search.'%')->where('role',2)->paginate(10);
        }else{
            $users = User::where('role',2)->paginate(10);
        }
        return view('livewire.admins.admin-component' , compact('users'));


    }
}
