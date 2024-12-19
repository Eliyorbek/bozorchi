<?php

namespace App\Livewire\Boss\Order;

use App\Livewire\MyComponent;
use App\Models\Order;
use App\Models\Product;
use Livewire\Component;
use App\Models\OrderItem as ModelsOrderItem;
use Livewire\WithPagination;

class OrderItem extends MyComponent
{
    use WithPagination;
    public $title = 'Buyurtmalar haqida';
    public $thead = [
        0=>'№',
        1=>'mijoz',
        2=>'mahsulot',
        3=>'narxi',
        4=>'soni',
        5=>'jami puli',
    ];
    public $order_id , $product_id,$count,$price,$total_sum,$name,$id;
    public $status,$description,$discount_price,$category_id,$brend_id,$search,$sup_id;

    public function mount($id){
        $this->id = $id;
    }
    public function showWindow($id)
    {
        $product = Product::find($id);
        $this->viewOpen();
        $this->name = $product->name;
        $this->product_id = $id;
        $this->price = $product->price;
        $this->count = $product->count;
        $this->description = $product->description;
        $this->category_id = $product->category->name ?? 'Kategoriya yo\'q';
        $this->brend_id = $product->brend->name ?? 'Brend yo\'q';
        $this->status = $product->status;
        $this->discount_price = $product->discount_price;
        $this->sup_id = $product->sup->name ?? 'Taminotchi yo\'q';

    }




    public function render()
    {
        $models = ModelsOrderItem::where('order_id', $this->id)->paginate(10);
        return view('livewire.boss.order.order-item' , compact('models'));
    }
}
