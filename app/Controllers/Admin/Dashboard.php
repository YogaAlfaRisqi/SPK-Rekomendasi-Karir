<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()

    {
        
        $features = [
            [
                'icon' => 'fas fa-brain',
                'color' => 'text-primary',
                'title' => 'Analisis Cerdas',
                'text'  => 'Sistem ini menggunakan metode AHP & SAW untuk membantu proses pengambilan keputusan karir yang tepat.',
            ],
            [
                'icon' => 'fas fa-user-check',
                'color' => 'text-success',
                'title' => 'Personalized',
                'text'  => 'Penilaian dilakukan berdasarkan kriteria yang sesuai dengan profil dan preferensi pengguna.',
            ],
            [
                'icon' => 'fas fa-chart-line',
                'color' => 'text-warning',
                'title' => 'Hasil Terukur',
                'text'  => 'Dapatkan rekomendasi karir yang didukung oleh data dan visualisasi hasil yang jelas dan mudah dipahami.',
            ],
        ];

        $data = [
            'title' => "Dashboard",
            'activePage' => 'dashboard', // tambahkan ini
            'features'=> $features,
        ];
        return view('Dashboard/pages/home', $data);
    }
}
