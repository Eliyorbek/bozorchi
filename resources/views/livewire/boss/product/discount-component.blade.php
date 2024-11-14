<div>
    <button class="btn btn-outline-secondary btn-sm" wire:click="percentageWindow({{$id}})"><i class="fa fa-percentage"></i></button>

    {{--            view start--}}
    @if(isset($percentage) && $percentage==1)
        <div class="modalShow">
            <div class="card-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Mahsulotga chegirma narx belgilash</h5>
                    <button type="button" class="btn-close" wire:click="close()" ></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="form-group">
                            <label for="">Narx</label>
                            <input type="text" disabled value="{{$price}} so'm"  class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="sale">Sotuv narxiga foiz kiriting(%)</label>
                            <input type="number" id="sale" name="discount_price" wire:model.live="discount_price" placeholder="Narxni belgilash uchun foiz kiriting" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="sale">Sotuv narx</label>
                            <input type="text" disabled  value="{{$sotuv}} so'm"  class="form-control">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" wire:click="close()">Chiqish</button>
                    <button class="btn btn-primary" wire:click="save({{$id}})">Saqlash</button>
                </div>
            </div>
        </div>
        @include('livewire.show')
    @endif

</div>
