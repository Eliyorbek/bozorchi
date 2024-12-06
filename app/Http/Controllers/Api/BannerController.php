<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\BannerResource;
use App\Http\Resources\Api\ProductsResource;
use App\Models\Banner;
use App\Models\Product;
use Illuminate\Http\Request;

class BannerController extends Controller
{

    public function index(){
        $today  = new \DateTime();
        $banners = Banner::where('end_date', '>=' , $today)->get();
        if($banners != null){
            return response()->json([
                'success' => true,
                'data' => BannerResource::collection($banners)
            ] , 200,[],JSON_UNESCAPED_SLASHES);
        }else{
            return response()->json([
                'message'=>'Banner mavjud emas !'
            ]);
        }
    }


    public function bannerOne(Request $request,$slug){
        $models = Product::where('name', 'LIKE', '%' . $slug . '%')
            ->orWhereHas('category', function ($query) use ($slug) {
                $query->where('name', 'LIKE', '%' . $slug . '%');
            })->get();
       if($models != null){
           return response()->json([
               'success' => true,
               'data'=>ProductsResource::collection($models)
           ],200,[],JSON_UNESCAPED_SLASHES);
       }else
       {
           return response()->json([
               'message'=>'Ma\'lumot mavjud emas  !'
           ]);
       }
    }
}
