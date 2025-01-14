@extends('backend.inc.app')
@section('content')
<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Rasmlar</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
                        <li class="breadcrumb-item active">Rasmlar</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    @foreach ($images as $image)
    <div class="card col-lg-3 card-outline card-secondary">
        <div class="card-body">
            <img src="/storage/product_img/{{$image->path}}" style="width: 100%;height:300px;" alt="">
        </div>
        <div class="card-footer">
            <form action="{{route('image-delete.destroy' , $image->id)}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
            </form>
        </div>
    </div>        
    @endforeach
</div>

@endsection