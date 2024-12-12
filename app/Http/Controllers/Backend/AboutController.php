<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutRequest;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.about.index');
    }


    public function allAbout(){
        $about = About::all();
        if (!$about){
            return response()->json([
                'message'=>'Malumot topilmadi',
            ]);
        }else{
            return response()->json([
                'data'=>[
                    'title'=>$about->name,
                    'description'=>$about->description,
                ],
            ]);
        }
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
    public function store(AboutRequest $request)
    {
        About::create($request->all());
        return redirect()->route('about.index')->with('success' ,'success create');
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
        About::find($id)->update($request->all());
        return redirect()->route('about.index')->with('update' ,'success update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
