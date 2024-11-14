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
                        <th>Mahsulot haqida</th>
                        <td>{{$description}}</td>
                    </tr>
                    <tr>
                        <th>Mahsulot imei code</th>
                        <td> imei 1 = {{$imei_1}} <br> imei 2 =  {{$imei_2}}</td>
                    </tr>
                    <tr>
                        <th>Mahsulot narxi</th>
                        <td>{{$price}} so'm</td>
                    </tr>
                    <tr>
                        <th>Mahsulot sotuvdagi</th>
                        <td>{{$sale_price == null ?'0':$sale_price}} so'm</td>
                    </tr>
                    <tr>
                        <th>Mahsulot chegirma narxi</th>
                        <td>{{$discount_price == null ?'0':$discount_price}} so'm</td>
                    </tr>
                    <tr>
                        <th>Mahsulot soni</th>
                        <td>{{$count}} ta</td>
                    </tr>
                    <tr>
                        <th>Mahsulot kategoriyasi</th>
                        <td>{{$category}}</td>
                    </tr>
                    <tr>
                        <th>Mahsulotni brendi</th>
                        <td>{{$brend}}</td>
                    </tr>

                    <tr>
                        <th>Mahsulot rangi</th>
                        <td><button style=" width:100px;height:20px;background-color: {{$color}};border: none;outline: none;"></button></td>
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
