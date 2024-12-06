<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\AddToCartResource;
use App\Http\Resources\Api\ProductsResource;
use App\Models\AddToCard;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    // Add product to cart
    public function addToCart(Request $request, $id)
    {
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'Foydalanuvchi tizimga kirgan emas.',
            ]);
        }

        $product = Product::where('id', $id)->where('status', 'active')->first();

        if ($product == null || $product->count == 0) {
            return response()->json([
                'success' => false,
                'message' => 'Mahsulot topilmadi.',
            ]);
        }

        $cart = AddToCard::where('user_id', Auth::user()->id)->get();

        if ($cart->isEmpty()) {
            AddToCard::create([
                'user_id' => Auth::user()->id,
                'product_id' => $product->id,
                'count' => 1,
                'price' => $product->price,
            ]);
        } else {
            $found = false;
            foreach ($cart as $item) {
                if ($item->product_id == $id) {
                    $item->count += 1;
                    $item->save();
                    $found = true;
                    break;
                }
            }

            if (!$found) {
                AddToCard::create([
                    'user_id' => Auth::user()->id,
                    'product_id' => $product->id,
                    'count' => 1,
                    'price' => $product->price,
                ]);
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Mahsulot savatga qo\'shildi.',
            'cart' => AddToCartResource::collection(AddToCard::where('user_id', Auth::user()->id)->get()),

        ]);
    }


    public function getCart()
    {
       if (Auth::check()) {
           $cart = AddToCard::where('user_id', Auth::user()->id)->get();
           if ($cart->isEmpty()) {
               return response()->json([
                   'success' => false,
                   'message' => 'Mahsulot topilmadi.',
               ]);
           }else{
               return response()->json([
                   'success' => true,
                   'data'=>AddToCartResource::collection($cart),
               ]);
           }
       }else{
           return response()->json([
               'success' => false,
               'message'=>'Bunday foydalanuvchi tizimda mavjud emas!'
           ]);
       }
    }



}
