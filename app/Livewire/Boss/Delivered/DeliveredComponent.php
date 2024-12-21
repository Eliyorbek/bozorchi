<?php

namespace App\Livewire\Boss\Delivered;

use App\Livewire\MyComponent;
use App\Models\Order;
use App\Models\OrderDelivery;
use App\Models\OrderItem;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class DeliveredComponent extends MyComponent
{
    use WithPagination;
    public 
            $thead =[
                0=>'№',
                1=>'Kuryer',
                2=>'Mijoz',
                3=>'yetkazish narx',
                4=>'to\'lash summasi',
            ];
    public $title = 'Yetkazilgan buyurtmalar';
    public $map=0,$sum=0,$order;
    public $kuryer,$orderItems,$delivery,$id,$search,$total_sum = 0,$date;
    public function mount(){
        $models = Order::where('status' , '3')->get();
        foreach($models as $model){
            $this->total_sum += $model->total_sum;
        }
    }

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

    public $view = 0,$dateView=0,$sent;

    
    public function render()
    {
        $models = OrderDelivery::where('status' , '3')->orderBy('id' , 'desc')->paginate(15);
        return view('livewire.boss.delivered.delivered-component' , compact('models'));
    }
}
