<?php

namespace App\Http\Resources\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AddToCartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $product = Product::find($this->product_id);
        return [
            'user_id'=>$this->user_id,
            'quantity'=>$this->count,
            'price'=>$this->price,
            'product'=>new ProductsResource($product),
        ];
    }
}
