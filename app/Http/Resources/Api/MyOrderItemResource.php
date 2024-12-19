<?php

namespace App\Http\Resources\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MyOrderItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $products = Product::find($this->product_id);
        return [
            'id'=>$this->id,
            'user_id'=>$this->order->client->id,
            'quantity'=>$this->count,
            'price'=>$this->total_sum,
            'product'=>new ProductsResource($products),
        ];
    }
}
