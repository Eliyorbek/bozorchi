<div>
    <div class="p-4">

        @include('livewire.content-header')
        <div class="card mt-2">
            <div>
                <div class="card-header d-flex align-items-center justify-content-end" style="gap:10px; line-height: 20px;">
                    <div class="col-lg-10">
                        <form action="">
                            <div class="form-group">
                                <input type="search" wire:model.live="search" class="form-control" placeholder="Search">
                            </div>
                        </form>
                    </div>
                    <a href="{{route('order.index')}}" class="btn btn-secondary col-lg-2 mb-3">
                        <i class="fa fa-arrow-circle-left"></i> &nbsp;Orqaga
                    </a>
                </div>
            </div>

            @if(isset($view) && $view == 1)
                @include('livewire.boss.order.show')
                @include('livewire.show')
            @endif
            @if(isset($delete) && $delete == 1)
                @include('livewire.delete-message')
                @include('livewire.show')
            @endif

            <div class="card-body">
                <table class="table table-bordered table-responsive-lg">
                    @include('livewire.thead')
                    <tbody>
                        @if(isset($models))
                            @foreach($models as $model)
                                <tr wire:key="row-{{ $model->id }}">
                                    <td>{{ ++$num }}</td>
                                    <td>{{ $model->order->client->name }}</td>
                                    <td>
                                        <button type="button" class="btn" style="color:blue;" wire:click="showWindow({{ $model->product_id }})">
                                            {{ $model->product->name }}
                                        </button>
                                    </td>
                                    <td>{{ $model->price }} so'm</td>
                                    <td>{{ $model->count }} {{ $model->product->brend->name }}</td>
                                    <td>{{ $model->total_sum }} so'm</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>

                @if(isset($models))
                    <div wire:key="pagination">
                        {{ $models->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
