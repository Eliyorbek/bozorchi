<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductIncomeRequest;
use App\Services\ProductIncomeService;
use Illuminate\Http\Request;

class ProductIncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $myincome;
    public function __construct(ProductIncomeService $incomeService){
        $this->myincome = $incomeService;
    }
    public function index()
    {
        return view('backend.productincome.index');
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
    public function store(ProductIncomeRequest $request)
    {
        $data = $request->all();
        $this->myincome->getSave($data);
        return redirect()->route('product-income.index')->with('success' , 'success') ;

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
    public function update(ProductIncomeRequest $request, string $id)
    {
        $data = $request->all();
        $this->myincome->getUpdate($data , $id);
        return redirect()->route('product-income.index')->with('update' , 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
