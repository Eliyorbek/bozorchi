<div>
    <link rel="stylesheet" href="/my.css">
    <div wire:ignore class="modalShow row">
        <div class="card col-lg-12">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Yetkazilish ma'lumotlar</h5>
                <button wire:click="close()" type="button" class="btn-close"  ></button>
            </div>
            <div class="modal-body">
                <table class="table-bordered table-responsive-lg table">
                    <tr>
                        <th colspan="2">Kuryer</th>
                        <td colspan="2">{{$delivery->kuryer->name}}</td>
                    </tr>
                    <tr>
                        <th colspan="2">Mijoz</th>
                        <td colspan="2">{{$delivery->order->client->name}}</td>
                    </tr>
                    <tr>
                        <th>Mahsulot nomi</th>
                        <th>Mahsulot narxi</th>
                        <th>Mahsulot miqdori</th>
                        <th>Mahsulot jami puli</th>
                    </tr>
                    @foreach($orderItems as $orderItem)
                        <tr>
                            <td>{{$orderItem->product->name}}</td>
                            <td>{{$orderItem->price}} so'm</td>
                            <td>{{$orderItem->count}} {{$orderItem->product->brend->name}}</td>
                            <td>{{$orderItem->total_sum}} so'm</td>
                        </tr>
                        @php $sum+=$orderItem->total_sum; @endphp
                    @endforeach
                    <tr>
                        <th colspan="2">Jami harid summasi</th>
                        <td colspan="2">{{$sum}} so'm</td>
                    </tr>
                    <tr>
                        <th colspan="2">Yetkazish narxi</th>
                        <td colspan="2">{{$order->delivery_price}} so'm</td>
                    </tr>
                    <tr>
                        <th colspan="2">Jami to'lov summasi</th>
                        <td colspan="2">{{$order->delivery_price + $sum}} so'm</td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click="close()"  class="btn btn-secondary">Chiqish</button>
            </div>
        </div>
    </div>
</div>
