<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RiwayatModel;

class Riwayat extends BaseController
{
    public function view()
    {
        // Cek apakah user sudah login
        if (!session()->get('logged_in')) {
            return redirect()->to('login')->with('error', 'Silakan login untuk melihat riwayat.');
        }

        // Ambil ID user dari session
        $userId = session()->get('user_id');

        // Ambil riwayat berdasarkan user_id
        $model = new RiwayatModel();
        $riwayat = $model->where('user_id', $userId)->orderBy('created_at', 'ASC')->findAll();

        $data = [
            'title' => "Riwayat",
            'activePage' => 'riwayat',
            'riwayat' => $riwayat,
        ];

        return view('Dashboard/pages/riwayat', $data);
    }

    public function simpan()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $userId     = session()->get('user_id');
        $karir      = $this->request->getPost('karir');
        $skor       = (float) $this->request->getPost('skor');        // SAW mentah
        $persentase = (float) $this->request->getPost('persentase');  // Sudah dalam persen

        $model = new \App\Models\RiwayatModel();
        $model->save([
            'user_id'     => $userId,
            'karir'       => $karir,
            'skor'        => $skor,
            'persentase'  => $persentase,
            'created_at'  => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('riwayat')->with('success', 'Riwayat berhasil disimpan.');
    }




    public function hapus($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $model = new \App\Models\RiwayatModel();

        // Pastikan riwayat milik user yang sedang login
        $userId = session()->get('user_id');
        $riwayat = $model->find($id);

        if ($riwayat && $riwayat['user_id'] == $userId) {
            $model->delete($id);
            return redirect()->to('riwayat')->with('success', 'Riwayat berhasil dihapus.');
        }

        return redirect()->to('riwayat')->with('error', 'Data tidak ditemukan atau akses ditolak.');
    }
}
