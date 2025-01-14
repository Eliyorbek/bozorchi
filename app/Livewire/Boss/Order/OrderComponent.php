<?php

namespace App\Livewire\Boss\Order;

use App\Livewire\MyComponent;
use App\Models\Order;
use App\Models\OrderDelivery;
use App\Models\OrderItem as ModelsOrderItem;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class OrderComponent extends MyComponent
{
    use WithPagination;
    public $title = "Buyurtmalar";
    public $thead = [
        0=>'№',
        1=>'mijoz',
        2=>'phone',
        3=>'address',
        4=>'yetkazish narx',
        5=>'to\'lov holati',
        6=>'jami summa',
        7=>'harakatlar',
    ];

    public $user_id,$address,$phone,$delivery_price,$payment_status,$total_sum,$search,$id,$statusSearch;
    public $kuryers,$order;
    public function deleteWin($id){
        $this->id = $id;
        $this->deleteOpen();
    }

    public function deleteOne($id){
        $order = Order::find($id);
        $orderItems = ModelsOrderItem::where('order_id',$id)->get();
        foreach($orderItems as $orderItem){
            $orderItem->status = 4;
            $orderItem->save();
        }
        $order->status = 4;
        $order->save();
        return redirect()->route('order.index')->with('delete','Product has been deleted');
    }

    public function kuryerAdd($id){
        $this->updateOpen();
        $this->order  = Order::find($id);
        $this->kuryers = User::where('role',2)->where('status' , 0)->get();
    }

    public function biriktir($order_id,$kuryer_id){
        $order = Order::find($order_id);
        $orderItems = ModelsOrderItem::where('order_id',$order_id)->get();
        $user = User::where('id',$kuryer_id)->where('role' , 2)->first();
        $birik = OrderDelivery::create([
            'order_id' => $order_id,
            'courier_id' => $kuryer_id,
            'delivery_price' => $order->delivery_price,
        ]);
        if ($birik!=null) {
            $order->status = 1;
            $order->save();
            $user->status = 1;
            $user->save();
            foreach($orderItems as $orderItem){
                $orderItem->status = 2;
                $orderItem->save();
            }
        }
        return redirect()->route('order.index')->with('birik','Order has been created');
    }
    public function render()
    {
        if ($this->search!=null) {
            $models = Order::whereHas('client' , function ($query){
                $query->where('name' , 'like' , '%' . $this->search . '%');
            })->orderBy('id', 'desc')->paginate(10);
        }elseif($this->statusSearch!=null) {
            $models = Order::where('status', $this->statusSearch)->orderBy('id', 'desc')->paginate(10);
        }
        else{
            $models = Order::orderBy('id', 'desc')->paginate(10);

        }
        return view('livewire.boss.order.order-component' ,compact('models'));
    }
}
