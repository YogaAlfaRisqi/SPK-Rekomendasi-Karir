<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Preferences extends BaseController
{
    public function view()
    {
        $data = [
            'title' => 'Isi Preferensi Karir',
            'activePage' => 'preferensi',
        ]; // tambahkan ini
        return view('Dashboard/pages/preferensi', $data);
    }

    // public function save()
    // {
    //     // Simpan data ke database atau session (contoh)
    //     $data = $this->request->getPost();
    //     // Lakukan penyimpanan sesuai kebutuhan
    //     return redirect()->to('/')->with('success', 'Preferensi berhasil disimpan!');
    // }
}
