<div>
    <link rel="stylesheet" href="/my.css">
    <div class="modalShow">
        <div class="card-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Update brend</h5>
                <button type="button" class="btn-close" wire:click="close()" ></button>
            </div>
            <div class="modal-body">
                <form action="" class="form">
                    <div class="form-group">
                        <label for="name" class="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control" wire:model="name" placeholder="Ism kiriting">
                    </div>
                    @include('livewire.activeBtn')
                </form>
                <div class="form-group mt-2">
                    <button type="button" class="btn btn-secondary" wire:click="close()">Close</button>
                    <button type="button" wire:click="saveUpdate({{$id}})" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
