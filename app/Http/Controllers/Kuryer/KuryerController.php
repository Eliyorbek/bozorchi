<?php

namespace App\Http\Controllers\Kuryer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KuryerController extends Controller
{
    public function index(){
        return view('backend.kuryer.index');
    }

    public function myZakas(){
        return view('backend.kuryer.my-zakas');
    }
}
