<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\ProductsResource;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request){
        $search = $request->input('search', '');
        if (!empty($search)) {
            $models = Product::where(function($query) use ($search) {
                $query->where('name', 'like', "%$search%")
                    ->orWhere('description', 'like', "%$search%")
                    ->orWhere('price', 'like', "%$search%")
                    ->orWhereHas('category', function($query) use ($search) {
                        $query->where('name', 'like', "%$search%");
                    })->orWhereHas('brend', function($query) use ($search) {
                        $query->where('name', 'like', "%$search%");
                    })->orWhereHas('sup', function($query) use ($search) {
                        $query->where('name', 'like', "%$search%");
                    });
            })->get();
            return response()->json([
                'success' => true,
                'data' => ProductsResource::collection($models)
            ],200,[], JSON_UNESCAPED_SLASHES);
        } else {
            $models = collect();
            return response()->json([
                'success' => false,
                'data' => ProductsResource::collection($models),
            ]);
        }

    }
}
