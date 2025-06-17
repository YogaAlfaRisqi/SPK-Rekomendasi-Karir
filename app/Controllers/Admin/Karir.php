<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KarirModel;

class Karir extends BaseController
{

    protected $karirModel;

    public function __construct()
    {

        $this->karirModel = new KarirModel();
    }


    public function view()
    {
        $data = [
            'title' => "Karir",
            // 'subtitle' => "Manage Your Criteria",
            'activePage' => 'karir',
            'karir' => $this->karirModel->findAll(), // ⬅️ tambahkan ini
            'isEdit' => false,
            'formAction' => base_url('karir/add'),
            'modalTitle' => 'Tambah Karir/Edit Karir',
            'submitLabel' => 'Tambah',
            'edit' => []
        ];
        return view('Dashboard/pages/karir', $data);
    }


    // Tambah karir
    public function add()
    {

        $data = [
            'karir' => $this->request->getPost('karir'),
        ];

        $this->karirModel->save($data);

        return redirect()->to(base_url('karir'))->with('success', 'Data karir berhasil ditambahkan.');
    }

    //Edit karir
    public function update($id)
    {
        $karirModel = new KarirModel();


        // Ambil data dari form
        $karir       = $this->request->getPost('karir');


        $data = [
            'karir'      => $karir,

        ];

        $karirModel->update($id, $data);

        return redirect()->to(base_url('karir'))->with('success', 'Data karir berhasil diperbarui.');
    }

    //Delete karir
    public function delete($id)
    {
        $karirModel = new KarirModel();
        $karirModel->delete($id);
        return redirect()->to(base_url('karir'))->with('success', 'Data karir berhasil dihapus.');
    }
}
