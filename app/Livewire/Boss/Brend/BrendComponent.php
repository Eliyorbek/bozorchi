<?php

namespace App\Livewire\Boss\Brend;

use App\Livewire\MyComponent;
use App\Models\Brend;
use Livewire\Component;
use Livewire\WithPagination;

class BrendComponent extends MyComponent
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $name,$id,$search,$status;
    public $title  = 'Brends';
    public $thead = [
        0=>'id',
        1=>'name',
        2=>'status',
        3=>'action',
    ];
    public $options =[
        0=>'id',
        1=>'name',
        2=>'status',
    ];

    public function rules(){
        return [
            'name'=>'required|unique:Brend,name',
        ];
    }

    public function save(){
        if($this->status == true){
            Brend::create([
                'name'=>$this->name,
                'status'=>'active'
            ]);
        }else{
            Brend::create([
                'name'=>$this->name,
                'status'=>'inactive'
            ]);
        }
        $this->close();
        $this->render();
    }

    public function statusEdit($id){
        $brend = Brend::find($id);
        if($brend->status == 'active'){
            $brend->update([
                'status'=>'inactive'
            ]);
        }else{
            $brend->update([
                'status'=>'active'
            ]);
        }
    }

    public function updateWindow($id){
        $this->updateOpen();
        $brend = Brend::find($id);
        $this->name = $brend->name;
        $this->id = $brend->id;
        $this->status = $brend->status;
    }

    public function saveUpdate($id){
        $brend = Brend::find($id);
        if($this->status == true){
            $brend->update([
                'name'=>$this->name,
                'status'=>'active'
            ]);
        }else{
            $brend->update([
                'name'=>$this->name,
                'status'=>'inactive'
            ]);
        }
        $this->close();
        $this->render();

    }

    public function deleteUser($id){
        Brend::destroy($id);
    }
    public function render()
    {
        if($this->search != null){
            $models = Brend::where('name' , 'LIKE' , '%'.$this->search.'%')->paginate(20);
        }else{
            $models = Brend::paginate(20);
        }
            return view('livewire.boss.brend.brend-component' ,compact('models'));

    }
}
