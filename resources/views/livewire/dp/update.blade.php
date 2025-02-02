<div>

    <div class="modalShow row">
        <div class="card col-xl-12">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Narx belgilash</h5>
                <button type="button" class="btn-close" wire:click="close()" ></button>
            </div>
            <div class="modal-body">
                <form action="{{route('delivery-price.update' , $id)}}" enctype="multipart/form-data" class="form" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="name" class="name">Minimalka</label>
                            <input type="text" id="name" name="min" class="form-control" wire:model="min" placeholder="Minimalkani kiriting">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="nam" class="name">Oshirish narxi</label>
                            <input type="text" id="nam" name="price" class="form-control" wire:model="price" placeholder="Oshirish narxni kiriting">
                        </div>
                    </div>
                   
                    <div class="form-group mt-2">
                        <button type="button" class="btn btn-secondary" wire:click="close()">Close</button>
                        <button type="submit"  class="btn btn-primary">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
