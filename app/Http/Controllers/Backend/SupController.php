<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SupCategoryRequest;
use App\Models\SupCategory;
use Illuminate\Http\Request;

class SupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.sup-kategory.index');
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
    public function store(SupCategoryRequest $request)
    {
        $imgName = md5(rand(111,999).microtime()).'.'.$request->file('image')->extension();
        if($request->status == true){
            $request->status = 'active';
        }else{
            $request->status = 'inactive';
        }
        SupCategory::create([
            'name'=>$request->name,
            'category_id'=>$request->category_id,
            'image'=>$imgName,
            'status'=>$request->status,
        ]);
        $request->file('image')->storeAs('public/sup_img',$imgName);
        return redirect()->route('sup-category.index')->with('success' , 'success');
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
    public function update(SupCategoryRequest $request, string $id)
    {
        $sup = SupCategory::find($id);
        if ($request->hasFile('image')) {
            $imgName = md5(rand(111,999).microtime()).'.'.$request->file('image')->extension();
            if (file_exists('storage/sup_img/'.$sup->image)) {
                unlink('storage/sup_img/'.$sup->image);
            }
            $request->file('image')->storeAs('public/sup_img',$imgName);
        }else{
            $imgName = $sup->image;
        }
        if($request->status == true){
            $request->status = 'active';
        }else{
            $request->status = 'inactive';
        }
        $sup->update([
            'name'=>$request->name,
            'category_id'=>$request->category_id,
            'image'=>$imgName,
            'status'=>$request->status,
        ]);
        return redirect()->route('sup-category.index')->with('update' , 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
