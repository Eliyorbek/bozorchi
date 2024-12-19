<div>
    <div class="p-4">

        @include('livewire.content-header')
        <div class="card  mt-2">
            <div>
                <div class="card-header d-flex align-items-center justify-content-end" style="gap:10px; line-height: 20px;">
                    <div class="col-lg-10">
                        <form action="">
                            <div class="form-group" >
                                <input type="search" wire:model.live="search" class="form-control" name="" id=""  placeholder="Search">
                            </div>
                        </form>
                    </div>
                    <a href="{{route('order.index')}}" class="btn btn-secondary col-lg-2 mb-3"> <i class="fa fa-arrow-circle-left"></i> &nbsp;Orqaga</a>
                </div>
            </div>

            @if(isset($view) && $view==1)
                @include('livewire.boss.order.show')
                @include('livewire.show')
            @endif
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
                                <td>{{$model->order->client->name}}</td>
                                <td wire:ignore><button type="button" class="btn" style="color:blue;" wire:click="showWindow({{$model->product_id}})">{{$model->product->name}}</button></td>
                                <td>{{$model->price}} so'm</td>
                                <td>{{$model->count}} {{$model->product->brend->name}}</td>
                                <td>{{$model->total_sum}} so'm</td>
{{--                                <td>--}}
{{--                                    <a href="{{route('order-item' , $model->id)}}" class="btn  btn-info btn-sm">Buyurtmalar haqida</a>--}}
{{--                                    <button type="button" class="btn  btn-primary btn-sm" wire:click="showWindow({{$model->id}})"><i class="fa fa-eye"></i></button>--}}
{{--                                    <button type="button" class="btn btn-sm btn-danger" wire:click="deleteWin({{$model->id}})"><i class="fa fa-trash-alt"></i></button>--}}
{{--                                </td>--}}
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                @if(isset($models))
                    {{$models->links()}}
                @endif
            </div>
        </div>
    </div>
    </div>
