<?php

namespace App\Models;

use CodeIgniter\Model;

class NilaiMahasiswaModel extends Model
{
    protected $table            = 'nilai_mahasiswa';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    protected $allowedFields    = [
        'nama_mahasiswa',
        'C01', 'C02', 'C03', 'C04', 'C05', 'C06', 'C07',
        'C08', 'C09', 'C010', 'C011', 'C012'
    ];

    protected $useTimestamps = true; // created_at & updated_at

   
}
