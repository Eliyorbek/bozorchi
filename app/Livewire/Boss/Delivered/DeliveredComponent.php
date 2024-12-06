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

    public $title = 'Yetkazilgan buyurtmalar';
    public $thead =[
        0=>'№',
        1=>'Kuryer',
        2=>'Mijoz',
        3=>'yetkazish narx',
        4=>'to\'lash summasi',
        5=>'status',
        6=>'harakatlar',

    ];
    public $map=0,$sum=0,$order;
    public $kuryer,$orderItems,$delivery,$id,$search,$total_sum = 0;
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

    public function render()
    {
        if ($this->search){
            $models = OrderDelivery::where('status' , 3)
                ->where(function($query){
                    $query->whereHas('kuryer' , function($query){
                        $query->where('name' , 'like' , '%'.$this->search.'%');
                    })
                        ->orWhereHas('order' , function($query){
                            $query->whereHas('client' , function($query){
                                $query->where('name' , 'like' , '%'.$this->search.'%');
                            });
                        });
                })
                ->orderBy('updated_at', 'desc')
                ->paginate(15);
        }else{
            $models = OrderDelivery::where('status' , 3)->orderBy('updated_at' , 'desc')->paginate(15);
        }
        return view('livewire.boss.delivered.delivered-component' , compact('models'));
    }
}
