<div>
    <div class="modalShow">
        <div class="card-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Mahsulot haqidagi ma'lumotlar</h5>
                <button type="button" class="btn-close" wire:click="close()" ></button>
            </div>
            <div class="modal-body">
                <table class="table-bordered table-responsive-lg table">
                    <tr>
                        <th>Id</th>
                        <td>{{$id}}</td>
                    </tr>
                    <tr>
                        <th>Mahsulot nomi</th>
                        <td>{{$name}}</td>
                    </tr>
                    <tr>
                        <th>Rasm</th>
                        <td>
                            @php
                                $product = \App\Models\Product::find($id);
                            @endphp
                            @if($product && $product->images()->exists())
                                @foreach($product->images as $image)
                                    <img src="{{$product->imagePath() . $image['path'] }}" width="100px" alt="">
                                @endforeach
                            @else
                                <p>Rasm mavjud emas</p>
                            @endif

                        </td>
                    </tr>
                    <tr>
                        <th>Mahsulot haqida</th>
                        <td>{{$description}}</td>
                    </tr>
                    <tr>
                        <th>Mahsulot narxi</th>
                        <td>{{$price}} so'm</td>
                    </tr>
                    <tr>
                        <th>Mahsulot chegirma narxi</th>
                        <td>{{$discount_price == null ?'0':$discount_price}} so'm</td>
                    </tr>
                    <tr>
                        <th>Mahsulot miqdori</th>
                        <td>{{$count}} {{$brend_id}}</td>
                    </tr>
                    <tr>
                        <th>Mahsulot kategoriyasi</th>
                        <td>{{$category_id}}</td>
                    </tr>
                    <tr>
                        <th>Mahsulotni holoti</th>
                        <td><button class="btn btn-{{$status == 'active' ? 'success': 'danger'}}">{{$status}}</button></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" wire:click="close()">Chiqish</button>
            </div>
        </div>
    </div>
</div>