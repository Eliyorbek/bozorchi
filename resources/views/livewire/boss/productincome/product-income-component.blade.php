<div>
    <div class="p-4">

        @include('livewire.content-header')
        <div class="card  mt-2">
            @include('livewire.card-header')
            {{--            create start--}}
            @if(isset($create) && $create==1)
                @include('livewire.boss.productincome.create')
                @include('livewire.show')
            @endif
            {{--            create end--}}
            {{--            update start--}}
            @if(isset($update) && $update==1)
                @include('livewire.boss.productincome.update')
                @include('livewire.show')
            @endif
            {{--            update end--}}
            {{--             delete start --}}
            @if(isset($delete) && $delete==1)
                @include('livewire.delete-message')
                @include('livewire.show')
            @endif
            {{--            delete end--}}

            <div class="card-body">
                <table class="table table-bordered table-striped table-responsive-lg">
                    @include('livewire.thead')
                    <tbody>
                    @if(isset($models))
                        @foreach($models as $model)
                            <tr>
                                <td>{{$model->id}}</td>
                                <td>{{$model->supplier->name}}</td>
                                <td>{{$model->date}}</td>
                                <td>{{$model->comment}}</td>
                                <td><button class="btn btn-sm btn-{{$model->status == 'active'?'success':'warning'}}" wire:click="statusEdit({{$model->id}})">{{$model->status}}</button></td>
                                <td class="d-flex" style="gap: 3px;flex-wrap: wrap;">
                                    <button class="btn btn-outline-warning btn-sm" wire:click="updateWindow({{$model->id}})"><i class="fa fa-edit"></i></button>
{{--                                    <button class="btn btn-outline-primary btn-sm" wire:click="showWindow({{$model->id}})"><i class="fa fa-eye"></i></button>--}}
                                    <button type="button" class="btn btn-sm btn-outline-danger" wire:click="deleteWin({{$model->id}})"><i class="fa fa-trash-alt"></i></button>
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
