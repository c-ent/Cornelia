@auth
        <a href="/{{ $role }}">Dashboard</a>
@endauth


@guest
    

    @if (Route::has('register'))
    <a href="{{ route('register') }}">Register</a>
    @endif

    @if (Route::has('login'))
    <a href="{{ route('login') }}">Login</a>
    @endif

@endguest