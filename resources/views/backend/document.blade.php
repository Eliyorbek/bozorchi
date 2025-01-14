<html>
<head>
    <title>To'lov cheki</title>
</head>
<style>
    .chek{
        width: 300px;
         
    }
</style>
<body>

    @php
    $sum =0;
    $items = App\Models\OrderItem::where('order_id' , $order['id'])->get();
    $mijoz = App\Models\User::find($order['client_id']);
    foreach ($items as $item){
        $sum+=$item->total_sum;
    }
    @endphp

   <div class="chek" >
    <h1 style="text-align: center;height:46px;background-color:#2b6f02;color:white;">To'lov cheki</h1>

    <h3 style="text-align:center;">{{$sum + $order['delivery_price']}} UZS</h3>

    <table class="table table-bordered" style="width:300px;">
        <tr style="text-align: center;position:relative;">
            <th style="text-transform: capitalize;font-weight:600; ">Sana:</th>
            <td style="font-weight: 400; position:right:0;">{{\Illuminate\Support\Carbon::parse($order['created_at'])->format('d.m.Y');}}</td>
        </tr>
        <span style="width: 300px;height:2px;background-color:black;"></span>
     @foreach ($items as $item)
         <tr style="text-align: center;position:relative;width:100%;">
             <th style="text-transform: capitalize;font-weight:600; position:absolute;right:0;">{{$item->product->name}} :</th> 
             <td style="font-weight: 400; position:absolute;left:0;"> {{$item->price}} x {{$item->count}}</td>
         </tr>
         <span style="width: 300px;height:2px;background-color:black;"></span>
     @endforeach
     <tr style="text-align: center;position:relative;width:100%;">
        <th>Yetkazish narxi:</th>
        <td style="font-weight: 400; position:absolute;left:0;">{{$order['delivery_price']}} UZS</td>
     </tr>
     <tr style="text-align: center;position:relative;width:100%;">
        <th>Jami summa:</th>
        <td style="font-weight: 400; position:absolute;left:0;">{{$sum + $order['delivery_price']}} UZS</td>
     </tr>
     <tr style="text-align: center;position:relative;width:100%;">
        <th>Mijoz:</th>
        <td style="font-weight: 400; position:absolute;left:0;">{{$mijoz->name}}</td>
     </tr>
    </table>
    <h3 style="text-align: center;margin-top:30px;">BOZORCHI</h3>
   </div>
</body>
</html>