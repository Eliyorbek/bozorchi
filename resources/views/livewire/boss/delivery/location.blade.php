<div>
    <style>
        .modalMap{
            z-index:6 !important;
            position: fixed;
            left: 30%;
            top: 50%;
            transform: translateY(-50%);
            background-color:white;
            width: 640px;
            padding: 5px;
            border-radius:20px;
        }
    </style>
    <div class="modalShow row">
        <div class="card col-lg-12">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Buyurtma address</h5>
                <button type="button" class="btn-close" wire:click="close()" ></button>
            </div>
            <div class="modal-body">
                <div class="map">{!! $order->address !!}</div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" wire:click="close()">Chiqish</button>
            </div>
        </div>
    </div>
</div>
