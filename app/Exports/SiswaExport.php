<?php

namespace App\Exports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SiswaExport implements FromCollection, WithHeadings
{
    protected $ids;

    public function __construct($ids = null)
    {
        $this->ids = $ids;
    }

    public function collection()
    {
        $query = Siswa::with('lembaga');

        if ($this->ids) {
            $query->whereIn('id', $this->ids);
        }

        return $query->get([
            'nis',
            'name',
            'email',
            'lembaga_id'
        ]);
    }

    public function headings(): array
    {
        return ['NIS', 'Nama', 'Email', 'Lembaga'];
    }
}