@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Edit Lembaga</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('lembaga.update', $lembaga) }}" method="POST" class="max-w-lg">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="nama" class="block text-gray-700 font-semibold mb-2">Nama</label>
            <input type="text" id="nama" name="nama" value="{{ old('nama', $lembaga->nama) }}" required
                class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-indigo-500" />
        </div>

        <div class="mb-4">
            <label for="keterangan" class="block text-gray-700 font-semibold mb-2">Keterangan</label>
            <textarea id="keterangan" name="keterangan" rows="4"
                class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-indigo-500">{{ old('keterangan', $lembaga->keterangan) }}</textarea>
        </div>

        <button type="submit"
            class="bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700 transition font-semibold">
            Update
        </button>
        <a href="{{ route('lembaga.index') }}" class="ml-4 text-gray-600 hover:underline">Batal</a>
    </form>
</div>
@endsection