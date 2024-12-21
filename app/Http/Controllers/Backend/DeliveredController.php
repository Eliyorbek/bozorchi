<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderDelivery;
use App\Models\OrderItem;

class DeliveredController extends Controller
{
    public function index(){
        return view('backend.delivered.index');
    }

    public function filtr(Request $request){
        if ($request->date!=null){
            $delivery = OrderDelivery::whereDate('created_at',$request->date)->get();
            $models = [];
            foreach ($delivery as $deliv){
                array_push($models,OrderItem::where('order_id' , $deliv->order_id)->get());
            }
        }elseif($request->kuryer!=null){
            $kuryer = OrderDelivery::whereHas('kuryer' , function($query) use ($request){
                $query->where('name' , $request->kuryer);
            })->get();
            $models = [];
            foreach ($kuryer as $deliv){
                array_push($models,OrderItem::where('order_id' , $deliv->order_id)->get());
            }
        
        }
        $thead =[
            0=>'№',
            1=>'nomi',
            2=>'narxi',
            3=>'miqdori',
            4=>'jami summa',
        ];
        return view('backend.delivered.table' , compact('models' , 'thead'));

       
    }
}
