<div>
    <div class="p-4">

        @include('livewire.content-header')
        <div class="card card-outline card-primary mt-2">
            <div>
                <div class="card-header row">
                    <div class="col-lg-9">
                        <form action="">
                            <div class="form-group" >
                                <input type="search" wire:model.live="search" class="form-control" name="" id=""  placeholder="Search">
                            </div>
                        </form>
                    </div>
                    <div class="col-3">
                        <select name="statusSearch" wire:model.live="statusSearch" class="form-select" id="">
                            <option value="">Saralash
                                
                            </option>
                            <option value="0">Yangi</option>
                            <option value="1">Jarayonda</option>
                            <option value="3">Yetkazilgan</option>
                        </select>
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
                        @php
                            if($model->status == 0 || $model->status == 1){
                                $color = 'red';
                            }else{
                                $color = 'white';
                            }
                        @endphp
                            <tr style="background-color: {{$color}}">
                                <td>{{$model->id}}</td>
                                <td>{{$model->client->name}}</td>
                                <td>{{$model->phone}}</td>
                                <td style="width: 150px;height: 150px;">{!!$model->address!!}</td>
                                <td>{{$model->delivery_price}} so'm</td>
                                <td style="text-transform: none">
                                    @if ($model->status == 0 || $model->status == 1)
                                    <button type="button"  class="btn btn-sm btn-danger">To'lanmagan</button>
                                    @else
                                    <button type="button"  class="btn btn-sm btn-success">To'langan</button>
                                    @endif
                                </td>
                                <td>{{$model->total_sum}} so'm</td>
                                <td>
                                    <a href="{{route('order-item' , $model->id)}}" class="btn  btn-info btn-sm">Buyurtma haqida</a>
{{--                                    <button type="button" class="btn  btn-primary btn-sm" wire:click="showWindow({{$model->id}})"><i class="fa fa-eye"></i></button>--}}
                                    <button type="button" class="btn btn-sm btn-danger" wire:click="deleteWin({{$model->id}})"><i class="fa fa-trash-alt"></i></button>
                                    <a href="{{route('pdf' , $model->id)}}" class="btn btn-sm btn-secondary">Print</a>
                                    <br>
                                    @if ($model->status == 0)
                                    <button type="button" class="btn btn-sm btn-warning mt-1" wire:click="kuryerAdd({{$model->id}})">Kuryerga biriktirish</button>
                                    @endif
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
