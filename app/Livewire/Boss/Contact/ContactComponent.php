<?php

namespace App\Livewire\Boss\Contact;

use App\Livewire\MyComponent;
use App\Models\Contact;
use Livewire\Component;

class ContactComponent extends MyComponent
{
    public $title = 'Biz bilan aloqa';
    public $thead = [
        0=>'№',
        1=>'phone',
        2=>'telegram',
        3=>'instagram',
        4=>'tahrirlash',
    ];

    public $contact,$id,$phone,$telegram,$instagram,$search;

    public function updateWindow($id){
        $this->updateOpen();
        $this->contact = Contact::find($id);
        $this->id = $id;
        $this->phone = $this->contact->phone;
        $this->telegram = $this->contact->telegram;
        $this->instagram = $this->contact->instagram;
    }

    public function deleteUser($id){
        $this->id = $id;
        $this->deleteOpen();
    }

    public function deleteOne($id){
        Contact::destroy($id);
        session()->flash('delete' , 'delete');
        return redirect()->to('/contact');
    }

    public function render()
    {
        if ($this->search!=null){
            $models=Contact::where('phone' , 'LIKE' , '$'.$this->search.'%')->orWhere('telegram' , 'LIKE' , '$'.$this->search.'%')->orWhere('instagram','LIKE','$'.$this->search.'%')->orderBy('id' , 'DESC')->get();
        }else{
            $models = Contact::orderBy('id','desc')->get();
        }
        return view('livewire.boss.contact.contact-component',compact('models'));
    }
}
