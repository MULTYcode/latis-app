<?php

namespace App\Exports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SiswaExport implements FromCollection, WithHeadings
{
    protected $filteredIds;

    public function __construct($filteredIds = null)
    {
        $this->filteredIds = $filteredIds;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $query = Siswa::query();

        if ($this->filteredIds) {
            $query->whereIn('id', $this->filteredIds);
        }

        return $query->select('nis', 'name', 'email', 'lembaga_id', 'created_at')->get();
    }

    public function headings(): array
    {
        return [
            'NIS',
            'Name',
            'Email',
            'Lembaga ID',
            'Created At',
        ];
    }
}