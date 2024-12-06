<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        @if(Auth::user()->role==2 )
            <li class="nav-item">
                <a href="{{route('kuryer.index')}}" class="nav-link">
                    <i class="nav-icon fa-solid fa-truck-fast"></i>
                    <p>Yetzakilmaganlar</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('kuryer.zakas')}}" class="nav-link">
                    <i class="nav-icon fa-solid fa-truck-fast"></i>
                    <p>Yetkazilganlar</p>
                </a>
            </li>
        @endif
    </ul>
</nav>
