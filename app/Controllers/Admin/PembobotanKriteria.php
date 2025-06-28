<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DataEngineerModel;
use App\Models\WebdeveloperModel;
use App\Models\MobileengineerModel;
use App\Models\NetworkEngineerModel;
use App\Models\QAEngineerModel;
use App\Models\SystemAnalystModel;

class PembobotanKriteria extends BaseController
{
    protected $webdeveloperModel;
    protected $mobileengineerModel;
    protected $networkengineerModel;
    protected $qaengineerModel;
    protected $systemanalystModel;
    protected $dataengineerModel;


    public function __construct()
    {
        $this->webdeveloperModel = new WebdeveloperModel();
        $this->mobileengineerModel = new MobileengineerModel();
        $this->networkengineerModel = new NetworkEngineerModel();
        $this->qaengineerModel= new QAEngineerModel();
        $this->systemanalystModel = new SystemAnalystModel();
        $this->dataengineerModel = new DataEngineerModel();

    }

    public function view()
    {
        $roles = [
            'webdeveloper' => ['title' => 'Pembobotan Web Developer', 'color' => 'primary'],
            'mobileengineer' => ['title' => 'Pembobotan Mobile Engineer', 'color' => 'success'],
            'networkengineer' => ['title' => 'Pembobotan Network Engineer', 'color' => 'primary'],
            'qaengineer' => ['title' => 'Pembobotan QA Engineer', 'color' => 'success'],
            'systemanalyst' => ['title' => 'Pembobotan System Analyst', 'color' => 'success'],
            'dataengineer' => ['title' => 'Pembobotan Data Engineer', 'color' => 'primary'],
        ];

        $data = [
            'activePage' => 'pembobotan',
            'roles' => $roles,
        ];

        // Loop semua role dan panggil model dinamis
        foreach (array_keys($roles) as $key) {
            $modelName = $key . 'Model';
            if (property_exists($this, $modelName)) {
                $data[$key] = $this->{$modelName}->findAll();
            } else {
                $data[$key] = [];
            }
        }

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

    // --- Network Engineer ---
    public function addNetworkEngineer()
    {
        $data = [
            'kriteria' => $this->request->getPost('kriteria'),
            'bobot' => $this->request->getPost('bobot'),
        ];
        $this->networkengineerModel->save($data);
        return redirect()->to(base_url('pembobotan'))->with('success', 'Data bobot berhasil ditambahkan.');
    }

    public function updateNetworkEngineer($id)
    {
        $data = [
            'kriteria' => $this->request->getPost('kriteria'),
            'bobot' => $this->request->getPost('bobot'),
        ];
        $this->networkengineerModel->update($id, $data);
        return redirect()->to(base_url('pembobotan'))->with('success', 'Data bobot berhasil diperbarui.');
    }

    public function deleteNetworkEngineer($id)
    {
        $this->networkengineerModel->delete($id);
        return redirect()->to(base_url('pembobotan'))->with('success', 'Data bobot berhasil dihapus.');
    }

    // --- QA Engineer ---
    public function addQAEngineer()
    {
        $data = [
            'kriteria' => $this->request->getPost('kriteria'),
            'bobot' => $this->request->getPost('bobot'),
        ];
        $this->qaengineerModel->save($data);
        return redirect()->to(base_url('pembobotan'))->with('success', 'Data bobot berhasil ditambahkan.');
    }

    public function updateQAEngineer($id)
    {
        $data = [
            'kriteria' => $this->request->getPost('kriteria'),
            'bobot' => $this->request->getPost('bobot'),
        ];
        $this->qaengineerModel->update($id, $data);
        return redirect()->to(base_url('pembobotan'))->with('success', 'Data bobot berhasil diperbarui.');
    }

    public function deleteQAEngineer($id)
    {
        $this->qaengineerModel->delete($id);
        return redirect()->to(base_url('pembobotan'))->with('success', 'Data bobot berhasil dihapus.');
    }

    // --- Sytem Analyst ---
    public function addSystemAnalyst()
    {
        $data = [
            'kriteria' => $this->request->getPost('kriteria'),
            'bobot' => $this->request->getPost('bobot'),
        ];
        $this->systemanalystModel->save($data);
        return redirect()->to(base_url('pembobotan'))->with('success', 'Data bobot berhasil ditambahkan.');
    }

    public function updateSystemAnalyst($id)
    {
        $data = [
            'kriteria' => $this->request->getPost('kriteria'),
            'bobot' => $this->request->getPost('bobot'),
        ];
        $this->systemanalystModel->update($id, $data);
        return redirect()->to(base_url('pembobotan'))->with('success', 'Data bobot berhasil diperbarui.');
    }

    public function deleteSystemAnalyst($id)
    {
        $this->systemanalystModel->delete($id);
        return redirect()->to(base_url('pembobotan'))->with('success', 'Data bobot berhasil dihapus.');
    }

    // --- Data Engineer ---
    public function addDataEngineer()
    {
        $data = [
            'kriteria' => $this->request->getPost('kriteria'),
            'bobot' => $this->request->getPost('bobot'),
        ];
        $this->dataengineerModel->save($data);
        return redirect()->to(base_url('pembobotan'))->with('success', 'Data bobot berhasil ditambahkan.');
    }

    public function updateDataEngineer($id)
    {
        $data = [
            'kriteria' => $this->request->getPost('kriteria'),
            'bobot' => $this->request->getPost('bobot'),
        ];
        $this->dataengineerModel->update($id, $data);
        return redirect()->to(base_url('pembobotan'))->with('success', 'Data bobot berhasil diperbarui.');
    }

    public function deleteDataEngineer($id)
    {
        $this->dataengineerModel->delete($id);
        return redirect()->to(base_url('pembobotan'))->with('success', 'Data bobot berhasil dihapus.');
    }
}
