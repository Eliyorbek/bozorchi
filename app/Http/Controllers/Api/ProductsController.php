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
use App\Models\MaxDeliveryPrice;

class ProductsController extends Controller
{
    public function allProducts(Request $request): \Illuminate\Http\JsonResponse
    {
        $page = $request->query('page', 1);
        $limit = $request->query('limit', 24);
        $categoryId = $request->query('category_id');
        $sup = $request->query('sup');
        $search = $request->query('search');
        $bannerSlug = $request->query('bannerSlug');
        $products = Product::when($categoryId, function ($query) use ($categoryId) {
            $query->whereHas('category', function ($q) use ($categoryId) {
                $q->where('id', $categoryId);
            });
        })->when($sup, function ($query) use ($sup) {
            $query->whereHas('sup', function ($q) use ($sup) {
                $q->where('id', $sup);
            });
        })->when($search, function ($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        })->when($bannerSlug  , function($query) use ($bannerSlug){
            $query->where('name', 'LIKE' , '%'.$bannerSlug.'%')->orWhereHas('category' , function($q) use ($bannerSlug){
                $q->where('name' , 'LIKE' , '%'.$bannerSlug.'%');
            });
        })
            ->where('status', 'active')->inRandomOrder()
            ->paginate($limit);
        if($products!=null){
            return response()->json([
                'success' => true,
                'data' => ProductsResource::collection($products),
                'pagination' => [
                    'total' => $products->total(), 
                    'count' => $products->count(), 
                    'per_page' => $products->perPage(), 
                    'current_page' => $products->currentPage(),
                    'last_page' => $products->lastPage(),
                    'next_page_url' => $products->nextPageUrl(), 
                    'prev_page_url' => $products->previousPageUrl(),
                ],
            ],200,[],JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
        }else{
            return response()->json([
                'message'=>'Malumot topilmadi',
            ]);
        }
    }

    public function oneProduct($id){
        $product = Product::find($id);
        if($product!=null){
            return response()->json([
                'success' => true,
                'data' => new ProductsResource($product),
            ],200,[],JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
        }else{
            return response()->json([
                'success' => false,
                'data' => $product,
            ]);
        }
    }
    public function ProductFiltrCategory($id){
        $products = Product::where('category_id', $id)->where('status','active')->paginate(20);
        if($products!=null){
            return response()->json([
                'success' => true,
                'data' => ProductsResource::collection($products),
                'pagination' => [
                    'total' => $products->total(), // Jami mahsulotlar soni
                    'count' => $products->count(), // Joriy sahifadagi mahsulotlar soni
                    'per_page' => $products->perPage(), // Har bir sahifadagi mahsulotlar soni
                    'current_page' => $products->currentPage(), // Joriy sahifa raqami
                    'last_page' => $products->lastPage(), // Oxirgi sahifa raqami
                    'next_page_url' => $products->nextPageUrl(), // Keyingi sahifa URL
                    'prev_page_url' => $products->previousPageUrl(), // Oldingi sahifa URL
                ],
            ],200,[],JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
        }else{
            return response()->json([
                'message'=>'Malumot topilmadi',
            ]);
        }
    }

    public function ProductFiltrSupCategory($id){
        $products = Product::where('sup_id', $id)->where('status','active')->paginate(20);
        if($products!=null){
            return response()->json([
                'success' => true,
                'data' => ProductsResource::collection($products),
                'pagination' => [
                    'total' => $products->total(), // Jami mahsulotlar soni
                    'count' => $products->count(), // Joriy sahifadagi mahsulotlar soni
                    'per_page' => $products->perPage(), // Har bir sahifadagi mahsulotlar soni
                    'current_page' => $products->currentPage(), // Joriy sahifa raqami
                    'last_page' => $products->lastPage(), // Oxirgi sahifa raqami
                    'next_page_url' => $products->nextPageUrl(), // Keyingi sahifa URL
                    'prev_page_url' => $products->previousPageUrl(), // Oldingi sahifa URL
                ],
            ],200,[],JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
        }else{
            return response()->json([
                'message'=>'Malumot topilmadi',
            ]);
        }
    }

    // Add product to cart
    public function addToCart(Request $request)
    {

        $product = Product::where('id', $request->productId)->where('status', 'active')->first();

        if ($product == null || $product->count == 0) {
            return response()->json([
                'success' => false,
                'message' => 'Mahsulot topilmadi.',
            ]);
        }

        $cart = AddToCard::where('user_id', $request->userId)->where('product_id' , $product->id)->first();

        if (!$cart) {
            if($product->discount_price == null){
                AddToCard::create([
                    'user_id' => $request->userId,
                    'product_id' => $product->id,
                    'count' => $request->quantity,
                    'price' => $product->price,
                    'total_sum'=>$request->quantity * $product->price,
                ]);
            }else{
                AddToCard::create([
                    'user_id' => $request->userId,
                    'product_id' => $product->id,
                    'count' => $request->quantity,
                    'price' => $product->discount_price,
                    'total_sum'=>$request->quantity * $product->discount_price,
                ]);
            }
        } else {
           if($request->quantity <= 0){
               $cart->delete();
           }else{
               $cart->update([
                   'count'=>$request->quantity
               ]);
           }
        }

        return response()->json([
            'success' => true,
            'message' => 'Mahsulot savatga qo\'shildi.',
            'cart' => AddToCartResource::collection(AddToCard::where('user_id', $request->userId)->get()),
        ],200,[],JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
    }

    public function reduceCard(Request $request){

        $cart = AddToCard::where('user_id', $request->userId)->where('product_id' , $request->productId)->first();

        if(!$cart){
            return response()->json([
                'success' => false,
                'data'=>$cart
            ]);
        }else{
            $cart->delete();
            return response()->json([
                'success' => true,
                'message'=>'Mahsulot savatdan o\'chirildi',
            ]);
        }
    }
    public function getCart($id)
    {
        $free = MaxDeliveryPrice::orderBy('id', 'DESC')->first();
       if (Auth::check()) {
           $cart = AddToCard::where('user_id', $id)->get();
           if ($cart->isEmpty()) {
               return response()->json([
                   'success' => false,
                   'meta'=>[
                    'deliveryFreeAbove'=>$free->price
                   ],
                   'data' => $cart,
               ],200,[],JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
           }else{
               return response()->json([
                   'success' => true,
                   'meta'=>[
                    'deliveryFreeAbove'=>$free->price
                   ],
                   'data'=>AddToCartResource::collection($cart),
               ],200,[],JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
           }
       }else{
           return response()->json([
               'success' => false,
               'message'=>'Bunday foydalanuvchi tizimda mavjud emas!'
           ],200,[],JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
       }
    }



}
