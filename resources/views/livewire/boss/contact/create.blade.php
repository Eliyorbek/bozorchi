<div>
    <div class="modalShow row">
        <div class="card col-lg-12">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Aloqa ma'lumotlarini qo'shish</h5>
                    <button type="button" class="btn-close" wire:click="close()" ></button>
                </div>
            <form action="{{route('contact.store')}}" method="POST" class="form">
                <div class="modal-body">
                    @csrf
                        <div class="form-group">
                            <label for="name" class="name">Phone</label>
                            <input type="text" id="name" name="phone" class="form-control" wire:model="phone" placeholder="+998905577074">
                        </div>
                    <div class="form-group">
                        <label for="nam" class="name">Telegram Link</label>
                        <input type="text" id="nam" name="telegram" class="form-control" wire:model="telegram" placeholder="https://t.me/eliyorbek_tojimatov">
                    </div>
                    <div class="form-group">
                        <label for="na" class="name">Instagram Link</label>
                        <input type="text" id="na" name="instagram" class="form-control" wire:model="instagram" placeholder="https://www.instagram.com/eliyorbek_tojimatov">
                    </div>
                    <div class="form-group mt-2">
                        <button type="button" class="btn btn-secondary" wire:click="close()">Chiqish</button>
                        <button type="submit" class="btn btn-primary">Saqlash</button>
                    </div>
                </div>
           </form>
            </div>
        </div>
</div>
