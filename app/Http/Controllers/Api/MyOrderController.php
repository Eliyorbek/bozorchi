<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UserRequest;
use App\Http\Resources\Api\MyOrderItemResource;
use App\Http\Resources\Api\MyOrderResource;
use App\Http\Resources\Api\ProductsResource;
use App\Http\Resources\UserResource;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyOrderController extends Controller
{

    public function myOrder($id){
        $orders = Order::where('client_id' , $id)->get();
        return response()->json([
            'success' => true,
            'data'=>MyOrderResource::collection($orders),
        ],200,[],JSON_NUMERIC_CHECK);
    }

    public function myOrderItem($id){
        $order0 = OrderItem::where('order_id' , $id)->whereIn('status' , [0,1])->get();
        $order1 = OrderItem::where('order_id' , $id)->where('status' , 2)->get();
        $order3= OrderItem::where('order_id' , $id)->where('status' , 3)->get();

        return response()->json([
            'success' => true,
            'data'=>[
                'jarayonda'=>MyOrderItemResource::collection($order0),
                'yetkazilmoqda'=>MyOrderItemResource::collection($order1),
                'yetkazildi'=>MyOrderItemResource::collection($order3),
            ]
        ],200,[],JSON_NUMERIC_CHECK | JSON_UNESCAPED_SLASHES);
    }
}
