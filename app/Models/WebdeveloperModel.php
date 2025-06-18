<?php

namespace App\Models;

use CodeIgniter\Model;

class WebdeveloperModel extends Model
{
    protected $table      = 'pemb_webdeveloper';         // Nama tabel di database
    protected $primaryKey = 'id';               // Primary key

    protected $useAutoIncrement = true;
    protected $returnType       = 'array';      // Bisa juga 'object' jika kamu mau
    protected $useSoftDeletes   = false;

    protected $allowedFields = ['kriteria', 'bobot'];

    protected $useTimestamps = true; // Aktifkan created_at & updated_at otomatis
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
