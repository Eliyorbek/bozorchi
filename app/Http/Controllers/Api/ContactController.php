<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $contact = Contact::orderBy('id','desc')->first();
        if($contact!=null){
            return response()->json([
                'success' => true,
                'data' => [
                    'phone' => $contact->phone,
                    'telegram' => $contact->telegram,
                    'instagram' => $contact->instagram,
                ]
            ]);
        }else{
            return response()->json([
                'message' => 'Malumot yoq'
            ]);
        }
    }
}
