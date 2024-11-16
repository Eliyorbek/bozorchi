<?php

namespace App\Livewire\Boss\Delivery;

use App\Livewire\MyComponent;
use App\Models\Delivery;
use Livewire\Component;
use Livewire\WithPagination;

class DeliveryComponent extends MyComponent
{
    use WithPagination;

    public $title = 'Zakaslarni yetkazib berish';
    public $thead = [
        0=>'№',
        1=>'Kuryer',
        2=>'Buyurma',
        3=>'Status',
        4=>'Tahrirlash',
    ];
    public function render()
    {
        $models = Delivery::paginate(15);
        return view('livewire.boss.delivery.delivery-component' , compact('models'));
    }
}
