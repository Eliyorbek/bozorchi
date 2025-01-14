<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Spatie\FlareClient\Context\RequestContextProvider;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        if($request->status == true){
            $request->status = 'active';
        }else{
            $request->status = 'inactive';
        }
        if($request->hasFile('image')!=null){
            $product = Product::create([
                'name'=>$request->name,
                'price'=>$request->price,
                'count'=>$request->count,
                'status'=>$request->status,
                'description'=>$request->description,
                'category_id'=>$request->category_id,
                'brend_id'=>$request->brend_id,
                'sup_id'=>$request->sup_id
                ]);
            foreach ($request->file('image') as $image) {
                $imgName = md5(rand(111,999).microtime()).".".$image->extension();
                ProductImage::create([
                    'product_id'=>$product->id,
                    'path'=>$imgName,
                ]);
                $image->storeAs('public/product_img/',$imgName);
            }
            return redirect()->route('product.index')->with('success','Product created successfully');
        }else{
            return redirect()->route('product.index')->with('validate','Product created successfully');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $id)
    {
        $product = Product::find($id);
        if($request->status == true){
            $request->status = 'active';
        }else{
            $request->status = 'inactive';
        }
        if ($request->hasFile('image')) {
            
            foreach ($request->file('image') as $image) {
                $imgName = md5(rand(111,999).microtime()).".".$image->extension();
                ProductImage::create([
                    'product_id'=>$product->id,
                    'path'=>$imgName,
                ]);
                $image->storeAs('public/product_img/',$imgName);
            }
        }else{
            $imgName = $product->image;
        }
        $product->update([
            'name'=>$request->name,
            'price'=>$request->price,
            'count'=>$request->count,
            'status'=>$request->status,
            'description'=>$request->description,
            'category_id'=>$request->category_id,
            'brend_id'=>$request->brend_id,
            'sup_id'=>$request->sup_id
        ]);

        return redirect()->route('product.index')->with('update','Product created successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
