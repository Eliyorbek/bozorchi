<div>
    <link rel="stylesheet" href="/my.css">
        <div class="modalShow">
            <div class="card-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Kategoriya qo'shish</h5>
                    <button type="button" class="btn-close" wire:click="close()" ></button>
                </div>
                <form action="{{route('category.store')}}" method="POST" class="form" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                        <div class="form-group">
                            <label for="name" class="name">Nomi</label>
                            <input type="text" id="name" name="name" class="form-control" wire:model="name" placeholder="Ism kiriting">
                        </div>
                        <div class="form-group">
                            <label for="name" class="name">Rasm</label>
                            <input type="file" id="name" name="image" class="form-control" wire:model="image" placeholder="Ism kiriting">
                        </div>
                        @include('livewire.activeBtn')
                    <div class="form-group mt-2">
                        <button type="button" class="btn btn-secondary" wire:click="close()">Close</button>
                        <button type="submit"  class="btn btn-primary">Save</button>
                    </div>
                </div>
                </form>

            </div>
        </div>
</div>
