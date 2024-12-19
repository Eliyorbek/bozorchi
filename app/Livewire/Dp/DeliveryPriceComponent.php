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
        1=>'Min km',
        2=>'Min sum',
        3=>'Standart km',
        4=>'Standart price',
        5=>'Max km',
        6=>'Max price',
        7=>'Tahrirlash',
    ];
    public $id , $min_km,$min_price,$max_km,$max_price,$standart_km,$standart_price;
    public function updateWindow($id){
        $this->updateOpen();
        $this->id = $id;
        $price = DeliveryPrice::find($id);
        $this->min_km = $price->min_price;
        $this->max_km = $price->min_km;
        $this->min_price = $price->max_price;
        $this->max_price = $price->max_price;
        $this->standart_km = $price->standart_price;
        $this->standart_price = $price->standart_price;

    }
    public function deleteUser($id){
        DeliveryPrice::destroy($id);
        session()->flash('delete' , 'The delivery price has been deleted');
        return redirect()->route('delivery-price.index');
    }
    public function render()
    {
        $models = DeliveryPrice::orderBy('id' , 'DESC')->paginate(15);
        return view('livewire.dp.delivery-price-component' , compact('models'));
    }
}
