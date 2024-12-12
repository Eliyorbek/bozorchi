<div>
    <div class="modalShow row">
        <div class="card col-lg-12">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Eng ko'p beriladigan savollar</h5>
                    <button type="button" class="btn-close" wire:click="close()" ></button>
                </div>
            <form action="{{route('faq.store')}}" method="POST" class="form">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="name">Savol</label>
                        <textarea name="question" wire:model="question" class="form-control"  id="" cols="3" rows="3"></textarea>
                    </div>
                        <div class="form-group">
                            <label for="name" class="name">Javob</label>
                            <textarea name="answer" wire:model="answer" class="form-control"  id="" cols="3" rows="3"></textarea>
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
