<?php

namespace App\Livewire\Boss\Faq;

use App\Livewire\MyComponent;
use App\Models\Faq;
use Livewire\Component;

class FaqComponent extends MyComponent
{

    public $title = 'Dastur haqida';

    public $thead = [
        0=>'№',
        1=>'text',
        2=>'tahrirlash',
    ];

    public $id,$question,$answer,$faq , $search;

    public function updateWindow($id){
        $this->faq= Faq::find($id);
        $this->updateOpen();
        $this->id = $this->faq->id;
        $this->question = $this->faq->question;
        $this->answer = $this->faq->answer;
    }
    public function deleteUser($id){
        $this->id=$id;
        $this->deleteOpen();
    }
    public function deleteOne($id){
        Faq::destroy($id);
        session()->flash('delete', 'Faq deleted successfully.');
        return redirect()->to('/faq');
    }
    public function render()
    {
        if ($this->search!=null){
            $models = Faq::where('question','like','%'.$this->search.'%')->orWhere('answer','like','%'.$this->search.'%')->paginate(10);
        }else{
            $models = Faq::paginate(10);
    }
        return view('livewire.boss.faq.faq-component'  ,compact('models'));
    }
}
