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
                @include('livewire.boss.delivery.show')
                @include('livewire.show')
            @elseif($map==1)
                @include('livewire.boss.delivery.location')
                @include('livewire.show')
            @elseif($update==1)
                @include('livewire.boss.delivery.add-zakas')
                @include('livewire.show')
            @elseif($delete==1)
                @include('livewire.boss.delivery.delete-message')
                @include('livewire.show')
            @endif

            <div class="card-body">
                <table class="table table-bordered table-responsive-lg">
                    @include('livewire.thead')
                    <tbody>
                    @if(isset($models))
                        @foreach($models as $model)
                            @php
                                $items = \App\Models\OrderItem::where('order_id' , $model->order_id)->get();
                                $total = 0;
                                foreach ($items as $item){
                                    $total+=$item->total_sum;
                                }
                            @endphp
                            <tr>
                                <td>{{++$num}}</td>
                                <td>{{$model->kuryer->name}}</td>
                                <td>{{$model->kuryer->phone}}</td>
                                <td>
                                    @foreach($items as $item)
                                        <span>{{$item->product->name}};</span>
                                    @endforeach
                                </td>
                                <td>{{$total}} so'm</td>
                                <td style="text-transform: none"><button type="button"  class="btn btn-sm btn-{{$model->status==2?'success':'warning'}}">{{$model->status==1?'Olmadi':'Oldi'}}</button></td>
                                <td style="width: 250px;">
                                    <button type="button" class="btn  mt-1 btn-outline-secondary btn-sm" wire:click="updateWindow({{$model->id}})">Buyurtma qo'shish</button>
                                    <button type="button" class="btn  mt-1 btn-primary btn-sm" wire:click="showWindow({{$model->id}})"><i class="fa fa-eye"></i></button>
                                    <button type="button" class="btn  mt-1 btn-success btn-sm" wire:click="openLocaltion({{$model->order_id}})"><i class="fa fa-location-arrow"></i></button>
                                    <button type="button" class="btn mt-1 btn-sm btn-danger" wire:click="deleteWin({{$model->id}})"><i class="fa fa-close"></i></button>
                                    <a href="{{route('order-item' , $model->order->id)}}" class="btn  btn-info btn-sm mt-1 ">Buyurtma haqida</a>
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
