<div>
    <div wire:ignore class="modalShow row" style="width:60% !important;">
        <div class="card col-lg-12">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Buyurtmalar</h5>
                <button wire:click="close()" type="button" class="btn-close"  ></button>
            </div>
            <div class="modal-body">
                <table class="table-bordered table-responsive-lg table">
                    <tr>
                        <th>№</th>
                        <th>Klient</th>
                        <th>Phone</th>
                        <th>Yetkazish narx</th>
                        <th>To'lov holati</th>
                        <th>Jami summa</th>
                        <th>Harakatlar</th>
                    </tr>
                    @if(isset($order))
                        @foreach($order as $model)
                            <tr>
                                <td>{{++$num}}</td>
                                <td>{{$model->client->name}}</td>
                                <td>{{$model->phone}}</td>
                                <td>{{$model->delivery_price}} so'm</td>
                                <td style="text-transform: none"><button type="button"  class="btn btn-sm btn-danger">{{$model->payment_status}}</button></td>
                                <td>{{$model->total_sum}} so'm</td>
                                <td>
                                    <a href="{{route('order-item' , $model->id)}}" class="btn  btn-info btn-sm">Buyurtmalar haqida</a><br>
                                    <button type="button" class="btn btn-sm btn-warning mt-1" wire:click="kuryerAdd({{$model->id}},{{$kuryer->id}})">Kuryerga biriktirish</button>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click="close()"  class="btn btn-secondary">Chiqish</button>
            </div>
        </div>
    </div>
</div>
