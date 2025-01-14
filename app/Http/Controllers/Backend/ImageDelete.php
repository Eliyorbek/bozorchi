<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductImage;

class ImageDelete extends Controller
{
    public function show($id){
        $images = ProductImage::where('product_id', $id)->get();
        return view('backend.imageDelete.index' ,compact('images'));
    }

    public function destroy($id){
        $image = ProductImage::find($id);
        if(public_path('storage/product_img/'.$image->path)){
            unlink(public_path('storage/product_img/'.$image->path));
        }
        $image->delete();
        return redirect()->route('product.index')->with('delete', 'Resim silindi');
    }
}
