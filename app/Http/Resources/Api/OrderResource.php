<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'client'=>$this->client->name,
            'phone'=>$this->phone,
            'address'=>$this->address,
            'delivery_price'=>$this->delivey_price,
            'payment_status'=>$this->payment_status,
            'total_sum'=>$this->total_sum,
        ];
    }
}
