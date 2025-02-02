<?php

namespace App\Livewire\Kuryer\Yetkazilgan;

use App\Livewire\MyComponent;
use App\Models\Order;
use App\Models\OrderDelivery;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class YetkazilganlarComponent extends MyComponent
{
    use WithPagination;

    public $title = 'Yetkazgan buyurtmalarim';
    public $thead =[
        0=>'№',
        1=>'Mijoz',
        2=>'Phone',
        3=>'to\'lash summasi',
        4=>'status',
        5=>'harakatlar',

    ];
    public $map=0,$sum=0,$order;
    public $kuryer,$orderItems,$delivery,$id,$search;
    public function openLocaltion($id){
        $this->map=1;
        $this->show=1;
        $this->order=Order::find($id);
    }
    public function showWindow($id){
        $this->viewOpen();
        $this->id = $id;
        $this->delivery = OrderDelivery::find($id);
        $this->order=Order::where('id',$this->delivery->order_id)->first();
        $this->kuryer = User::where('id',$this->delivery->courier_id)->first();
        $this->orderItems = OrderItem::where('order_id',$this->delivery->order_id)->get();
    }

    public function render()
    {
        $models = OrderDelivery::where('status' , 3)->where('courier_id' , Auth::user()->id)->orderBy('id' , 'desc')->paginate(15);
        return view('livewire.kuryer.yetkazilgan.yetkazilganlar-component' , compact('models'));
    }
}
