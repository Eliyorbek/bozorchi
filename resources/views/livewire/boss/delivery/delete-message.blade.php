<div>
        <div class="modalShow row">
            <div class="card col-lg-12">
                <div class="modal-body">
                    <h2>Buyurtmani bekor qilishni istaysizmi ?</h2>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-danger" wire:click="close()" data-bs-dismiss="modal">Yo'q</button>
                    <button type="button" class="btn btn-primary" wire:click="deleteOne({{$id}})">Ha</button>
                </div>
            </div>
        </div>
</div>
