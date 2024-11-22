<div>
    <link rel="stylesheet" href="/my.css">
    <div class="modalShow row">
        <div class="card col-lg-12">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Update brend</h5>
                <button type="button" class="btn-close" wire:click="close()" ></button>
            </div>
            <form action="{{route('category.update' , $id)}}" enctype="multipart/form-data" class="form" method="POST">
            <div class="modal-body">
                @csrf
                @method('PUT')
                    <div class="form-group">
                        <label for="name" class="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control" wire:model="name" placeholder="Ism kiriting">
                    </div>
                    <div class="form-group">
                        <label for="name" class="name">Rasm</label><br>
                        <img src="{{$image}}" style="width:150px;" alt="">
                        <input type="file" id="name" name="image" class="form-control" wire:model="image" placeholder="Ism kiriting">
                    </div>
                    @include('livewire.activeBtn')
                <div class="form-group mt-2">
                    <button type="button" class="btn btn-secondary" wire:click="close()">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
            </form>

        </div>
    </div>
</div>
