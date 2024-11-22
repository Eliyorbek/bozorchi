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
                        <th>Mahsulot nomi</th>
                        <th>Mahsulot miqdor</th>
                    </tr>
                    @foreach($orderItems as $orderItem)
                        <tr>
                            <td>{{$orderItem->product->name}}</td>
                            <td>{{$orderItem->count}} {{$orderItem->product->brend->name}}</td>
                        </tr>
                        @php $sum+=$orderItem->total_sum; @endphp
                    @endforeach
                    <tr>
                        <th>Jami harid summasi</th>
                        <td>{{$sum}} so'm</td>
                    </tr>
                    <tr>
                        <th>Yetkazish narxi</th>
                        <td>{{$order->delivery_price}} so'm</td>
                    </tr>
                    <tr>
                        <th>Jami to'lov summasi</th>
                        <td>{{$order->delivery_price + $sum}} so'm</td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click="close()"  class="btn btn-secondary">Chiqish</button>
            </div>
        </div>
    </div>
</div>
