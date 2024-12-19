<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeliveryPriceRequest;
use App\Models\DeliveryPrice;
use Illuminate\Http\Request;

class DeliveryPriceControlller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.delivery.delivery-price');
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
    public function store(DeliveryPriceRequest $request)
    {
        DeliveryPrice::create($request->all());
        return redirect()->route('delivery-price.index')->with('success' , 'succcess');
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
    public function update(DeliveryPriceRequest $request, string $id)
    {
        DeliveryPrice::find($id)->update($request->all());
        return redirect()->route('delivery-price.index')->with('update' , 'succcess');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
