<div>
    <div class="p-4">

        @if($delete==1)
                @include('livewire.kuryer.delete-message')
                @include('livewire.show')
            @elseif($map==1)
                @include('livewire.kuryer.location')
                @include('livewire.show')
            @endif

        <div>
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">{{$title}}</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a>Home</a></li>
                                <li class="breadcrumb-item active">{{$title}}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @php
            $num=0;
        @endphp
        
            <div class="card card-outline card-primary ">
                <div class="card-header">
                    <form action="{{route('filtr')}}" method="POST" class="row">
                        @csrf
                        <div class="date col-lg-5">
                            <input type="date" class="form-control" name="date" wire:model="date">
                        </div>
                        <select class="form-select col-lg-6" id="basic-usage" name="kuryer" wire:model="kuryer" data-placeholder="Choose one thing">
                            <option value="">Kuryerni tanlang</option>
                                @if(\App\Models\User::where('role' , 2)->get() != null)
                                    @foreach(\App\Models\User::where('role' , 2)->get()  as $user)
                                        <option  value="{{$user->name}}">{{$user->name}}</option>
                                    @endforeach
                                @endif
                        </select>
                        
                        <div class="card-tools col-lg-1">
                            <button type="submit"  class="btn btn-primary">
                               yuborish
                            </button>
                        </div>
                       </form>
                </div>
                <div class="card-body">
                    <table class="table table-bordered  table-responsive-lg" id="example1">
                        @include('livewire.thead')
                         <tbody>
                            @foreach ($models as $item)
                            <tr>
                             <td>{{$item->id}}</td>
                             <td>{{$item->kuryer->name}}</td>
                             <td>{{$item->order->client->name}}</td>
                             <td>{{$item->delivery_price}} so'm</td>
                             <td>{{$item->delivery_price + $item->order->total_sum}} so'm</td>
                            </tr>
                            @endforeach
                         </tbody>
                     </table>
 
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                </div>
                <!-- /.card-footer-->
            </div>

            {{-- <div>
                {{$models->links()}}
            </div> --}}
            
</div>
