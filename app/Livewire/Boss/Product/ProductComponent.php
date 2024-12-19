<?php

namespace App\Livewire\Boss\Product;

use App\Livewire\MyComponent;
use App\Models\Product;
use Livewire\WithPagination;
use App\Http\Requests\ProductRequest;
class ProductComponent extends MyComponent
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $title = 'Mahsulotlar';
    public $thead = [
        0=>'id',
        1=>'nomi',
        2=>'narx',
        3=>'chegirma narx',
        4=>'miqdori',
        5=>'status',
        6=>'tahrirlash',
    ];



    public $name , $id,$status,$price,$description,$discount_price,$category_id,$brend_id,$count,$search,$sup_id;

    public $sale = 0,$sprice , $percentage=0;

    protected $rules = [
            'name'=>'required',
            'price'=>'required',
            'count'=>'required',
            'imei_1'=>'required',
        ];

    public function saleWindow($id){
        $product = Product::find($id);
        $this->sale=1;
        $this->show=1;
        $this->price = $product->price;

    }


    public function updateWindow($id){
        $product = Product::find($id);
        $this->updateOpen();
        $this->id=$id;
        $this->name=$product->name;
        $this->price=$product->price;
        $this->count=$product->count;
        $this->description=$product->description;
        $this->category_id=$product->category_id;
        $this->brend_id=$product->brend_id;
        $this->status=$product->status;
        $this->sup_id=$product->sup_id;

    }

    public function showWindow($id){
        $product = Product::find($id);
        $this->viewOpen();
        $this->name=$product->name;
        $this->id=$id;
        $this->price=$product->price;
        $this->count=$product->count;
        $this->description=$product->description;
        $this->category_id=$product->category->name;
        $this->brend_id=$product->brend->name;
        $this->status=$product->status;
        $this->discount_price=$product->discount_price;
        $this->sup_id=$product->sup->name;

    }

    public function statusEdit($id){
        $product = Product::find($id);
        if($product->status == 'active'){
            $product->status = 'inactive';
        }else{
            $product->status = 'active';
        }
        $product->update([
            'status'=>$product->status,
        ]);
    }
 public function deleteWin($id){
        $this->id = $id;
        $this->deleteOpen();
 }

    public function deleteOne($id){
        $product=Product::find($id);
        if ($product->images!=null){
            foreach ($product->images as $image){
                if (is_file(public_path('storage/product_img/'.$image['path']))){
                unlink(public_path('storage/product_img/'.$image['path']));
                $image->delete();
            }
        }
        }
            $product->delete();
        return redirect()->route('product.index')->with('delete','Product has been deleted');
    }

    public function render()
    {
        if($this->search != null){
            $models = Product::where('name','like','%'.$this->search.'%')
            ->orWhere('price','like','%'.$this->search.'%')
            ->orWhere('count','like','%'.$this->search.'%')
            ->orWhereHas('category',function($q){
                $q->where('name','like','%'.$this->search.'%');
            })
            ->orWhereHas('brend',function($q){
                $q->where('name','like','%'.$this->search.'%');
            })
                ->paginate(15);
        }else{
            $models = Product::paginate(15);
        }

        return view('livewire.boss.product.product-component' , compact('models'));
    }
}
