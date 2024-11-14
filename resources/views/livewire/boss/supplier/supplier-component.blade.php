<div>
    <div class="p-4">

        @include('livewire.content-header')
        <div class="card  mt-2">
            @include('livewire.card-header')
            @if(isset($create) && $create==1)
                @include('livewire.boss.supplier.create')
                @include('livewire.show')
            @endif
            @if(isset($create) && $update==1)
                @include('livewire.boss.supplier.update')
                @include('livewire.show')
            @endif
            @if(isset($delete) && $delete==1)
                @include('livewire.delete-message')
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
                                <td style="text-transform: none">{{$model->contact}}</td>
                                <td>
                                    <button class="btn btn-warning btn-sm" wire:click="updateWindow({{$model->id}})"><i class="fa fa-edit"></i></button>
                                    <button class="btn btn-sm btn-danger" wire:click="deleteUser({{$model->id}})"><i class="fa fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                @if(isset($users))
                    {{$users->links()}}
                @endif
            </div>
        </div>
    </div>
</div>
