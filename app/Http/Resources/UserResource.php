<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
            if ($this->image !=null){
                return [
                    'id'=>$this->id,
                    'name'=>$this->name,
                    'email'=>$this->email,
                    'phone'=>$this->phone,
                    'image'=>'https://meningbozorchim.uz/storage/user_img/'.$this->image,
                ];
            }else{
                return [
                    'id'=>$this->id,
                    'name'=>$this->name,
                    'email'=>$this->email,
                    'phone'=>$this->phone,
                ];
            }

        }
}
