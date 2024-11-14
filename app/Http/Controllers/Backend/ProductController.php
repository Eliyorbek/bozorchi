<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
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
        $qr_code = [
            'imei_1'=>$request->imei_1,
            'imei_2'=>$request->imei_2,
        ];
        $product = Product::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'count'=>$request->count,
            'qr_code'=>$qr_code,
            'status'=>$request->status,
            'color'=>$request->color,
            'description'=>$request->description,
            'category_id'=>$request->category,
            'brend_id'=>$request->brend,
        ]);
        if(isset($product)){
            return redirect()->back()->with('success','Product created successfully');
        }else{
            return redirect()->back()->with('validate','Something went wrong');
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
        if($request->status == true){
            $request->status = 'active';
        }else{
            $request->status = 'inactive';
        }
        $qr_code = [
            'imei_1'=>$request->imei_1,
            'imei_2'=>$request->imei_2,
        ];
        $product = Product::find($request->id)->update([
            'name'=>$request->name,
            'price'=>$request->price,
            'count'=>$request->count,
            'qr_code'=>$qr_code,
            'status'=>$request->status,
            'color'=>$request->color,
            'description'=>$request->description,
            'category_id'=>$request->category,
            'brend_id'=>$request->brend,
        ]);
        if(isset($product)){
            return redirect()->back()->with('update','Product created successfully');
        }else{
            return redirect()->back()->with('validate','Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
