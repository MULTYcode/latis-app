@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6" id="create-siswa-container" data-success-message="{{ session('success') ?? '' }}" data-error-messages="@if($errors->any()){{ implode('<br>', $errors->all()) }}@endif">
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Tambah Siswa</h1>
<!-- Removed existing error display div -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const container = document.getElementById('create-siswa-container');
        const successMessage = container.getAttribute('data-success-message');
        const errorMessages = container.getAttribute('data-error-messages');

        if (successMessage) {
            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: successMessage,
                timer: 3000,
                timerProgressBar: true,
                showConfirmButton: false
            });
        }

        if (errorMessages) {
            Swal.fire({
                icon: 'error',
                title: 'Terjadi Kesalahan',
                html: errorMessages,
                confirmButtonText: 'Tutup'
            });
        }
    });
</script>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data" class="max-w-lg">
        @csrf
        <div class="mb-4">
            <label for="nis" class="block text-gray-700 font-semibold mb-2">NIS</label>
            <input type="text" id="nis" name="nis" value="{{ old('nis') }}" required
                class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-indigo-500" />
        </div>

        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-semibold mb-2">Nama</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required
                class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-indigo-500" />
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required
                class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-indigo-500" />
        </div>

        <div class="mb-4">
            <label for="image" class="block text-gray-700 font-semibold mb-2">Image</label>
            <input type="file" id="image" name="image" accept="image/*"
                class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-indigo-500" />
        </div>

        <div class="mb-4">
            <label for="lembaga_id" class="block text-gray-700 font-semibold mb-2">Lembaga</label>
            <select id="lembaga_id" name="lembaga_id" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <option value="">-- Pilih Lembaga --</option>
                @foreach ($lembaga as $item)
                    <option value="{{ $item->id }}" {{ old('lembaga_id') == $item->id ? 'selected' : '' }}>
                        {{ $item->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit"
            class="bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700 transition font-semibold">
            Simpan
        </button>
        <a href="{{ route('siswa.index') }}" class="ml-4 text-gray-600 hover:underline">Batal</a>
    </form>
</div>
@endsection