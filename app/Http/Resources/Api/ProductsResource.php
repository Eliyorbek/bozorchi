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
        if ($this->images) {
            foreach ($this->images as $img) {
                array_push($image, 'https://meningbozorchim.uz/storage/product_img/' . $img['path']);
            }
        }

        return [
            'id' => $this->id ?? null,
            'name' => $this->name ?? 'Noma’lum',
            'image' => $image,
            'price' => $this->price ?? 0,
            'discount_price' => $this->discount_price ?? 0,
            'description' => $this->description ?? '',
            'category' => $this->category->name ?? 'Noma’lum',
            'sup-category' => $this->sup->name ?? 'Noma’lum',
            'miqdori' => $this->count ?? 0,
            'o\'lchov birligi' => $this->brend->name ?? 'Noma’lum',
        ];

    }
}
