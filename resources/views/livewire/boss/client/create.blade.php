<div>
    <div class="modalShow">
        <div class="card-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add a new client</h5>
                <button type="button" class="btn-close" wire:click="close()" ></button>
            </div>
            <div class="modal-body">
                <form action="" class="form">
                    <div class="form-group">
                        <label for="name" class="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control" wire:model="name" placeholder="Ism kiriting">
                    </div>
                    <div class="form group">
                        <label for="email">Phone</label>
                        <input type="tel" name="phone" id="email" wire:model="phone" placeholder="+998 ___ __ __" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Address</label>
                        <textarea name="address" wire:model="address" cols="2" rows="2" placeholder="Mijoz adressini kiriting" class="form-control"></textarea>
                    </div>
                </form>
                <div class="form-group mt-2">
                    <button type="button" class="btn btn-secondary" wire:click="close()">Close</button>
                    <button type="button" wire:click="save()" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
