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
        $free = MaxDeliveryPrice::orderBy('id' , 'DESC')->first();
        dd($free->price);
        if ($request->distance != null){
           if ($request->total_sum >= $free->price){
               return response()->json([
                   'success' => true,
                   'data' => 0,
               ],200,[],JSON_NUMERIC_CHECK);
           }else{
            if($request->distance > 1){
                $price = 1 * $dp->min + ($request->distance - 1) * $dp->price; 
            return response()->json([
                       'success' => true,
                       'data' => $price,
            ],200,[],JSON_NUMERIC_CHECK);
           }else{
            $price = $dp->min; 
            return response()->json([
                       'success' => true,
                       'data' => $price,
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
