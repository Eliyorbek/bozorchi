<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UserRequest;
use App\Http\Resources\Api\ProductsResource;
use App\Http\Resources\UserResource;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyOrderController extends Controller
{

    public function myOrder(){
        $product0 =[];
        $product2 =[];
        $product3 =[];
        $order0 = OrderItem::whereHas('order' , function($query){
            $query->where('client_id' , Auth::user()->id)->whereIn('status' , [0,1]);
        })->get();
        $order2 = OrderItem::whereHas('order' , function($query){
            $query->where('client_id' , Auth::user()->id)->where('status' , 2);
        })->get();
        $order3 = OrderItem::whereHas('order' , function($query){
            $query->where('client_id' , Auth::user()->id)->where('status' , 3);
        })->get();
        $user = User::where('id', Auth::user()->id)->first();
        foreach ($order0 as $order){
            $count = $order->count;
            $total_sum = $order->total_sum;
            array_push($product0 , [
                'count' => $count,
                'total_sum' => $total_sum,
                'product'=>new ProductsResource($order->product),
            ]);
        }
        foreach ($order2 as $order){
            $count = $order->count;
            $total_sum = $order->total_sum;
            array_push($product2 , [
                'count' => $count,
                'total_sum' => $total_sum,
                'product'=>new ProductsResource($order->product),
            ]);
        }
        foreach ($order3 as $order){
            $count = $order->count;
            $total_sum = $order->total_sum;
            array_push($product3 , [
                'count' => $count,
                'total_sum' => $total_sum,
                'product'=>new ProductsResource($order->product),
            ]);
        }

        if($user!=null){
            return response()->json([
                'user'=>$user->name,
                'jarayonda'=>$product0,
                'yetkazilmoqda'=>$product2,
                'yetkazildi'=>$product3,

            ]);
        }else{
            return response()->json([
                'message' => 'User mavjud emas!',
            ]);
        }
    }

}
