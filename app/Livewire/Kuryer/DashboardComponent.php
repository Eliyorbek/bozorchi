<?php

namespace App\Livewire\Kuryer;

use App\Livewire\MyComponent;
use App\Models\Order;
use App\Models\OrderDelivery;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class DashboardComponent extends MyComponent
{
    use WithPagination;
    public $title = 'Mening buyurtmalarim';
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

    public function statusEdit($id){
        $this->delivery = OrderDelivery::find($id);
        $this->order = Order::where('id',$this->delivery->order_id)->first();
        $this->orderItems = OrderItem::where('order_id',$this->delivery->order_id)->get();
        $this->order->status = $this->order->status==1?2:1;
        $this->delivery->status = $this->delivery->status==1?2:1;
        $this->delivery->save();
        $this->order->save();
    }

    public function deleteWin($id){
        $this->id = $id;
        $this->deleteOpen();
    }

    public function deleteOne($id){
        $this->delivery = OrderDelivery::find($id);
        $this->order = Order::where('id',$this->delivery->order_id)->first();
        $this->delivery->status = 5;
        $this->order->status = 5;
        User::find($this->delivery->courier_id)->update([
            'status'=>0,
        ]);
        $this->delivery->save();
        $this->order->save();
        $this->close();
    }

    public function check($id){
        $this->delivery = OrderDelivery::find($id);
        $this->order = Order::where('id',$this->delivery->order_id)->first();
        $this->delivery->status = 3;
        $this->order->status = 3;
        $this->order->payment_status = 'tolandi';
        $this->delivery->save();
        $this->order->save();
        User::find($this->delivery->courier_id)->update([
            'status'=>0,
        ]);
        $this->close();
    }

    public function render()
    {
        $models = OrderDelivery::whereIn('status' , [1,2])->where('courier_id' , Auth::user()->id)->paginate(15);
        return view('livewire.kuryer.dashboard-component' ,compact('models'));
    }
}
