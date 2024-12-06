<div>

    <div class="p-4">

        @include('livewire.content-header')
        <div class="card card-outline card-primary mt-2">
            @include('livewire.card-header')
            @if(isset($create) && $create==1)
                @include('livewire.boss.banner.create')
                @include('livewire.show')
            @endif
            @if(isset($update) && $update==1)
                @include('livewire.boss.banner.update')
                @include('livewire.show')
            @endif
            @if(isset($delete) && $delete==1)
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
                                <td><img src="/storage/banner_img/{{$model->image}}" style="width: 200px;" class="img-thumbnail" alt=""></td>
                                <td style="text-transform: none"><button type="button"  class="btn btn-sm btn-{{$isExpired?'danger':'success'}}">{{ $isExpired ? 'Muddat tugagan' : 'Muddat hali tugamagan' }}</button></td>
                                <td>
                                    <button type="button" class="btn  btn-warning btn-sm" wire:click="updateWindow({{$model->id}})"><i class="fa fa-edit"></i></button>
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
