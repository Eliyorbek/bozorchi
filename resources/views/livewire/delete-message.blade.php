<div>
        <div class="modalShow">
            <div class="content">
                <div class="modal-body">
                    <h2>Ma'lumotni o'chirishni istaysizmi ?</h2>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-danger" wire:click="close()" data-bs-dismiss="modal">No, I won't delete it</button>
                    <button type="button" class="btn btn-primary" wire:click="deleteOne({{$id}})">Yes ,I delete it.</button>
                </div>
            </div>
        </div>
</div>
