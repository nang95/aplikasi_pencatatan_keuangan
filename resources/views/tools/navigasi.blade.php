<nav class="navbar navbar-expand-xl">
    <div class="container h-100">
        <a class="navbar-brand" href="index.html">
            <h1 class="tm-site-title mb-0">Aplikasi Pencatatan Keuangan</h1>
        </a>
        <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars tm-nav-icon"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto h-100">
                <li class="nav-item">
                    <a class="nav-link @if (request()->is('user/dashboard')) active @endif" href="{{ route('user.dashboard') }}">
                    <i class="fas fa-home"></i>
                        Dashboard
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (request()->is('user/category')) active @endif" href="{{route('user.category')}}">
                    <i class="fas fa-tags"></i>
                        Kategori
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (request()->is('user/pemasukan')) active @endif" href="{{ route('user.pemasukan') }}">
                    <i class="fas fa-wallet"></i>
                        Pemasukan
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (request()->is('user/pengeluaran')) active @endif" href="{{ route('user.pengeluaran') }}">
                    <i class="fas fa-shopping-cart"></i>
                        Pengeluaran
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link @if (request()->is('user/account')) active @endif" href="{{ route('user.account') }}">
                    <i class="fas fa-user-cog"></i>
                        Account
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" style="display: none" id="logout-form">
                        {{ csrf_field() }} {{ method_field('POST') }}
                        <button type="submit"></button>
                    </form>
                    <a class="nav-link d-block" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">
                        user, <b>Logout</b>
                    </a>
                </li>
            </ul>
        </div>
    </div>

</nav>
