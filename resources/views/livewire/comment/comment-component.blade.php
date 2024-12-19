<div>
    <div class="p-4">

        @include('livewire.content-header')
        <div class="card card-outline card-primary mt-2">
            <div>
                <div class="card-header row d-flex" wire:ignore style="align-items: center;">

                    <div class="col-lg-12">
                        <form action="">
                            <div class="form-group" >
                                <input type="search" wire:model.live="search" class="form-control" name="" id=""  placeholder="Search">
                            </div>
                        </form>
                    </div>

                </div>
            </div>

            @if(isset($delete) && $delete==1)
                @include('livewire.delete-message')
                @include('livewire.show')
            @endif
            <div class="card-body">
                <table class="table table-bordered table-responsive-lg">
                    @include('livewire.thead')
                    <tbody>
                    @if(isset($models))
                        @foreach($models as $model)
                            <tr>
                                <td>{{++$num}}</td>
                                <td>{{$model->client->name}}</td>
                                <td><a href="{{route('order-item' , $model->order->id)}}">{{\App\Models\OrderDelivery::where('order_id' , $model->order->id)->first()->kuryer->name}}</a></td>
                                <td>{{$model->comment}}</td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm" wire:click="updateWindow({{$model->id}})"><i class="fa-solid fa-envelope"></i></button>
                                    <button type="button" class="btn btn-sm btn-danger" wire:click="deleteWindow({{$model->id}})"><i class="fa fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                @if(isset($users))
                    {{$users->links()}}
                @endif
            </div>
        </div>
    </div>
</div>
