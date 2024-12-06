<div>
    <div class="p-4">

        @include('livewire.content-header')
        <div class="card card-outline card-primary mt-2">
            <div>
                <div class="card-header d-flex align-items-center justify-content-end" style="gap:10px; line-height: 20px;">

                    <div class="form-group" style="margin-top: 18px;">
                        <div class="input-group">
                            <button type="button" class="btn btn-default float-right" id="daterange-btn">
                                <i class="far fa-calendar-alt"></i>Muddatni tanlang
                                <i class="fas fa-caret-down"></i>
                            </button>
                        </div>
                    </div>
                    <div class="search">
                        <form action="">
                            <div class="form-group d-flex" style="gap:10px;">
                                <input type="search" wire:model.live="search"  name="" id="" style=" padding:6px; outline: none; height: 34px;margin-top: 14px; border-radius: 5px; width: 15rem;" placeholder="Search">
                            </div>
                        </form>
                    </div>
                        <button type="button" wire:click="createOpen()" class="btn btn-sm btn-primary">
                            Add
                        </button>
                </div>
            </div>

        @if(isset($create) && $create==1)
                @include('livewire.boss.client.create')
                @include('livewire.show')
            @endif
            @if(isset($create) && $update==1)
                @include('livewire.boss.client.update')
                @include('livewire.show')
            @endif
            <div class="card-body">
                <table class="table table-bordered table-responsive-lg" >
                    @include('livewire.thead')
                    <tbody>
                    @if(isset($models))
                        @foreach($models as $model)
                            <tr>
                                <td>{{$model->id}}</td>
                                <td>{{$model->name}}</td>
                                <td style="text-transform: none">{{$model->phone}}</td>
                                <td style="text-transform: none">{{$model->address}}</td>
                                <td>
                                    <button class="btn btn-warning btn-sm" wire:click="updateWindow({{$model->id}})"><i class="fa fa-edit"></i></button>
                                    <button class="btn btn-sm btn-danger" wire:click="deleteUser({{$model->id}})"><i class="fa fa-trash-alt"></i></button>
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
