<nav class="navbar navbar-expand navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('blog.index') }}">E-Commerce Shop</a>
    <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="{{ route('blog.index') }}">Shop</a></li>
        @if(!Auth::check())
            <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Login</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/register') }}">Register</a></li>
        @else
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.index') }}">Admin</a></li>
            <li>
                <a class="nav-link" href="{{ url('/logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST">
                    {{ csrf_field() }}
                </form>
            </li>
        @endif
    </ul>
</nav>

