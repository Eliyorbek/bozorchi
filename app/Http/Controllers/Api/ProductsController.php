<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\ProductsResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{
    public function allProducts(): \Illuminate\Http\JsonResponse
    {
        $products = Product::where('status', 'active')->get();
        if($products!=null){
            return response()->json([
                'success' => true,
                'data' => ProductsResource::collection($products),
            ],200,[],JSON_UNESCAPED_SLASHES);
        }else{
            return response()->json([
                'message'=>'Malumot topilmadi',
            ]);
        }
    }

    public function ProductFiltrCategory($id){
        $products = Product::where('category_id', $id)->where('status','active')->get();
        if($products!=null){
            return response()->json([
                'success' => true,
                'data' => ProductsResource::collection($products),
            ],200,[],JSON_UNESCAPED_SLASHES);
        }else{
            return response()->json([
                'message'=>'Malumot topilmadi',
            ]);
        }
    }

    public function ProductFiltrSupCategory($id){
        $products = Product::where('sup_id', $id)->where('status','active')->get();
        if($products!=null){
            return response()->json([
                'success' => true,
                'data' => ProductsResource::collection($products),
            ],200,[],JSON_UNESCAPED_SLASHES);
        }else{
            return response()->json([
                'message'=>'Malumot topilmadi',
            ]);
        }
    }

    public function addToCart($id)
    {
        $product = Product::where('id', $id)->where('status', 'active')->first();
        if (!$product) {
            return response()->json(['message' => 'Mahsulot topilmadi'], 404);
        }
        $cart = session()->get('cart', []);
        $found = false;
        foreach ($cart as &$item) {
            if ($item['product_id'] == $id) {
                $item['count'] += 1;
                $found = true;
                break;
            }
        }

        if (!$found) {
            $cart[] = [
                'product_id' => $product->id,
                'count' => 1,
            ];
        }

        session()->put('cart', $cart);

        return response()->json([
            'success' => true,
            'data' => $cart,
        ]);
    }



}
