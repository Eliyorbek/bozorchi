<div>
    <div class="p-4">

        @include('livewire.content-header')
        <div class="mt-2">
{{--            @include('livewire.card-header')--}}
            {{--            create start--}}
            @if(isset($create) && $create==1)
                @include('livewire.boss.product.create')
                @include('livewire.show')
            @endif
            {{--            create end--}}
            {{--            update start--}}
            @if(isset($update) && $update==1)
                @include('livewire.boss.product.update')
                @include('livewire.show')
            @endif
            {{--            update end--}}
            {{--             delete start --}}
            @if(isset($delete) && $delete==1)
                @include('livewire.delete-message')
                @include('livewire.show')
            @endif
            {{--            delete end--}}
            {{--            view start--}}
            @if(isset($view) && $view==1)
                @include('livewire.boss.product.show')
                @include('livewire.show')
            @endif
            {{--            view end--}}

                @if($users != null)
                    @foreach($users as $user)
                        @php
                        $orders = \App\Models\OrderDelivery::where('courier_id',$user->id)->where('status' , 3)->paginate(10);
                        $delivery_price = 0;
                        $total_sum = 0;
                        foreach ($orders as $order){
                            $delivery_price+=$order->delivery_price;
                            $total_sum+=($order->order->total_sum / 100) * 7;
                        }
                         @endphp
                    <div class="card card-outline card-primary card collapsed-card">
                        <div class="card-header">
                           <table class="table table-bordered">
                               @include('livewire.thead')
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{count($orders)}} ta</td>
                                    <td>{{$delivery_price}} so'm</td>
                                    <td>{{$total_sum}} so'm</td>
                                </tr>
                           </table>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped table-responsive-lg">
                                <thead>
                                <tr>
                                    <th>№</th>
                                    <th>Mijoz</th>
                                    <th>Mahsulotlar</th>
                                    <th>Yetkazish narx</th>
                                    <th>Buyurtma narx</th>
                                    <th><button type="button" wire:click="allOrder({{$user->id}})" class="btn btn-sm btn-primary">Pul berish</button></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($orders))
                                    @foreach($orders as $model)
                                        <tr>
                                            <td>{{++$num}}</td>
                                            <td>{{$order->order->client->name}}</td>
                                            <td>
                                                @php
                                                $items = \App\Models\OrderItem::where('order_id',$order->order->id)->get();
                                                @endphp
                                                @foreach($items as $item)
                                                    <span>{{$item->product->name}} ;</span>
                                                @endforeach
                                            </td>
                                            <td>{{$order->delivery_price}} so'm</td>
                                            <td>{{$order->order->total_sum}} so'm</td>
                                            <td><button type="button" wire:click="oneSalary({{$order->id}})" class="btn btn-success btn-sm"><i class="fa fa-dollar-sign"></i></button></td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                            {{$orders->links()}}
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                           {{$users->links()}}
                        </div>
                        <!-- /.card-footer-->
                    </div>
                    @endforeach
                @endif
        </div>
    </div>
</div>
