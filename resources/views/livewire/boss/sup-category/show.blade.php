<div>
    <div class="modalShow row">
        <div class="card col-lg-12">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Sup kategoriya haqidagi ma'lumotlar</h5>
                <button type="button" class="btn-close" wire:click="close()" ></button>
            </div>
            <div class="modal-body">
                <table class="table-bordered table-responsive-lg table">
                    <tr>
                        <th>Id</th>
                        <td>{{$id}}</td>
                    </tr>
                    <tr>
                        <th>Nomi</th>
                        <td>{{$name}}</td>
                    </tr>
                    <tr>
                        <th>Kategoriya</th>
                        <td>{{$category_id}}</td>
                    </tr>
                    <tr>
                        <th>Rasm</th>
                        <td>
                        <img src="/storage/sup_img/{{$image}}" width="150px" class="img-thumbnail" alt="">
                        </td>
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
