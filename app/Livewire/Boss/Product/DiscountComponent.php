<?php

namespace App\Livewire\Boss\Product;

use App\Livewire\MyComponent;
use App\Models\Product;
use Livewire\Component;

class DiscountComponent extends MyComponent
{
    public $id,$percentage=0,$price,$sotuv , $discount_price;

    public function mount($id){
        $this->id = $id;
    }
    public function percentageWindow($id){
        $product = Product::find($id);
        $this->percentage=1;
        $this->show=1;
        $this->price = $product->price;
    }
    public function save($id){
        Product::find($id)->update([
            'discount_price' => $this->sotuv,
        ]);
        $this->close();
        return redirect()->route('product.index')->with('narx' , 'narx belgilandi');
    }

    public function close(){
        $this->percentage=0;
        $this->show=0;
    }
    public function render()
    {
        if($this->discount_price!=null){
            $this->sotuv = $this->price - ($this->price / 100 * $this->discount_price);
        }else{
            $this->sotuv = 0;
        }
        return view('livewire.boss.product.discount-component');
    }
}
