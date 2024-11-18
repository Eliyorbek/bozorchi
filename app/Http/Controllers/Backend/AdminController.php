<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.admin.index');
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
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone=$request->phone;
        $user->car_number=$request->car_number;
        $user->password = Hash::make($request->password);
        $user->role=2;
        if ($user->save()){
            return redirect()->route('add.index')->with('success','Profile Updated Successfully');
        }else{
            return redirect()->route('add.index')->with('error','Something Went Wrong');
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
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone=$request->phone;
        $user->car_number=$request->car_number;
        $user->save();
        return redirect()->route('add.index')->with('update','Profile Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function editPasswordSave(Request $request , $id){
        $request->validate([
            'password1'=>'required',
            'password2'=>'required',
        ]);
        if($request->password1 == $request->password2){
            User::find($id)->update([
                'password'=>Hash::make($request->password),
            ]);
            return redirect()->route('add.index')->with('parol' , 'parol');
        }else{
            return redirect()->route('add.index')->with('xato','Password did not match');
        }
    }
}
