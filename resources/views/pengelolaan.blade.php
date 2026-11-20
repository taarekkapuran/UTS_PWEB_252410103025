@extends('layouts.app')

@section('title', 'Pengelolaan')

@section('content')
<h2>Pengelolaan unit</h2>

<div class="tablewrap">
    <table>
        <thead>
            <tr>
                <th>Foto</th><th>Model</th><th>Kategori</th><th>Mesin</th>
                <th>Tenaga</th><th>Torsi</th><th>Bobot</th><th>Tinggi jok</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($motors as $motor)
                <tr>
                    <td><img src="{{ asset('images/' . $motor['gambar']) }}" alt="{{ $motor['nama'] }}" loading="lazy"></td>
                    <td><strong>{{ $motor['nama'] }}</strong></td>
                    <td><span class="tag">{{ $motor['kategori'] }}</span></td>
                    <td>{{ $motor['mesin'] }}</td>
                    <td>{{ $motor['tenaga'] }}</td>
                    <td>{{ $motor['torsi'] }}</td>
                    <td>{{ $motor['bobot'] }}</td>
                    <td>{{ $motor['jok'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<h2>Spesifikasi lengkap</h2>
@foreach ($motors as $motor)
    <details id="{{ $motor['slug'] }}">
        <summary>{{ $motor['nama'] }} <span class="tag">{{ $motor['kategori'] }}</span></summary>
        <dl>
            @foreach ($motor['spesifikasi'] as $label => $isi)
                <dt>{{ $label }}</dt>
                <dd>{{ $isi }}</dd>
            @endforeach
        </dl>
        <dl><dt>Sumber</dt><dd>{{ $motor['sumber'] }}</dd></dl>
    </details>
@endforeach
@endsection