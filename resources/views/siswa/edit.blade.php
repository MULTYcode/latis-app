@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Edit Siswa</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('siswa.update', $siswa) }}" method="POST" enctype="multipart/form-data" class="max-w-lg">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="nis" class="block text-gray-700 font-semibold mb-2">NIS</label>
            <input type="text" id="nis" name="nis" value="{{ old('nis', $siswa->nis) }}" required
                class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-indigo-500" />
        </div>

        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-semibold mb-2">Nama</label>
            <input type="text" id="name" name="name" value="{{ old('name', $siswa->name) }}" required
                class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-indigo-500" />
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $siswa->email) }}" required
                class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-indigo-500" />
        </div>

        <div class="mb-4">
            <label for="image" class="block text-gray-700 font-semibold mb-2">Image</label>
            @if($siswa->image)
                <img src="{{ asset('storage/' . $siswa->image) }}" alt="Image" class="h-20 w-20 object-cover rounded mb-2">
            @endif
            <input type="file" id="image" name="image" accept="image/*"
                class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-indigo-500" />
        </div>

        <div class="mb-4">
            <label for="lembaga_id" class="block text-gray-700 font-semibold mb-2">Lembaga ID</label>
            <input type="number" id="lembaga_id" name="lembaga_id" value="{{ old('lembaga_id', $siswa->lembaga_id) }}"
                class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-indigo-500" />
        </div>

        <button type="submit"
            class="bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700 transition font-semibold">
            Update
        </button>
        <a href="{{ route('siswa.index') }}" class="ml-4 text-gray-600 hover:underline">Batal</a>
    </form>
</div>
@endsection