<div>
    <div class="p-4">

        @include('livewire.content-header')
        <div class="card card-outline card-primary mt-2">
            <div>
                <div class="card-header row">
                    <div class="col-lg-12">
                        <form action="">
                            <div class="form-group" >
                                <input type="search" wire:model.live="search" class="form-control" name="" id=""  placeholder="Search">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            @if($view==1)
                @include('livewire.boss.sup-category.show')
                @include('livewire.show')
            @elseif($delete==1)
                @include('livewire.delete-message')
                @include('livewire.show')
            @elseif($update==1)
                @include('livewire.boss.order.kuryer')
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
                                <td>{{$model->phone}}</td>
                                <td style="width: 150px;height: 150px;">{!!$model->address!!}</td>
                                <td>{{$model->delivery_price}} so'm</td>
                                <td style="text-transform: none"><button type="button"  class="btn btn-sm btn-danger">{{$model->payment_status}}</button></td>
                                <td>{{$model->total_sum}} so'm</td>
                                <td>
                                    <a href="{{route('order-item' , $model->id)}}" class="btn  btn-info btn-sm">Buyurtmalar haqida</a>
                                    <button type="button" class="btn  btn-primary btn-sm" wire:click="showWindow({{$model->id}})"><i class="fa fa-eye"></i></button>
                                    <button type="button" class="btn btn-sm btn-danger" wire:click="deleteWin({{$model->id}})"><i class="fa fa-trash-alt"></i></button>
                                    <br>
                                    <button type="button" class="btn btn-sm btn-warning mt-1" wire:click="kuryerAdd({{$model->id}})">Kuryerga biriktirish</button>
                                </td>
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
