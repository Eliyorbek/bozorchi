<?php

namespace App\Livewire\Game;

use App\Models\Order;
use App\Models\Product;
use Livewire\Component;

class GameComponent extends Component
{
    public $title= "Yutuqli o'yin";
    public $game=0,$start,$end,$order,$id,$golib;

    public function gameStart(){
        $products = Order::whereBetween('created_at' , [$this->start , $this->end])->get();
        $num =[];
        foreach ($products as $product) {
            array_push($num , $product->id);
        }
        if(!$num){
            return redirect()->route('game.index');
        }else{
            $this->golib = rand($num[0] , $num[count($num)-1]);
//            dd($this->golib);
            $this->order = Order::find($this->golib);
            $this->game=1;
        }
    }
    public function render()
    {
        return view('livewire.game.game-component');
    }
}
