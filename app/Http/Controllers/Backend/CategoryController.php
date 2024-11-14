<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.category.index');
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
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name',
            'image'=>'required|image|mimes:jpeg,png,jpg,svg',
        ]);
        $imgName = md5(rand(111,999).microtime()).'.'.$request->file('image')->extension();
        if($request->status == true){
            Category::create([
                'name'=>$request->name,
                'image'=>$imgName,
                'status'=>'active'
            ]);
        }else{
            Category::create([
                'name'=>$request->name,
                'image'=>$imgName,
                'status'=>'inactive'
            ]);
        }
        $request->file('image')->storeAs('public/category_img',$imgName);
        return redirect()->route('category.index')->with('success' , 'success');
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
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);
        $request->validate([
            'name' => 'required|unique:categories,name,'.$id,
        ]);

        if ($request->hasFile('image')) {
            $imgName = md5(rand(111,999).microtime()).'.'.$request->file('image')->extension();
            if(is_file(public_path('storage/category_img/'.$category->image))){
                unlink(public_path('storage/category_img/'.$category->image));
            }
            $request->file('image')->storeAs('public/category_img',$imgName);
        }else{

            $imgName = $category->image;
        }
        $category->update([
            'name'=>$request->name,
            'image'=>$imgName,
        ]);
        return redirect()->route('category.index')->with('update' , 'success');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
