<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $image = [];
        foreach ($this->images as $img){
            array_push($image, '/storage/product_img/'.$img['path']);
        }
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'image'=>$image,
            'price'=>$this->price." so'm",
            'discount_price'=>$this->discount_price." so'm",
            'description'=>$this->description,
            'category'=>$this->category->name,
            'sup-category'=>$this->sup->name,
            'miqdori'=>$this->count,
            'o\'lchov birligi'=>$this->brend->name,
        ];
    }
}
