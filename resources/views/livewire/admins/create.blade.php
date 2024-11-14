<div>
        <div class="modalShow">
            <div class="card-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add a new admin</h5>
                    <button type="button" class="btn-close" wire:click="close()" ></button>
                </div>
                <div class="modal-body">
                    <form action="" class="form">
                        <div class="form-group">
                            <label for="name" class="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" wire:model="name" placeholder="Ism kiriting">
                        </div>
                        <div class="form group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" wire:model="email" placeholder="Email manzilini kiriting" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" wire:model="password" id="password" placeholder="Parolni kiriting"  class="form-control">
                        </div>
                    </form>
                    <div class="form-group mt-2">
                        <button type="button" class="btn btn-secondary" wire:click="close()">Close</button>
                        <button type="button" wire:click="saveAdmin()" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
</div>
