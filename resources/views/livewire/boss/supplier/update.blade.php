<div>
    <div class="modalShow">
        <div class="card-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Yetkazib beruvchini qo'shish</h5>
                <button type="button" class="btn-close" wire:click="close()" ></button>
            </div>
            <div class="modal-body">
                <form action="{{route('supplier.update' , $id)}}" class="form" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name" class="name">F.I.SH</label>
                        <input type="text" id="name" name="name" class="form-control" wire:model="name" placeholder="Ism kiriting">
                    </div>
                    <div class="form group">
                        <label for="password">Telefon nomer</label>
                        <input type="tel" class="form-control" name="contact" wire:model="contact" placeholder="998">
                    </div>
                    <div class="form-group mt-2">
                        <button type="button" class="btn btn-secondary" wire:click="close()">Close</button>
                        <button type="submit" wire:click="save()" class="btn btn-primary">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
