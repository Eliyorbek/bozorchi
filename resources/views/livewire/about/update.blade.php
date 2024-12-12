<div>
    <div class="modalShow row">
        <div class="card col-lg-12">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Ilova haqida</h5>
                <button type="button" class="btn-close" wire:click="close()" ></button>
            </div>
            <div class="modal-body">
                <form action="{{route('about.update' , $id)}}" method="POST" class="form">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name" class="name">Nomi</label>
                        <input type="text" id="name" name="name" class="form-control" wire:model="name" placeholder="Nomini kiriting">
                    </div>
                    <div class="form-group">
                        <label for="nae" class="name">Matni</label>
                        <textarea name="description" wire:model="description" placeholder="Matnini kiriting" class="form-control" id="nae" cols="3" rows="2"></textarea>
                    </div>
                    <div class="form-group mt-2">
                        <button type="button" class="btn btn-secondary" wire:click="close()">Chiqish</button>
                        <button type="suubmit" class="btn btn-primary">Saqlash</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
