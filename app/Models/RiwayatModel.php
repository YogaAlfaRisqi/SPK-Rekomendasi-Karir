<?php

namespace App\Models;

use CodeIgniter\Model;

class RiwayatModel extends Model
{
    protected $table      = 'riwayat';
    protected $primaryKey = 'id';

    // Field yang boleh diisi
    protected $allowedFields = ['user_id', 'karir', 'skor', 'persentase'];

    // Mengaktifkan created_at dan updated_at otomatis
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
