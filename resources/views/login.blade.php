@extends('layouts.app')

@section('title', 'Masuk')

@section('bare')
<div class="login">
    <div class="l">
        <img class="logo" src="{{ asset('images/forza-logo.png') }}" alt="Forza">
        <img class="bike" src="{{ asset('images/' . $motors[3]['gambar']) }}" alt="{{ $motors[3]['nama'] }}">
    </div>
    <div class="r">
        {{-- Method GET: username dikirim sebagai request parameter ke /dashboard --}}
        <form action="{{ route('dashboard') }}" method="GET">
            <h1>Masuk ke showroom</h1>
            <p>Kelola koleksi Forza Motor.</p>

            @if (session('pesan'))
                <div class="alert" role="alert">{{ session('pesan') }}</div>
            @endif

            <label for="username">Username</label>
            <input id="username" name="username" type="text" required autocomplete="username">

            {{-- Password sengaja tanpa atribut name agar tidak ikut terkirim di URL (hanya simulasi) --}}
            <label for="password">Password</label>
            <input id="password" type="password" autocomplete="current-password">

            <button type="submit">Masuk</button>
        </form>
    </div>
</div>
@endsection