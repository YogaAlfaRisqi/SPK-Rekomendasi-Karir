<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\MahasiswaModel;
use App\Models\CriteriaModel;

class MahasiswaController extends BaseController
{
    public function view()
    {
        $mahasiswaModel = new MahasiswaModel();
        $kriteriaModel = new CriteriaModel();

        $data = [
            'title'       => 'Nilai Mahasiswa',
            'activePage'  => 'mahasiswa',
            'mahasiswa'   => $mahasiswaModel->findAll(),
            'kriteriaList' => $kriteriaModel->findAll(),
        ];

        return view('Dashboard/pages/mahasiswa', $data);
    }

    public function create()
    {
        $model = new MahasiswaModel();
        $data = [
            'nama'     => $this->request->getPost('nama'),
            'user_id'  => $this->request->getPost('user_id'),
            'kriteria_id'  => $this->request->getPost('kriteria_id'),
            'nilai'  => $this->request->getPost('nilai'),
        ];
        $model->insert($data);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan.');
    }

    public function update($id)
    {
        $model = new MahasiswaModel();
        $data = [
            'nama'     => $this->request->getPost('nama'),
            'user_id'  => $this->request->getPost('user_id'),
            'kriteria_id'  => $this->request->getPost('kriteria_id'),
            'nilai'  => $this->request->getPost('nilai'),
        ];
        $model->update($id, $data);
        return redirect()->back()->with('success', 'Data berhasil diupdate.');
    }

    public function delete($id)
    {
        $model = new MahasiswaModel();
        $model->delete($id);
        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
