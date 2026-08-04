<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataRuang extends Model
{
    // Mengizinkan kolom ID diisi manual dari data JSON
    protected $fillable = [
        'id',
        'kode_ruang',
        'nama_ruangan',
        'nama_gedung',
        'kapasitas_ruang',
        'jenis_ruang'
    ];

    // Konfigurasi wajib jika Primary Key bukan Integer Auto-Increment
    public $incrementing = false;
    protected $keyType = 'string';
}

