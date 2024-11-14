<?php

namespace App\Livewire\Boss\Supplier;

use App\Livewire\MyComponent;
use App\Models\Supplier;
use Livewire\Component;
use Livewire\WithPagination;
class SupplierComponent extends MyComponent
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $title = 'Yetkazib beruvchi';
    public $thead = [
        0=>'id',
        1=>'F.I.SH',
        2=>'Kontakt',
        3=>'Action',
    ];
    public $options = [
        0=>'id',
        1=>'F.I.SH',
        2=>'Kontakt',
    ];
    public $id , $search,$name,$contact;

    public function deleteUser($id){
        $this->deleteOpen();
        $this->id = $id;
    }
    public function deleteOne($id){
        Supplier::destroy($id);
        $this->close();
    }
    public function updateWindow($id){
        $this->updateOpen();
        $model = Supplier::find($id);
        $this->name = $model->name;
        $this->contact = $model->contact;
        $this->id =$id;
    }
    public function render()
    {
        if($this->search!=null){
            $models = Supplier::where('name' , 'LIKE' , '%'.$this->search.'%')->orWhere('contact' , 'LIKE','%'.$this->search.'%')->where('status' , 'active')->paginate(10);
        }else{
            $models = Supplier::where('status' , 'active')->paginate(10);
        }
        return view('livewire.boss.supplier.supplier-component' , compact('models'));
    }
}
