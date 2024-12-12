@php
use Illuminate\Support\Facades\Auth;
   @endphp
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        @if(Auth::user()->role==1)
            <li class="nav-item">
                <a href="{{route('admin')}}" class="nav-link">
                    <i class="nav-icon fas fa-home "></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('banner.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-images"></i>
                    <p>Bannerlar</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('add.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-user-shield"></i>
                    <p>Kuryerlar</p>
                </a>
            </li>
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
        <li class="nav-item">
            <a href="{{route('order.index')}}" class="nav-link">
            <i class="nav-icon fas fa-shop"></i>
                <p>
                    Buyurtmalar
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('delivery.index')}}" class="nav-link">
                <i class="nav-icon fa-solid fa-truck"></i>
                <p>Buyutmalarni yetkazish</p>
            </a>
        </li>
            <li class="nav-item">
                <a href="{{route('delivered.index')}}" class="nav-link">
                    <i class="nav-icon fa-solid fa-truck"></i>
                    <p>Yetkazilgan buyurtmalar</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('salary.index')}}" class="nav-link">
                    <i class="nav-icon fa-solid fa-money-bill-wave-alt"></i>
                    <p>Kuryerlarga pul berish</p>
                </a>
            </li>
        @endif
                <li class="nav-item">
                    <a href="{{route('contact.index')}}" class="nav-link">
                        <i class="nav-icon fa-solid fa-phone"></i>
                        <p>Aloqa</p>
                    </a>
                </li>
            <li class="nav-item">
                <a href="{{route('about.index')}}" class="nav-link">
                    <i class="nav-icon fa-solid fa-mobile-alt"></i>
                    <p>Ilova haqida</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('faq.index')}}" class="nav-link">
                    <i class="nav-icon fa-solid fa-circle-question"></i>
                    <p>FaQ</p>
                </a>
            </li>
    </ul>
</nav>
