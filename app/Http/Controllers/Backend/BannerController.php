<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;
use DateTime;
class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view('backend.banner.index');
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
    public function store(BannerRequest $request)
    {
        if ($request->validated()){
            $imgName = md5(rand(1111,9999).microtime()).'.'.$request->file('image')->extension();
            Banner::create([
                'image'=>$imgName,
                'start_date'=>$request->start_date,
                'end_date'=>$request->end_date,
                'slug'=>$request->slug,
            ]);
            $request->file('image')->storeAs('public/banner_img' , $imgName);
            return redirect()->back()->with('success' , 'success');
        }else{
            return redirect()->back()->with('error' , 'error')->with('validate', 'validate');
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
    public function update(BannerRequest $request, string $id)
    {
        if ($request->validated()){
            $banner = Banner::find($id);
            if ($request->hasFile('image')){
                $imgName = md5(rand(1111,9999).microtime()).'.'.$request->file('image')->extension();
                if (file_exists('storage/banner_img/'.$banner->image)){
                    unlink('storage/banner_img/'.$banner->image);
                }
                $request->file('image')->storeAs('public/banner_img' , $imgName);
            }elsa{
                $imgName = $banner->image;
            }
            $banner->update([
                'image'=>$imgName,
                'start_date'=>$request->start_date,
                'end_date'=>$request->end_date,
                'slug'=>$request->slug,
            ]);
            return redirect()->back()->with('update' , 'update');
        }else{
            return redirect()->back()->with('validate', 'validate');
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
