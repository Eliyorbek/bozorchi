<?php

namespace App\Livewire\Boss\SupCategory;

use App\Livewire\MyComponent;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\SupCategory;

class SupCategoryComponent extends MyComponent
{
    use WithPagination;
    public $title = 'Sup Kategoriyalar';
    public $thead = [
      0=>'№',
      1=>'name',
      2=>'kategoriya',
      3=>'status',
      4=>'action',
    ];
    public $id,$name,$image,$status ,$search,$category_id;
    public function statusEdit($id){
        $brend = SupCategory::find($id);
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
        return '/storage/sup_img/';
    }
    public function updateWindow($id){
        $this->update = 1;
        $this->show = 1; // show-ni yopish
        $this->create = 0;
        $this->delete = 0;
        $this->view=0;
        $brend = SupCategory::find($id);
        $this->name = $brend->name;
        $this->category_id = $brend->category->name;
        $this->id = $brend->id;
        $this->image = $this->imgPath().$brend->image;
        $this->status = $brend->status;
    }
    public function showWindow($id){
        $this->viewOpen();
        $brend = SupCategory::find($id);
        $this->name = $brend->name;
        $this->category_id = $brend->category->name;
        $this->id = $brend->id;
        $this->image = $brend->image;
        $this->status = $brend->status;
    }

    public function deleteWin($id){
        $this->id = $id;
        $this->deleteOpen();
    }

    public function deleteOne($id)
    {
        $model = SupCategory::find($id);
        if ($model) {
            if ($model->image && file_exists(public_path('storage/sup_img/'.$model->image))) {
                unlink(public_path('storage/sup_img/'.$model->image));
            }
            $model->delete();
            session()->flash('delete', 'Category has been deleted');
            return redirect()->route('sup-category.index');
        }

        session()->flash('error', 'Category not found');
        return redirect()->route('sup-category.index');
    }

    public function render()
    {
        {
            if ($this->search != null) {
                $models = SupCategory::where('name', 'LIKE', '%' . $this->search . '%')
                    ->orWhereHas('category', function ($query) {
                        $query->where('name', 'LIKE', '%' . $this->search . '%');
                    })->paginate(15);
            } else {
                $models = SupCategory::paginate(15);
            }
            return view('livewire.boss.sup-category.sup-category-component', compact('models'));
        }
    }
}
