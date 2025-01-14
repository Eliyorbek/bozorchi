<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DeliveryPrice;
use Illuminate\Http\Request;
use App\Models\MaxDeliveryPrice;

class DistanceController extends Controller
{
    public function deliveryPrice(Request $request) {
        $dp = DeliveryPrice::orderBy('id' , 'DESC')->first();
        if ($request->distance != null){
           if ($request->total_sum >= 400000){
               return response()->json([
                   'success' => true,
                   'data' => 0,
               ],200,[],JSON_NUMERIC_CHECK);
           }else{
               if($request->distance <= $dp->min_km){
                   return response()->json([
                       'success' => true,
                       'data' => $dp->min_price,
                   ],200,[],JSON_NUMERIC_CHECK);
               }elseif ($request->distance <= $dp->standart_km && $request->distance > $dp->min_km){
                   return response()->json([
                       'success' => true,
                       'data' => $dp->standart_price,
                   ],200,[],JSON_NUMERIC_CHECK);
               }else{
                   return response()->json([
                       'success' => true,
                       'data' => $dp->max_price,
                   ],200,[],JSON_NUMERIC_CHECK);
               }
           }
        }else{
            return response()->json([
                'message'=>'Masofa aniqlanmagan',
            ]);
        }
    }


    public function price() {
        return response()->json([
            'success' => true,
            'data' => ['price' => MaxDeliveryPrice::orderBy('id' , 'desc')->first()->price]
        ],200,[],JSON_NUMERIC_CHECK);
    }
}
