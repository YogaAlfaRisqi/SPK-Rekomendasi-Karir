<?php

namespace App\Controllers;
use App\Controllers\BaseController;

class Riwayat extends BaseController
{
    public function view(): string
    {
        $data = [
            'title' => "Riwayat",
            'activePage' => 'riwayat', // tambahkan ini
            // 'features'=> $features,
        ];
        return view('Dashboard/pages/riwayat',$data);
    }
}
