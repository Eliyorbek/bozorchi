<?php

namespace App\Livewire\Boss\Delivery;

use App\Livewire\MyComponent;
use App\Models\Delivery;
use App\Models\Order;
use App\Models\OrderDelivery;
use Livewire\Component;
use Livewire\WithPagination;

class DeliveryComponent extends MyComponent
{
    use WithPagination;

    public $title = 'Zakaslarni yetkazib berish';
    public $thead = [
        0=>'№',
        1=>'Kuryer',
        2=>'mahsulotlar',
        3=>'jami pul',
        4=>'Status',
        5=>'Tahrirlash',
    ];
    public $map=0 , $order,$kuryer;
    public function openLocaltion($id){
        $this->map=1;
        $this->show=1;
        $this->order=Order::find($id);
    }
    public function render()
    {
        $models = OrderDelivery::paginate(15);
        return view('livewire.boss.delivery.delivery-component' , compact('models'));
    }
}
