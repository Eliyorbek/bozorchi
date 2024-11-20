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
            @elseif($map==1)
                @include('livewire.boss.delivery.location')
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
                                <td>
                                    @foreach($items as $item)
                                        <span>{{$item->product->name}};</span>
                                    @endforeach
                                </td>
                                <td>{{$total}} so'm</td>
                                <td style="text-transform: none"><button type="button"  class="btn btn-sm btn-{{$model->status==2?'success':'warning'}}">{{$model->status==1?'Olmadi':'Oldi'}}</button></td>
                                <td>
                                    <button type="button" class="btn  btn-info btn-sm" wire:click="showWindow({{$model->id}})">Buyurtma qo'shish</button>
                                    <button type="button" class="btn  btn-primary btn-sm" wire:click="showWindow({{$model->id}})"><i class="fa fa-eye"></i></button>
                                    <button type="button" class="btn  btn-success btn-sm" wire:click="openLocaltion({{$model->order_id}})"><i class="fa fa-location-arrow"></i></button>
                                    <button type="button" class="btn btn-sm btn-danger" wire:click="deleteWin({{$model->id}})"><i class="fa fa-trash-alt"></i></button>
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
