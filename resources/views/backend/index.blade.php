@extends('backend.inc.app')
@section('content')
    @php
    $orders = \App\Models\Order::where('status',0)->get();
    $status2 = \App\Models\Order::whereIn('status' , [1,2])->get();
    $yetkazilganlar = \App\Models\Order::where('status' , 3)->get();
    $clients = \App\Models\User::where('role' , 3)->get();
     @endphp
    <style>
        a{
            color: #000000;
        }
    </style>

    @if(\Illuminate\Support\Facades\Session::has('bozorchi'))
        <link
                rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
        />
        <div>
            <style>
                .shows{
                    position: fixed;
                    left: 0;
                    top: 0;
                    width: 100%;
                    height: 100vh;
                    background-color: #95A0AF;
                    opacity: 0.5;
                    z-index:1;
                }
                .bozorchi{
                    position: fixed;
                    left: 50%;
                    top: 10%;
                    transform: translate(-50%);
                }
            </style>
            <div class="shows"></div>
        </div>
        <div class="row">
            <div class="card bozorchi animate__animated animate__zoomInDown" style="z-index: 4; width: 500px;height: 600px;">
                    <div class="modal-body" >
                        <img src="/bozorchi1.jpg" style="width: 100%;height: 100%;" alt="">
                    </div>
                        <h1 class="text" style="text-align: center;">Bozorchiga hush kelibsiz !</h1>
            </div>
        </div>
        <script>
            setTimeout(function() {
                $('.bozorchi').hide();
                $('.shows').hide();// Divni yashirish
            }, 2000);
        </script>
    @endif

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
                        <a href="{{route('order.index')}}">
                            <span class="info-box-text">Yangi buyurtmalar </span>
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
                        <a href="{{route('delivery.index')}}">
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
                        <a href="{{route('delivered.index')}}">
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
                        <span class="info-box-text">Foydalanuvchilar</span>
                        <span class="info-box-number">{{count($clients)}} <small> ta</small></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

        </div>
    </div>

    @livewire('chart.chart-component')


@endsection




