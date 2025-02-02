<?php

namespace App\Livewire\Dp;

use App\Livewire\MyComponent;
use App\Models\Delivery;
use App\Models\DeliveryPrice;
use Livewire\Component;

class DeliveryPriceComponent extends MyComponent
{
    public $title = "Yetkazib berish narxni belgilash";
    public $thead = [
        0=>'№',
        1=>'Minimalka',
        2=>'Oshirish narx',
        3=>'Tahrirlash',
    ];
    public $id , $price,$min;
    public function updateWindow($id){
        $this->updateOpen();
        $this->id = $id;
        $price = DeliveryPrice::find($id);
        $this->min = $price->min;
        $this->price = $price->price;

    }
    public function deleteUser($id){
        DeliveryPrice::destroy($id);
        session()->flash('delete' , 'The delivery price has been deleted');
        return redirect()->route('delivery-price.index');
    }
    public function render()
    {
        $models = DeliveryPrice::orderBy('id' , 'DESC')->paginate(1);
        return view('livewire.dp.delivery-price-component' , compact('models'));
    }
}
