@extends('layouts.app')

@section('content')
<div class="container">
    @auth
        <h1>Profil Pengguna</h1>
        <ul>
            <li><strong>Nama:</strong> {{ auth()->user()->name }}</li>
            <li><strong>Email:</strong> {{ auth()->user()->email }}</li>
            <li><strong>Tanggal Bergabung:</strong> {{ auth()->user()->created_at->format('d M Y') }}</li>
        </ul>
    @else
        <p>Anda belum login. Silakan <a href="{{ route('login') }}">login</a> terlebih dahulu.</p>
    @endauth
</div>
@endsection