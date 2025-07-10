<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CriteriaModel;

class Criteria extends BaseController
{

    protected $criteriaModel;

    public function __construct()
    {

        $this->criteriaModel = new CriteriaModel();
    }


    public function view()
    {
        $data = [
            'title' => "Kriteria",
            // 'subtitle' => "Manage Your Criteria",
            'activePage' => 'criteria',
            'criteria' => $this->criteriaModel->findAll(), // ⬅️ tambahkan ini
            'isEdit' => false,
            'formAction' => base_url('criteria/add'),
            'modalTitle' => 'Tambah Kriteria/Edit Kriteria',
            'submitLabel' => 'Tambah',
            'edit' => []
        ];
        return view('Dashboard/pages/criteria', $data);
    }


    // Tambah kriteria
    public function add()
    {

        $data = [
            'kriteria' => $this->request->getPost('kriteria'),
            'jenis' => $this->request->getPost('jenis'),
        ];

        $this->criteriaModel->save($data);

        return redirect()->to(base_url('criteria'))->with('success', 'Data kriteria berhasil ditambahkan.');
    }

    //Edit kriteria
    public function update($id)
    {
        $criteriaModel = new CriteriaModel();
        $criteria = $criteriaModel->find($id);

        // Ambil data dari form
        $kode       = $this->request->getPost('kode');
        $kriteria       = $this->request->getPost('kriteria');
        $jenis         = $this->request->getPost('jenis');

        $data = [
            'kode'      => $kode,
            'kriteria'      => $kriteria,
            'jenis'         => $jenis,
        ];

        $criteriaModel->update($id, $data);

        return redirect()->to(base_url('criteria'))->with('success', 'Data kriteria berhasil diperbarui.');
    }

    //Delete kriteria
    public function delete($id)
    {
        $criteriaModel = new CriteriaModel();
        $criteriaModel->delete($id);
        return redirect()->to(base_url('criteria'))->with('success', 'Data kriteria berhasil dihapus.');
    }
}
