<div>
    <div wire:ignore class="modalShow row ">
        <div class="card col-lg-12">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Mahsulot haqidagi ma'lumotlar</h5>
                <a href="{{route('order-item' , $id)}}" type="button" class="btn-close"  ></a>
            </div>
            <div class="modal-body">
                <table class="table-bordered table-responsive-lg table">
                    <tr>
                        <th>Id</th>
                        <td>{{$product_id}}</td>
                    </tr>
                    <tr>
                        <th>Mahsulot nomi</th>
                        <td>{{$name}}</td>
                    </tr>
                    <tr>
                        <th>Rasm</th>
                        <td>
                            @php
                                $product = \App\Models\Product::find($product_id);
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
                        <th>Mahsulot sup kategoriyasi</th>
                        <td>{{$sup_id}}</td>
                    </tr>
                    <tr>
                        <th>Mahsulotni holoti</th>
                        <td><button class="btn btn-{{$status == 'active' ? 'success': 'danger'}}">{{$status}}</button></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <a href="{{route('order-item' , $id)}}" class="btn btn-secondary">Chiqish</a>
            </div>
        </div>
    </div>
</div>
