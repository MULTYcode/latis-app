@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6" id="siswa-container" data-success-message="{{ session('success') ?? '' }}">
    <h1 class="text-2xl font-bold mb-4">Daftar Siswa</h1>

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
                        <a href="{{ route('siswa.edit', $item) }}" class="text-yellow-600 hover:underline mr-2">Edit</a>
                        <form action="{{ route('siswa.destroy', $item) }}" method="POST" class="inline delete-form">
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const container = document.getElementById('siswa-container');
        const successMessage = container.getAttribute('data-success-message');
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

        // Replace default confirm on delete with SweetAlert
        const deleteForms = document.querySelectorAll('form.delete-form');
        deleteForms.forEach(form => {
            form.addEventListener('submit', function (e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Yakin ingin menghapus siswa ini?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });

        // Initialize DataTables
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