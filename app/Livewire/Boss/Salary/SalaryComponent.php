<?php

namespace App\Livewire\Boss\Salary;

use App\Livewire\MyComponent;
use App\Models\Order;
use App\Models\OrderDelivery;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class SalaryComponent extends MyComponent
{
    use WithPagination;
    public $title = 'Kuryerlarga pul berish';
    public $thead = [
        0=>'ism',
        1=>'count',
        2=>'yetkazish narx',
        3=>'ish haqi',
    ];

    public $order_delivery , $order;
    public function oneSalary($id){
        $model = OrderDelivery::find($id);
        $order = Order::find($model->order_id);
        $model->update(['status' => 4]);
        $order->update(['status' => 4]);
        session()->flash('price' ,'success');
        return redirect()->route('salary.index');
    }

    public function allOrder($id){
        foreach(OrderDelivery::where('courier_id',$id)->get() as $delivery){
            $delivery->update(['status' => 4]);
            Order::find($delivery->order_id)->update(['status' => 4]);
        }
        session()->flash('price' ,'success');
        return redirect()->route('salary.index');
    }
    public function render()
    {
        $users = User::where('role' , 2)->paginate(10);
        return view('livewire.boss.salary.salary-component' , compact('users'));
    }
}
