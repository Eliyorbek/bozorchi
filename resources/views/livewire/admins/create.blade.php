<div>

    <div class="modalShow row">
        <div class="card col-xl-12">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Yangi kuryer qo'shish</h5>
                <button type="button" class="btn-close" wire:click="close()" ></button>
            </div>
            <div class="modal-body">
                <form action="{{route('add.store')}}" enctype="multipart/form-data" class="form" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control" wire:model="name" placeholder="Ism kiriting">
                    </div>
                    <div class="form group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" wire:model="email" placeholder="Email manzilini kiriting" class="form-control">
                    </div>
                    <div class="form group">
                        <label for="e">Parol</label>
                        <input type="password" name="password" id="e" wire:model="password" placeholder="Parolni kiriting" class="form-control">
                    </div>
                    <div class="form group">
                        <label for="emai">Phone</label>
                        <input type="phone" name="phone" id="emai" wire:model="phone" placeholder="Telefon raqamingizni kiriting" class="form-control">
                    </div>
                    <div class="form group">
                        <label for="ema">Avtomobil raqam</label>
                        <input type="text" name="car_number" id="ema" wire:model="car_number" placeholder="Avtomibil raqamingizni kiriting" class="form-control">
                    </div>
                    <div class="form-group mt-2">
                        <button type="button" class="btn btn-secondary" wire:click="close()">Close</button>
                        <button type="submit"  class="btn btn-primary">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
