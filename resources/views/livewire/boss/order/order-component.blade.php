<div>
    <div class="p-4">

        @include('livewire.content-header')
        <div class="card  mt-2">
            <div>
                <div class="card-header d-flex align-items-center justify-content-end" style="gap:10px; line-height: 20px;">
                    <div class="search">
                        <form action="">
                            <div class="form-group d-flex" style="gap:10px;">
                                <input type="search" wire:model.live="search"  name="" id="" style=" padding:6px; outline: none; height: 34px;margin-top: 14px; border-radius: 5px; width: 15rem;" placeholder="Search">
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
