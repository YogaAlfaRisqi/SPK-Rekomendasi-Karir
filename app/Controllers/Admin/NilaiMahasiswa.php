<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\NilaiMahasiswaModel;

class NilaiMahasiswa extends BaseController
{
    protected $nilaiModel;

    public function __construct()
    {
        $this->nilaiModel = new NilaiMahasiswaModel();
    }

    public function view()
    {
        $data = [
            'title'      => 'Nilai Mahasiswa',
            'subtitle'   => 'Manajemen Nilai Mahasiswa',
            'activePage' => 'nilai_mahasiswa',
            'nilai'      => $this->nilaiModel->orderBy('nama_mahasiswa', 'ASC')->findAll()
        ];

        return view('Dashboard/pages/nilai_mahasiswa', $data);
    }

    public function create()
    {
        $data = $this->request->getPost();

        // Validasi minimal
        $rules = [
            'nama_mahasiswa' => 'required'
        ];

        for ($i = 1; $i <= 12; $i++) {
            $rules["C0$i"] = 'required|max_length[2]';
        }

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'Validasi gagal. Pastikan semua field terisi dengan benar.');
        }

        $this->nilaiModel->save($data);
        return redirect()->to(base_url('nilaimahasiswa'))->with('success', 'Data berhasil ditambahkan.');
    }

    public function update($id)
    {
        $data = $this->request->getPost();

        // Validasi
        $rules = [
            'nama_mahasiswa' => 'required'
        ];

        for ($i = 1; $i <= 12; $i++) {
            $rules["C0$i"] = 'required|max_length[2]';
        }

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'Validasi gagal. Pastikan semua field terisi dengan benar.');
        }

        $this->nilaiModel->update($id, $data);
        return redirect()->to(base_url('nilaimahasiswa'))->with('success', 'Data berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->nilaiModel->delete($id);
        return redirect()->to(base_url('nilaimahasiswa'))->with('success', 'Data berhasil dihapus.');
    }
}
