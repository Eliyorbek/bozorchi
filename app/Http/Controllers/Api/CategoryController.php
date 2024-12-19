<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\CategoryResource;
use App\Http\Resources\Api\SupCategoryResource;
use App\Models\Category;
use App\Models\SupCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function allCategories(){
        $categories = Category::where('status', 'active')->get();
        if(!$categories){
            return response()->json([
                'message'=>'Kategoriyalar mavjud emas'
            ],404);
        }else{
            return response()->json([
                'success'=>true,
                'data'=>CategoryResource::collection($categories)
                ],200,[],JSON_UNESCAPED_SLASHES);
        }
    }

    public function getCategory($id){
        $categories = SupCategory::where('category_id', $id)->get();
        $category = Category::find($id);
        if(!$categories){
            return response()->json([
                'message'=>'Malumot topilmadi'
            ]);
        }else{
            return response()->json([
                'success'=>true,
                'data'=>[
                    'id'=>$category->id,
                    'name'=>$category->name,
                    'sup-categories' => SupCategoryResource::collection($categories),
                    'image'=>'https://meningbozorchim.uz/storage/category_img/'.$category->image,
                ],
            ],200,[],JSON_UNESCAPED_SLASHES);
        }
    }
}
