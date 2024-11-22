<div>
    <div wire:ignore class="modalShow row">
        <div class="card col-lg-12">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Kuryerlar</h5>
                <button type="button" class="btn-close"  wire:click="close()"></button>
            </div>
            <div class="modal-body">
                <table class="table-bordered table-responsive-lg table">
                    <tr>
                        <th>FISH</th>
                        <th>Tel:</th>
                        <th>Holatlar</th>
                    </tr>
                    @foreach($kuryers as $kuryer)
                        <tr>
                            <td>{{$kuryer->name}}</td>
                            <td>{{$kuryer->phone}}</td>
                            <td><button type="button" wire:click="biriktir({{$order->id}},{{$kuryer->id}})" class="btn btn-sm btn-success">Biriktirish</button></td>
                        </tr>
                    @endforeach
                </table>
{{--                {{$kuryers->links()}}--}}

            </div>
            <div class="modal-footer">
                <button wire:click="close()"  class="btn btn-secondary">Chiqish</button>
            </div>
        </div>
    </div>
</div>
