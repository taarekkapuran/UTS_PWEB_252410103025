@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<section class="hero">
    <div>
        <h1>Halo, {{ $username }}.</h1>
        <p>Lima unit sudah terparkir di lantai showroom. Pilih satu untuk melihat spesifikasi lengkapnya.</p>
    </div>
    <img src="{{ asset('images/' . $motors[0]['gambar']) }}" alt="{{ $motors[0]['nama'] }}">
</section>

<section class="stats">
    @foreach ($ringkasan as $item)
        <div>
            <span>{{ $item['label'] }}</span>
            <strong>{{ $item['nilai'] }}</strong>
        </div>
    @endforeach
</section>

<h2>Koleksi Forza Motor</h2>
<section class="grid">
    @foreach ($motors as $motor)
        <a class="card" href="{{ route('pengelolaan', ['username' => $username]) }}#{{ $motor['slug'] }}">
            <img src="{{ asset('images/' . $motor['gambar']) }}" alt="{{ $motor['nama'] }}" loading="lazy">
            <div class="b">
                <h3>{{ $motor['nama'] }}</h3>
                <span class="tag">{{ $motor['kategori'] }}</span>
                <div class="meta">
                    <span>{{ $motor['tenaga'] }}</span>
                    <span>{{ $motor['bobot'] }}</span>
                    <span>Jok {{ $motor['jok'] }}</span>
                </div>
            </div>
        </a>
    @endforeach
</section>
@endsection