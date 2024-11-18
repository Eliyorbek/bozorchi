<div>
    <style>
        .modalSho{
            position: absolute;
            z-index:10;
            top: 100px;
            left: 40%;
            background-color: #fff;
            border-radius: 4%;
        }
    </style>
    <div class="modalSho col-3">
        <div class="card-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Shaxsiy ma'lumotlarni o'zgartirish</h5>
                <button type="button" class="btn-close" wire:click="close()" ></button>
            </div>
            <div class="modal-body">
                <form action="{{route('my-profile-update' , $id)}}" enctype="multipart/form-data" class="form" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name" class="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control" wire:model="name" placeholder="Ism kiriting">
                    </div>
                    <div class="form group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" wire:model="email" placeholder="Email manzilini kiriting" class="form-control">
                    </div>
                    <div class="form group">
                        <label for="emai">Phone</label>
                        <input type="phone" name="phone" id="emai" wire:model="phone" placeholder="Telefon raqamingizni kiriting" class="form-control">
                    </div>
                    <div class="form group">
                        <label for="ema">Avtomobil raqam</label>
                        <input type="text" name="car_number" id="ema" wire:model="car_number" placeholder="Avtomibil raqamingizni kiriting" class="form-control">
                    </div>
                    <div class="form group">
                        <label for="image">Rasm</label>
                        <input type="file" name="image" id="image" wire:model="image" placeholder="Avtomibil raqamingizni kiriting" class="form-control">
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
