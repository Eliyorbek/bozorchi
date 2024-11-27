<div>
    <div class="p-4">

        <div>
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">{{$title}}</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a>Home</a></li>
                                <li class="breadcrumb-item active">{{$title}}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card  mt-2">
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
                @include('livewire.kuryer.show')
                @include('livewire.show')
            @elseif($delete==1)
                @include('livewire.kuryer.delete-message')
                @include('livewire.show')
            @elseif($map==1)
                @include('livewire.kuryer.location')
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
                                 <td>{{$model->kuryer->name}}</td>, jh.
                                <td>{{$model->order->client->phone}}</td>
                                <td>{{$model->delivery_price}} so'm</td>
                                <td>{{$total + $model->delivery_price}} so'm</td>
                                <td style="text-transform: none"><button type="button"  wire:click="statusEdit({{$model->id}})" class="btn btn-sm btn-{{$model->status==2?'success':'warning'}}">{{$model->status==1?'Olmadi':'Oldi'}}</button></td>
                                <td>
                                    <button type="button" class="btn  btn-primary btn-sm" wire:click="showWindow({{$model->id}})"><i class="fa fa-eye"></i></button>
                                    <button type="button" class="btn btn-sm btn-danger" wire:click="deleteWin({{$model->id}})"><i class="fa fa-close"></i></button>
                                    <button type="button" class="btn  btn-info btn-sm" wire:click="openLocaltion({{$model->order_id}})"><i class="fa fa-location-arrow"></i></button>
                                    <button type="button" class="btn  btn-success btn-sm" onclick="alert('Buyurtma mijozga muvofaqqiyatli yetkazildimi ?')" wire:click="check({{$model->id}})"><i class="fa fa-check"></i></button>
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
