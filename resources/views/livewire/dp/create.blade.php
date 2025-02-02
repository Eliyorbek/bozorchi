<div>

    <div class="modalShow row">
        <div class="card col-xl-12">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Narx belgilash</h5>
                <button type="button" class="btn-close" wire:click="close()" ></button>
            </div>
            <div class="modal-body">
                <form action="{{route('delivery-price.store')}}" enctype="multipart/form-data" class="form" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="name" class="name">Minimalka</label>
                            <input type="text" id="name" name="min" class="form-control" wire:model="name" placeholder="Minimalkani kiriting">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="nam" class="name">Oshirish narxi</label>
                            <input type="text" id="nam" name="price" class="form-control" wire:model="name" placeholder="Oshirish narxni kiriting">
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="na" class="name">Standart km</label>
                            <input type="text" id="na" name="standart_km" class="form-control" wire:model="name" placeholder="Standart masofani kiriting">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="n" class="name">Standart narx</label>
                            <input type="text" id="n" name="standart_price" class="form-control" wire:model="name" placeholder="Standart narxni kiriting">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="pri" class="name">Max km</label>
                            <input type="text" id="pri" name="max_km" class="form-control" wire:model="name" placeholder="Max masofa kiriting">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="pr" class="name">Max narx</label>
                            <input type="text" id="pr" name="max_price" class="form-control" wire:model="name" placeholder="Max narxni kiriting">
                        </div>
                    </div> --}}
                    <div class="form-group mt-2">
                        <button type="button" class="btn btn-secondary" wire:click="close()">Close</button>
                        <button type="submit"  class="btn btn-primary">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
