<div>
    <div class="p-4">

        @include('livewire.content-header')
        <div class="card card-outline card-primary mt-2">
            @include('livewire.card-header')
            @if(isset($create) && $create==1)
                @include('livewire.dp.create')
                @include('livewire.show')
            @endif
            @if(isset($update) && $update==1)
                @include('livewire.dp.update')
                @include('livewire.show')
            @endif

            <div class="card-body">
                <table class="table table-bordered table-responsive-lg">
                    @include('livewire.thead')
                    <tbody>
                    @if(isset($models))
                        @foreach($models as $user)
                            <tr>
                                <td>{{++$num}}</td>
                                <td>{{$user->min}} so'm</td>
                                <td>{{$user->price}} so'm</td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm" wire:click="updateWindow({{$user->id}})"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-sm btn-danger" wire:click="deleteUser({{$user->id}})"><i class="fa fa-trash-alt"></i></button>
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
