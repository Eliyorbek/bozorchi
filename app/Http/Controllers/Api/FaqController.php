<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\FaqResource;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(){
        $faqs = Faq::all();
        if ($faqs != null) {
            return response()->json([
                'success' => true,
                'data' =>FaqResource::collection($faqs),
            ]);
        }else{
            return response()->json([
                'message' => 'Malumot yoq',
            ]);
        }
    }
}
