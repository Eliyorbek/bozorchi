<?php

namespace App\Livewire\Boss\Product;

use App\Livewire\MyComponent;
use App\Models\Product;
use Livewire\Component;

class SaleComponent extends MyComponent
{
    public $id , $sale_price , $price,$sale,$sotuv;
    public function mount($id){
        $this->id = $id;
        $this->price = Product::find($id)->price;
    }
    public function saleWindow($id){
        $product = Product::find($id);
        $this->sale=1;
        $this->show=1;
        $this->price = $product->price;

    }

    public function save($id){
        Product::find($id)->update([
            'sale_price' => $this->sotuv,
        ]);
        $this->close();
        return redirect()->route('product.index')->with('narx' , 'narx belgilandi');
    }

    public function close(){
        $this->sale=0;
        $this->show=0;
    }

    public function render()
    {
        if($this->sale_price!=null){
            $this->sotuv = ($this->price / 100 * $this->sale_price) + $this->price;
//            dd($this->s);
        }else{
            $this->sotuv = 0;
        }
        return view('livewire.boss.product.sale-component');
    }
}
