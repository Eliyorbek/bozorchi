<?php

namespace App\Livewire\Boss\Banner;

use App\Livewire\MyComponent;
use App\Models\Banner;

class BannerComponent extends MyComponent
{
    public $title = 'Bannerlar';
    public $thead = [
        0=>'№',
        1=>'image',
        2=>'status',
        3=>'tahrirlash'
    ];

    public $status,$endDaate,$today,$day,$isExpired , $image,$start_date,$end_date,$slug,$id;

    public function mount(){
        $models = Banner::all();
        foreach ($models as $model) {
            $this->endDate = new \DateTime($model->end_date);
            $this->today = new \DateTime();
            $this->day = $this->today->diff($this->endDate)->days;
            $this->isExpired = $this->endDate < $this->today;
        }

    }

    public function updateWindow($id){
        $banner = Banner::find($id);
        $this->id = $id;
        $this->updateOpen();
        $this->image = $banner->image;
        $this->end_date = $banner->end_date;
        $this->start_date = $banner->start_date;
        $this->slug = $banner->slug;
    }
    public function render()
    {
        $models = Banner::paginate(10);

        return view('livewire.boss.banner.banner-component' , compact('models'));
    }
}
