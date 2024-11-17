<?php

namespace App\Livewire\Admins;

use App\Livewire\MyComponent;
use App\Models\User;
use Livewire\WithPagination;

class AdminComponent extends MyComponent
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $title = 'Admins',$subtitle = 'Home' , $id,$name,$email,$role,$password ,$create=0,$editPage=0,$password1,$password2;
    public $search;
    public $thead = [
        0=>'id',
        1=>'name',
        2=>'email',
        3=>'lavozim',
        4=>'action',
    ];
    public $options =[
        0=>'id',
        1=>'name',
        2=>'email',
        3=>'lavozim',
    ];

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ];
    }
    public function saveAdmin(){
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'role'=>2
        ])->with('success' , 'success');
        $this->close();
        $this->render();
    }

    public function updateWindow($id){
        $this->updateOpen();
        $user = User::find($id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = $user->password;
        $this->role = $user->role;
        $this->id = $user->id;
    }

    public function saveUpdate($id){
        $user = User::find($id);
       $user->update([
        'name' => $this->name,
        'email' => $this->email,
        'role' => 2,
       ]);
       $this->close();
       $this->render();
    }
    public function deleteUser($id){
        if(User::find($id)->role == 1){
            return $this->redirect('/add');
        }else{
            User::destroy($id);
            $this->render();
        }
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
            ->orWhere('email','like','%'.$this->search.'%')->paginate(10);
            return view('livewire.admins.admin-component' , compact('users'));
        }else{
            return view('livewire.admins.admin-component' , compact('users'));
        }

    }
}
