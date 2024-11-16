<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\SupCategoryResource;
use App\Models\SupCategory;
use Illuminate\Http\Request;

class SupCategoryController extends Controller
{
    public function allSupCategory(){
        $sup = SupCategory::where('status' , 'active')->get();
        if (!$sup) {
            return response()->json([
                'message'=>'Malumot topilmadi',
            ]);
        }else{
            return response()->json([
                'success'=>true,
                'data'=>SupCategoryResource::collection($sup),
            ],200 ,[],JSON_UNESCAPED_SLASHES);
        }
    }
}
