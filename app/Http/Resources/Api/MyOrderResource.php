<?php

namespace App\Http\Resources\Api;

use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MyOrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
       $items = OrderItem::where('order_id' , $this->id)->get();
       if($this->status == 0 || $this->status == 1){
           $status = 'jarayonda';
       }elseif($this->status ==2){
           $status = 'yeg\'ilyapti';
       }elseif($this->status == 3){
           $status= 'yetkazildi';
       }
        return [
            'id'=>$this->id,
            'date'=>$this->created_at->format('d-m-Y'),
            'status'=>$status,
            'orders'=>MyOrderItemResource::collection($items),
        ];
    }
}
