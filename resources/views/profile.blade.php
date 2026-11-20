@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<h2>Profile</h2>

<section class="panel">
    <dl style="padding:0">
        <dt>Username</dt><dd><strong>{{ $username }}</strong></dd>
        <dt>Peran</dt><dd>Admin showroom</dd>
        <dt>Diterima lewat</dt><dd>Request parameter <code>?username={{ $username }}</code></dd>
    </dl>
</section>

<section class="panel">
    <h3>Alur request ke halaman ini</h3>
    <ol>
        @foreach ($alur as $langkah)
            <li>{{ $langkah }}</li>
        @endforeach
    </ol>
</section>

<a class="btn" style="max-width:260px" href="{{ route('dashboard', ['username' => $username]) }}">Kembali ke dashboard</a>
@endsection