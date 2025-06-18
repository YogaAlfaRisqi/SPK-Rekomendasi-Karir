<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\WebdeveloperModel;
use App\Models\MobileengineerModel;

class PembobotanKriteria extends BaseController
{
    protected $webdeveloperModel;
    protected $mobileengineerModel;

    public function __construct()
    {
        $this->webdeveloperModel = new WebdeveloperModel();
        $this->mobileengineerModel = new MobileengineerModel();
    }

    public function view()
    {
        $data = [
            'title1' => 'Pembobotan Web Developer',
            'title2' => 'Pembobotan Mobile Engineer',
            'activePage' => 'pembobotan',
            'webdeveloper' => $this->webdeveloperModel->findAll(),
            'mobileengineer' => $this->mobileengineerModel->findAll(),
        ];

        return view('Dashboard/pages/pembobotankriteria', $data);
    }

    // --- Web Developer ---
    public function addWebdeveloper()
    {
        $data = [
            'kriteria' => $this->request->getPost('kriteria'),
            'bobot' => $this->request->getPost('bobot'),
        ];
        $this->webdeveloperModel->save($data);
        return redirect()->to(base_url('pembobotan'))->with('success', 'Data bobot berhasil ditambahkan.');
    }

    public function updateWebdeveloper($id)
    {
        $data = [
            'kriteria' => $this->request->getPost('kriteria'),
            'bobot' => $this->request->getPost('bobot'),
        ];
        $this->webdeveloperModel->update($id, $data);
        return redirect()->to(base_url('pembobotan'))->with('success', 'Data bobot berhasil diperbarui.');
    }

    public function deleteWebdeveloper($id)
    {
        $this->webdeveloperModel->delete($id);
        return redirect()->to(base_url('pembobotan'))->with('success', 'Data bobot berhasil dihapus.');
    }

    // --- Mobile Engineer ---
    public function addMobileengineer()
    {
        $data = [
            'kriteria' => $this->request->getPost('kriteria'),
            'bobot' => $this->request->getPost('bobot'),
        ];
        $this->mobileengineerModel->save($data);
        return redirect()->to(base_url('pembobotan'))->with('success', 'Data bobot berhasil ditambahkan.');
    }

    public function updateMobileengineer($id)
    {
        $data = [
            'kriteria' => $this->request->getPost('kriteria'),
            'bobot' => $this->request->getPost('bobot'),
        ];
        $this->mobileengineerModel->update($id, $data);
        return redirect()->to(base_url('pembobotan'))->with('success', 'Data bobot berhasil diperbarui.');
    }

    public function deleteMobileengineer($id)
    {
        $this->mobileengineerModel->delete($id);
        return redirect()->to(base_url('pembobotan'))->with('success', 'Data bobot berhasil dihapus.');
    }
}
