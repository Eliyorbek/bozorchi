<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AddToCard;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Sodium\add;

class OrderController extends Controller
{
    public function orderSave(Request $request){
            $addToCart = AddToCard::where('user_id',$request->user_id)->get();
            if ($addToCart->isEmpty()){
                return response()->json([
                    'status'=>false,
                    'message'=>'Buyurtma mavjud emas !',
                ]);
            }else{
                $order = Order::create([
                    'client_id' => $request->user_id,
                    'phone'=>$request->phone,
                    'address'=>$request->address,
                    'delivery_price'=>$request->delivery_price,
                    'total_sum'=>$request->total_sum,
                ]);
                if ($order != null){
                    foreach ($addToCart as $item) {
                        OrderItem::create([
                            'order_id' => $order->id,
                            'product_id' => $item->product_id,
                            'count' => $item->count,
                            'price' => $item->price,
                            'total_sum' => $item->count*$item->price,
                        ]);
                        Product::where('id', $item->product_id)->first()->decrement('count', $item->count);
                        $item->delete();
                    }
                    return response()->json([
                        'success' => true,
                        'message'=>'Buyurtma saqlandi !',
                    ]);
                }else{
                    return response()->json([[
                        'status'=>false,
                        'message'=>'Buyurtma saqlanmadi !',
                    ]]);
                }
            }
    }
}
