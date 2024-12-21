@extends('backend.inc.app')
@section('content')
<div>
    <div class="p-4">

        <div>
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Yetkazilgan buyutmalar</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a>Home</a></li>
                                <li class="breadcrumb-item active">Yetkazilgan buyutmalar</li>
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
                        <thead>
                            <tr>
                            @for($i=0;$i<count($thead);$i++)
                               <th>{{$thead[$i]}}</th>
                            @endfor
                            </tr>
                            </thead>
                         <tbody>
                            @foreach ($models as $item)
                           @for ($i=0 ; $i<count($item); $i++)
                           <tr>
                            <td>{{$item[$i]['id']}}</td>
                            <td>{{\App\Models\Product::find($item[$i]['product_id'])->name}}</td>
                            <td>{{\App\Models\Product::find($item[$i]['product_id'])->price}} so'm</td>
                            <td>{{$item[$i]['count']}}</td>
                            <td>{{$item[$i]['total_sum']}}</td>
                           </tr>
                           @endfor
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

@endsection