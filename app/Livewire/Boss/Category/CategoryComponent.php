<?php

namespace App\Livewire\Boss\Category;

use App\Livewire\MyComponent;
use App\Models\Category;
use Livewire\WithPagination;

class CategoryComponent extends MyComponent
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $name,$id,$search,$status,$image;
    public $title  = 'Kategoriyalar';
    public $thead = [
        0=>'id',
        1=>'name',
        2=>'status',
        3=>'action',
    ];
    public $options = [
        0=>'id',
        1=>'name',
        2=>'status',
    ];

    public function rules(){
        return [
            'name'=>'required|unique:Category,name',
            'image'=>'required',
        ];
    }

    public function save(){
        if($this->status == true){
            Category::create([
                'name'=>$this->name,
                'status'=>'active'
            ]);
        }else{
            Category::create([
                'name'=>$this->name,
                'status'=>'inactive'
            ]);
        }
        $this->close();
        $this->render();
    }

    public function statusEdit($id){
        $brend = Category::find($id);
        if($brend->status == 'active'){
            $brend->update([
                'status'=>'inactive'
            ]);
        }else{
            $brend->update([
                'status'=>'active'
            ]);
        }
    }

    public function imgPath(){
        return '/storage/category_img/';
    }

    public function updateWindow($id){
        $this->updateOpen();
        $brend = Category::find($id);
        $this->name = $brend->name;
        $this->id = $brend->id;
        $this->image = $this->imgPath().$brend->image;
        $this->status = $brend->status;
    }

    public function saveUpdate($id){
        $brend = Category::find($id);
        if($this->status == true){
            $brend->update([
                'name'=>$this->name,
                'status'=>'active'
            ]);
        }else{
            $brend->update([
                'name'=>$this->name,
                'status'=>'inactive'
            ]);
        }
        $this->close();
        $this->render();

    }

    public function deleteUser($id){
        Category::destroy($id);
    }
    public function render()
    {
        if($this->search != null){
            $models = Category::where('name' , 'LIKE' , '%'.$this->search.'%')->paginate(20);
        }else{
            $models = Category::paginate(20);
        }
        return view('livewire.boss.category.category-component',compact('models'));

    }

}
