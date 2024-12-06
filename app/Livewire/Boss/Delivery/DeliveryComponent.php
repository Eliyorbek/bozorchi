<?php

namespace App\Livewire\Boss\Delivery;

use App\Livewire\MyComponent;
use App\Models\Delivery;
use App\Models\Order;
use App\Models\OrderDelivery;
use App\Models\OrderItem;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class DeliveryComponent extends MyComponent
{
    use WithPagination;

    public $title = 'Zakaslarni yetkazib berish';
    public $thead = [
        0=>'№',
        1=>'Kuryer',
        2=>'Kuryer tel',
        3=>'mahsulotlar',
        4=>'jami pul',
        5=>'Status',
        6=>'Tahrirlash',
    ];
    public $map=0 , $order,$kuryer,$orderItems,$delivery,$id,$sum=0,$search;
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

    public function updateWindow($id){
        $this->updateOpen();
        $this->delivery = OrderDelivery::find($id);
        $this->order=Order::where('status' ,0)->get();
        $this->kuryer = User::where('id',$this->delivery->courier_id)->first();
    }

    public function kuryerAdd($id,$kuryer_id){
        $order = Order::find($id);
        $user = User::where('id',$kuryer_id)->where('role' , 2)->first();
        $birik = OrderDelivery::create([
            'order_id' => $id,
            'courier_id' => $kuryer_id,
            'delivery_price' => $order->delivery_price,
        ]);
        if ($birik!=null) {
            $order->status = 1;
            $order->save();
            $user->status = 1;
            $user->save();
        }
        return redirect()->route('delivery.index')->with('birik','Order has been created');
    }

    public function deleteWin($id){
        $this->id = $id;
        $this->deleteOpen();
    }

    public function deleteOne($id){
        $this->delivery = OrderDelivery::find($id);
        $this->order = Order::where('id',$this->delivery->order_id)->first();
        $this->delivery->status = 4;
        $this->order->status = 4;
        $this->delivery->save();
        $this->order->save();
        $this->close();
    }
    public function render()
    {
        if ($this->search!=null){
            $models = OrderDelivery::query()
                ->whereHas('kuryer', function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%');
                })
                ->orWhereHas('order.client', function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%');
                })->whereIn('status', [1,2])
                ->paginate(15);

        }else{
            $models = OrderDelivery::whereIn('status' , [1,2])->paginate(15);
        }
        return view('livewire.boss.delivery.delivery-component' , compact('models'));
    }
}
