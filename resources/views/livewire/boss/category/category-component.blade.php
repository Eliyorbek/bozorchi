<div>
    <div class="p-4">

        @include('livewire.content-header')
        <div class="card  mt-2">
            @include('livewire.card-header')
            @if(isset($create) && $create==1)
                @include('livewire.boss.category.create')
                @include('livewire.show')
            @endif
            @if(isset($update) && $update==1)
                @include('livewire.boss.category.update')
                @include('livewire.show')
            @endif
            <div class="card-body">
                <table class="table table-bordered table-responsive-lg">
                    @include('livewire.thead')
                    <tbody>
                    @if(isset($models))
                        @foreach($models as $model)
                            <tr>
                                <td>{{$model->id}}</td>
                                <td>{{$model->name}}</td>
                                <td style="text-transform: none"><button type="button" wire:click="statusEdit({{$model->id}})" class="btn btn-sm btn-{{$model->status=='active'?'success':'warning'}}">{{$model->status}}</button></td>
                                <td>
                                    <button type="button" class="btn  btn-warning btn-sm" wire:click="updateWindow({{$model->id}})"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-sm btn-danger" wire:click="deleteUser({{$model->id}})"><i class="fa fa-trash-alt"></i></button>
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
