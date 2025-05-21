<?php

namespace App\Controllers;
use App\Controllers\BaseController;

class Rekomendasi extends BaseController
{
    public function view(): string
    {
        $data = [
            'title' => "Rekomendasi",
            'activePage' => 'rekomendasi', // tambahkan ini
            // 'features'=> $features,
        ];
        return view('Dashboard/pages/rekomendasi',$data);
    }
}
