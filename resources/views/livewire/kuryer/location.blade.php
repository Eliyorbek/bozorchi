<div>
    <style>
        iframe{
            width: 100% !important;
            height: 100% !important;
        }
        .modalSh{
            z-index:6 !important;
            position: fixed;
            left:50%;
            top: 10%;
            transform: translateX(-50%);
        }
    </style>
    <div class="row modalSh">
        <div class="card col-lg-12">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Buyurtma address</h5>
                <button type="button" class="btn-close" wire:click="close()" ></button>
            </div>
            <div class="modal-body row">
                <div class="map col-lg-12" style="width: 100%;height: 100%;">{!! $order->address !!}</div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" wire:click="close()">Chiqish</button>
            </div>
        </div>
    </div>
</div>
