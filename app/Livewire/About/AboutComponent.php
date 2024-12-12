<?php

namespace App\Livewire\About;

use App\Livewire\MyComponent;
use App\Models\About;
use Livewire\Component;

class AboutComponent extends MyComponent
{
    public $title = "Ilova haqida";
    public $thead = [
        0=>'№',
        1=>'name',
        2=>'description',
        3=>'Tahrirlash',
    ];
    public $search,$id,$name,$description,$about,$status;

    public function updateWindow($id){
        $this->id = $id;
        $this->updateOpen();
        $this->about = About::find($id);
        $this->name = $this->about->name;
        $this->description = $this->about->description;
    }
    public function deleteUser($id){
        About::destroy($id);
        session()->flash('delete' , 'delete');
        return redirect()->route('about.index');
    }
    public function render()
    {
        if($this->search!=null){
            $models = About::where('name','like','%'.$this->search.'%')->orWhere('description','like','%'.$this->search.'%')->paginate(20);
        }else{
            $models = About::paginate(20);
        }
        return view('livewire.about.about-component',compact('models'));
    }
}
