@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Daftar Siswa</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-4">
        <a href="{{ route('siswa.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            Tambah Siswa
        </a>
    </div>

    <div class="overflow-x-auto">
        <table id="siswa-table" class="min-w-full bg-white border border-gray-200 rounded">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Image</th>
                    <th>Lembaga ID</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($siswa as $item)
                <tr>
                    <td>{{ $item->nis }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>
                        @if($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" alt="Image" class="h-10 w-10 object-cover rounded">
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ $item->lembaga_id ?? '-' }}</td>
                    <td>
                        <a href="{{ route('siswa.show', $item) }}" class="text-blue-600 hover:underline mr-2">Lihat</a>
                        <a href="{{ route('siswa.edit', $item) }}" class="text-yellow-600 hover:underline mr-2">Edit</a>
                        <form action="{{ route('siswa.destroy', $item) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus siswa ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $siswa->links() }}
    </div>
</div>

<!-- DataTables CSS and JS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#siswa-table').DataTable({
            responsive: true,
            paging: true,
            searching: true,
            ordering: true,
            columnDefs: [
                { orderable: false, targets: 5 } // Disable ordering on the action column
            ],
            language: {
                search: "Cari:",
                lengthMenu: "Tampilkan _MENU_ entri",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                paginate: {
                    first: "Pertama",
                    last: "Terakhir",
                    next: "Berikutnya",
                    previous: "Sebelumnya"
                },
                zeroRecords: "Tidak ada data yang cocok",
                infoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
                infoFiltered: "(disaring dari total _MAX_ entri)"
            }
        });
    });
</script>
@endsection