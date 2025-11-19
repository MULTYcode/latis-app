@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Detail Lembaga</h1>

    <div class="bg-white rounded shadow p-6">
        <p><strong>Nama:</strong> {{ $lembaga->nama }}</p>
        <p class="mt-2"><strong>Keterangan:</strong></p>
        <p class="whitespace-pre-line">{{ $lembaga->keterangan ?? '-' }}</p>
    </div>

    <div class="mt-6">
        <a href="{{ route('lembaga.index') }}" class="text-blue-600 hover:underline">Kembali ke daftar lembaga</a>
    </div>
</div>
@endsection