<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DistanceController extends Controller
{
    public function deliveryPrice(Request $request) {
        if ($request->distance != null){
           if ($request->total_sum < 300000){
               $minimal = 1;
               $qoldiq = $request->distance - 1;
               $delivery_price = ($minimal * 4000) + ($qoldiq * 1000);
               return response()->json([
                   'success' => true,
                   'data' => $delivery_price,
               ]);
           }else{
               return response()->json([
                   'success' => true,
                   'data' => 0,
               ]);
           }
        }else{
            return response()->json([
                'message'=>'Masofa aniqlanmagan',
            ]);
        }
    }
}
