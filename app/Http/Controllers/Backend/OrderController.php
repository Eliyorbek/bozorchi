<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        return view('backend.order.index');
    }

    public function orderItem($id){
        return view('backend.order.orderItem',compact('id'));
    }
}
