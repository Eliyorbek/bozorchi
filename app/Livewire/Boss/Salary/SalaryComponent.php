<?php

namespace App\Livewire\Boss\Salary;

use App\Livewire\MyComponent;
use App\Models\OrderDelivery;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class SalaryComponent extends MyComponent
{
    use WithPagination;
    public $title = 'Kuryerlarga pul berish';
    public $thead = [
        0=>'ism',
        1=>'count',
        2=>'yetkazish narx',
        3=>'ish haqi',
    ];

    public function oneSalary($order){
        dd($order);
    }
    public function render()
    {
        $users = User::where('role' , 2)->paginate(10);
        return view('livewire.boss.salary.salary-component' , compact('users'));
    }
}
