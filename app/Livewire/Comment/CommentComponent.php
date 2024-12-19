<?php

namespace App\Livewire\Comment;

use App\Livewire\MyComponent;
use App\Models\Comment;
use Livewire\Component;

class CommentComponent extends MyComponent
{
    public $title = 'Mijozlar fikri';
    public $thead = [
        0=>'№',
        1=>'mijoz',
        2=>'kuryer',
        3=>'fikr',
        4=>'tahrirlash'
    ];

    public $search,$id;


    public function deleteWindow($id){
        $this->id = $id;
        $this->deleteOpen();
    }

    public function deleteOne($id){
        Comment::destroy($id);
    }
    public function render()
    {

        if($this->search!=null){
            $models = Comment::whereHas('client',function($query){
                $query->where('name','like','%'.$this->search.'%');
            })->orderBy('id' , 'desc')->paginate(20);
        }else{
            $models = Comment::orderBy('id' , 'desc')->paginate(20);
        }
        return view('livewire.comment.comment-component' , compact('models'));
    }
}
