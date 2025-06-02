<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class Perhitungan extends BaseController {
    public function view(){
        $data = [
            'title' => "Perhitungan",
            'subtitle' => "Lihat Detail Perhitungan",
            'activePage' => 'perhitungan',
        ];
        return view('Dashboard/pages/perhitungan',$data);
    }
}