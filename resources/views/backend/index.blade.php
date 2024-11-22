@extends('backend.inc.app')
@section('content')
    @php
    $orders = \App\Models\Order::whereIn('status',[0,1])->get();
    $status2 = \App\Models\Order::where('status' , 2)->get();
    $yetkazilganlar = \App\Models\Order::where('status' , 3)->get();
     @endphp
    <style>
        a{
            color: #000000;
        }
    </style>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{$title}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
                        <li class="breadcrumb-item active">{{$title}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row d-flex" >
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-shop"></i></span>

                    <div class="info-box-content">
                        <a href="">
                            <span class="info-box-text">Jami buyurtmalar </span>
                            <span class="info-box-number">
                            {{count($orders)}}
                  <small>ta</small>
                </span>
                        </a>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fa-solid fa-people-carry-box"></i></i></span>

                    <div class="info-box-content">
                        <a href="">
                            <span class="info-box-text">Jarayondagilar</span>
                            <span class="info-box-number">{{count($status2)}}<small> ta</small></span>
                        </a>

                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-money-bill-alt"></i></span>

                    <div class="info-box-content">
                        <a href="">
                            <span class="info-box-text">Yetkazilganlar</span>
                            <span class="info-box-number">{{count($yetkazilganlar)}} <small> ta</small></span>
                        </a>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">New Members</span>
                        <span class="info-box-number">2,000</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

        </div>
    </div>


@endsection




