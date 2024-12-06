<div>
    <div class="modalShow row">
        <div class="card col-lg-12">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Parolni tahrirlash</h5>
                <button type="button" class="btn-close" wire:click="clos()" ></button>
            </div>
            <form action="{{route('admin.edit-password' , $id)}}" class="form" method="POST">
            <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="name">Parol</label>
                        <input type="password" id="name" name="password1" class="form-control" wire:model="password1" placeholder="Parolni kiriting">
                    </div>
                    <div class="form group">
                        <label for="email">Tasdiqlash parol</label>
                        <input type="password" name="password2" id="email" wire:model="password2" placeholder="Tasdiqlash parolni kiriting" class="form-control">
                    </div>

                <div class="form-group mt-2">
                    <button type="button" class="btn btn-secondary" wire:click="clos()">Close</button>
                    <button type="submit"  class="btn btn-primary">Save</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
