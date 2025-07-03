<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KarirModel;
use App\Models\CriteriaModel;
use App\Models\NilaiMahasiswaModel;
use Config\Database;

class Rekomendasi extends BaseController
{

    public function view($mahasiswaId = null): string
    {
        $data = [
            'title'      => 'Rekomendasi',
            'activePage' => 'rekomendasi',
        ];
        return view('Dashboard/pages/rekomendasi', $data);
    }

    
}
