<?php

namespace App\Livewire\Boss\Client;

use App\Livewire\MyComponent;
use App\Models\Client;
use Livewire\WithPagination;

class ClientComponent extends MyComponent
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $thead = [
      0=>'id',
      1=>'name' ,
      2=>'phone' ,
      3=>'address',
      4=>'action',
    ];

    public $options = [
        0=>'id',
        1=>'name' ,
        2=>'phone' ,
        3=>'address',
    ];
    public $title = 'Clients' , $name, $phone, $address, $id,$status , $search;

    public function save(){
        $model = Client::create([
            'name' => $this->name,
            'phone' => $this->phone,
            'address' => $this->address,
        ]);
        $this->close();
        $this->render();
    }

    public function updateWindow($id){
        $this->updateOpen();
        $client = Client::find($id);
        $this->name = $client->name;
        $this->phone = $client->phone;
        $this->address = $client->address;
        $this->id = $id;
    }

    public function deleteUser($id){
        Client::destroy($id);
        $this->render();
    }

    public function saveUpdate($id){
        $client = Client::find($id);
        $client->update([
            'name' => $this->name,
            'phone' => $this->phone,
            'address' => $this->address,
        ]);
        $this->close();
        $this->render();
    }
    public function render()
    {
        if($this->search != null){
            $models = Client::where('name' , 'LIKE' , '%'.$this->search.'%')
                ->orWhere('phone' , 'LIKE' , '%'.$this->search.'%')
                ->orWhere('address' , 'LIKE' , '%'.$this->search.'%')
                ->paginate(25);
            return view('livewire.boss.client.client-component' , compact('models'));
        }else{
            $models = Client::paginate(25);
            return view('livewire.boss.client.client-component' , compact('models'));
        }
    }
}
