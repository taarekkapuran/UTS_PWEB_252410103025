@props(['username'])

<header class="nav">
    <div class="wrap">
        <a href="{{ route('dashboard', ['username' => $username]) }}" aria-label="Forza Motor">
            <img src="{{ asset('images/forza-logo.png') }}" alt="Forza">
        </a>
        <ul>
            {{-- Username diteruskan ke tiap halaman lewat request parameter --}}
            <li><a class="link {{ request()->routeIs('dashboard') ? 'on' : '' }}" href="{{ route('dashboard', ['username' => $username]) }}">Dashboard</a></li>
            <li><a class="link {{ request()->routeIs('pengelolaan') ? 'on' : '' }}" href="{{ route('pengelolaan', ['username' => $username]) }}">Pengelolaan</a></li>
            <li><a class="link {{ request()->routeIs('profile') ? 'on' : '' }}" href="{{ route('profile', ['username' => $username]) }}">Profile</a></li>
            <li><a class="link" href="{{ route('login') }}">Keluar</a></li>
        </ul>
    </div>
</header>