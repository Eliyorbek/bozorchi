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
            @endif

            <div class="card-body">
                <table class="table table-bordered table-responsive-lg">
                    @include('livewire.thead')
                    <tbody>
                    @if(isset($models))
                        @foreach($models as $model)
                            <tr>
                                <td>{{++$num}}</td>
                                <td>{{$model->kuryer->name}}</td>
                                <td>{{$model->order->id}}</td>
                                <td style="text-transform: none"><button type="button" wire:click="statusEdit({{$model->id}})" class="btn btn-sm btn-{{$model->status=='active'?'success':'warning'}}">{{$model->status}}</button></td>
                                <td>
                                    <button type="button" class="btn  btn-warning btn-sm" wire:click="updateWindow({{$model->id}})"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn  btn-primary btn-sm" wire:click="showWindow({{$model->id}})"><i class="fa fa-eye"></i></button>
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
