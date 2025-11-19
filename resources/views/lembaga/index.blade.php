@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Daftar Lembaga</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-4">
        <a href="{{ route('lembaga.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            Tambah Lembaga
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="py-2 px-4 border-b">#</th>
                    <th class="py-2 px-4 border-b">Nama</th>
                    <th class="py-2 px-4 border-b">Keterangan</th>
                    <th class="py-2 px-4 border-b">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($lembaga as $item)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $loop->iteration + ($lembaga->currentPage() - 1) * $lembaga->perPage() }}</td>
                    <td class="py-2 px-4 border-b">{{ $item->nama }}</td>
                    <td class="py-2 px-4 border-b">{{ $item->keterangan ?? '-' }}</td>
                    <td class="py-2 px-4 border-b space-x-2">
                        <a href="{{ route('lembaga.show', $item) }}" class="text-blue-600 hover:underline">Lihat</a>
                        <a href="{{ route('lembaga.edit', $item) }}" class="text-yellow-600 hover:underline">Edit</a>
                        <form action="{{ route('lembaga.destroy', $item) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus lembaga ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="py-4 px-4 text-center text-gray-500">Tidak ada data lembaga.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $lembaga->links() }}
    </div>
</div>
@endsection