<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lembaga extends Model
{
    use HasFactory;

    protected $table = 'lembaga';

    protected $fillable = [
        'nama',
        'keterangan',
    ];

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'lembaga_id');
    }
}