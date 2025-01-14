<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use PDF;

class PDFController extends Controller
{
    public function generatePDF($id)
    {
        $order = Order::find($id);
        $items = OrderItem::where('order_id' , $order->id)->get();
        $orderData = $order->toArray(); 

        $pdf = PDF::loadView('backend.document', ['order' => $orderData]);
        return $pdf->stream('document.pdf');
    }
}
