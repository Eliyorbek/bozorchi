<?php

namespace App\Livewire\Boss\Productincome;

use App\Livewire\MyComponent;
use App\Models\ProductIncome;
use App\Models\Supplier;
use Livewire\Component;
class ProductIncomeComponent extends MyComponent
{
    public $thead = [
        0=>'id',
        1=>'supplier',
        2=>'data',
        3=>'comment',
        4=>'status',
        5=>'actions',
    ];
    public $title = 'Mahsulotlar haqida';

    public $options = [
        0=>'id',
        1=>'supplier',
        2=>'data',
        3=>'comment',
        4=>'status',
    ];
    public $suppliers;
    public $id,$date,$supplier_id,$comment , $search;
    public function mount(){
        $this->suppliers = Supplier::where('status' , 'active')->get();
    }

    public function updateWindow($id){
        $income = ProductIncome::find($id);
        $this->updateOpen();
        $this->id = $id;
        $this->supplier_id = $income->supplier_id;
        $this->comment = $income->comment;
        $this->date = $income->date;
    }

    public function statusEdit($id){
        $productIncome = ProductIncome::find($id);
        $productIncome->status = $productIncome->status == 'active' ? 'inactive' : 'active';
        $productIncome->save();

    }
    public function deleteWin($id){
        $this->id = $id;
        $this->deleteOpen();
    }
    public function deleteOne($id){
        ProductIncome::destroy($id);
        $this->close();
    }
    public function render()
    {
        if($this->search != null){
            $models = ProductIncome::whereHas('supplier' , function($query){
                $query->where('name' , 'LIKE' , '%'.$this->search.'%');
            })
                ->orWhere('date' , 'LIKE' , '%'.$this->search.'%')
                ->orWhere('comment' , 'LIKE' , '%'.$this->search.'%')->paginate(15);
        }else{
            $models = ProductIncome::paginate(15);
        }
        return view('livewire.boss.productincome.product-income-component' , compact('models'));
    }
}
