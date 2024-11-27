<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeliveredController extends Controller
{
    public function index(){
        return view('backend.delivered.index');
    }
}
