@php
use Illuminate\Support\Facades\Auth;
   @endphp
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{route('admin')}}" class="nav-link">
                <i class="nav-icon fas fa-home "></i>
                <p>Dashboard</p>
            </a>
        </li>
        @if(Auth::user()->role==1)
            <li class="nav-item">
                <a href="{{route('add.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-user-shield"></i>
                    <p>Kuryerlar</p>
                </a>
            </li>
        @endif
{{--        <li class="nav-item">--}}
{{--            <a href="{{route('client.index')}}" class="nav-link">--}}
{{--                <i class="nav-icon fas fa-users"></i>--}}
{{--                <p>Haridorlar</p>--}}
{{--            </a>--}}
{{--        </li>--}}


        <li class="nav-item">
            <a href="{{route('category.index')}}" class="nav-link">
                <i class="fa fa-list nav-icon"></i>
                <p>Kategoriyalar</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('sup-category.index')}}" class="nav-link">
                <i class="fa fa-list nav-icon"></i>
                <p>Sup kategoriyalar</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('brend.index')}}" class="nav-link">
                <i class="nav-icon fa-solid fa-scale-unbalanced-flip"></i>
                <p> O'lchov turlari</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('product.index')}}" class="nav-link">
                <i class="fa fa-box nav-icon"></i>
                <p>Mahsulotlar</p>
            </a>
        </li>
{{--        <li class="nav-item">--}}
{{--            <a href="{{route('category.index')}}" class="nav-link">--}}
{{--                <i class=" nav-icon fa-brands fa-sellsy"></i>--}}
{{--                <p>Sotish</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        @if(Auth::user()->role == 1)--}}
{{--            <li class="nav-item">--}}
{{--                <a href="{{route('supplier.index')}}" class="nav-link">--}}
{{--                    <i class="nav-icon fa fa-truck"></i>--}}
{{--                    <p>Yetkazib beruvchi</p>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a href="#" class="nav-link">--}}
{{--                    <i class="nav-icon fas fa-warehouse"></i>--}}
{{--                    <p>--}}
{{--                        Ombor--}}
{{--                        <i class="right fas fa-angle-left"></i>--}}
{{--                    </p>--}}
{{--                </a>--}}
{{--                <ul class="nav nav-treeview">--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="{{route('product.index')}}" class="nav-link">--}}
{{--                            <i class="far fa-circle nav-icon"></i>--}}
{{--                            <p>Mahsulotlar</p>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="{{route('product-income.index')}}" class="nav-link">--}}
{{--                            <i class="far fa-circle nav-icon"></i>--}}
{{--                            <p>Sotib olish</p>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--        @endif--}}


        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-shop"></i>
                <p>
                    Sotilgan Mahsulotlar
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="./index3.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Sotilgan mahsulotlar</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./index3.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Sotilgan mahsulotlar haqida</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="./index3.html" class="nav-link">
                <i class="fa-solid fa-money-bill-wave"></i>
                <p>To'lovlar</p>
            </a>
        </li>
    </ul>
</nav>
