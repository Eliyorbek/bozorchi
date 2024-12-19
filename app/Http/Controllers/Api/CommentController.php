<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.comment.index');
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
        $comment = Comment::where('user_id', $request->user_id)->where('order_id' , $request->order_id)->first();
        if(!$comment){
            Comment::create([
                'user_id'=>$request->user_id,
                'order_id'=>$request->order_id,
                'comment'=>$request->comment,
            ]);
            return response()->json([
                'success' => true,
                'message'=>'Comment muvofaqiyatli jo\'natildi',
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message'=>'Comment avval yozilgan ',
            ]);
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
