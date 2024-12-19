<div>
    <div class="p-4">
        @include('livewire.content-header')
        <div class="row">
            <div class="col-lg-4 card card-outline card-primary">
                <div class="card-header">
                    <form action="" class="row">
                        <div class="form-group col-lg-5">
                            <label for="s">Boshlash sana</label>
                            <input type="date" name="start" wire:model="start" id="s" class="form-control">
                        </div>
                        <div class="form-group col-lg-5">
                            <label for="e">Tugash sana</label>
                            <input type="date" class="form-control" wire:model="end" name="end" id="e">
                        </div>
                        <div class="form-group col-lg-2">
                            <label for="t">O'yin </label>
                            <button type="button" id="t" wire:click="gameStart()" class="btn  btn-primary">O'yna</button>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <form action="">
                        <div class="form-group">
                            @if($game==1)
                                <div wire:ignore>
                                    <input type="text" class="form-control" wire:model="golib" style="width: 100%;height: 200px;font-size:90px; text-align: center;">
                                </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
           @if($game==1)
                <div wire:ignore class="col-lg-8 card card-outline card-primary">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Phone</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->client->name}}</td>
                            <td>{{$order->phone}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
           @endif
        </div>

        </div>
    </div>
</div>
