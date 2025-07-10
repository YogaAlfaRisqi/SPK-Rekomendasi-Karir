<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KarirModel;
use App\Models\CriteriaModel;
use App\Models\NilaiMahasiswaModel;
use Config\Database;

class perhitunganSAW extends BaseController
{
    // Map bobot karir ke tabel bobot masing-masing
    protected $bobotTableMap = [
        'Web Developer'    => 'pemb_webdeveloper',
        'Mobile Engineer'  => 'pemb_mobileengineer',
        'Network Engineer' => 'pemb_networkengineer',
        'QA Engineer'      => 'pemb_qaengineer',
        'System Analyst'   => 'pemb_systemanalyst',
        'Data Engineer'    => 'pemb_dataengineer',
    ];

    public function view()
    {
        $db = Database::connect();

        $karirModel = new KarirModel();
        $kriteriaModel = new CriteriaModel();
        $nilaiModel = new NilaiMahasiswaModel();

        $karirList = $karirModel->findAll();
        $kriteriaList = $kriteriaModel->findAll();
        $nilaiMahasiswaList = $nilaiModel->findAll();

        $hasilRekomendasi = [];

        foreach ($nilaiMahasiswaList as $mahasiswa) {
            // 1. Ambil nilai mahasiswa per kriteria
            foreach ($kriteriaList as $kriteria) {
                $kodeKriteria = $kriteria['kode']; // Ambil langsung dari DB
                $huruf = $mahasiswa[$kodeKriteria] ?? 'E';

                $konversi = [
                    'A' => 4.0,
                    'A-' => 3.75,
                    'B+' => 3.5,
                    'B' => 3.0,
                    'B-' => 2.75,
                    'C+' => 2.5,
                    'C' => 2.25,
                    'D' => 1.0,
                    'E' => 0.0
                ];

                $nilaiMahasiswa[$kriteria['kriteria']] = $konversi[$huruf] ?? 0.0;
            }

            // 2. Normalisasi nilai
            $normalisasi = [];
            foreach ($nilaiMahasiswa as $kriteria => $nilai) {
                $normalisasi[$kriteria] = round($nilai / 4.0, 4);
            }
            // dd($nilaiMahasiswa, $normalisasi);

            // 3. Ambil bobot per karir
            $bobotKarir = [];
            foreach ($karirList as $karir) {
                $karirNama = $karir['karir'];
                $tabel = $this->bobotTableMap[$karirNama] ?? null;
                if (!$tabel) continue;

                $rows = $db->table($tabel)->get()->getResultArray();
                foreach ($rows as $row) {
                    $bobotKarir[$karirNama][$row['kriteria']] = round($row['bobot'], 4);
                }
            }

            // 4. Hitung skor SAW
            $skorKarir = [];
            foreach ($karirList as $karir) {
                $karirNama = $karir['karir'];
                $skor = 0;
                foreach ($normalisasi as $kriteria => $nilaiNormalisasi) {
                    $bobot = $bobotKarir[$karirNama][$kriteria] ?? 0;
                    $skor += $nilaiNormalisasi * $bobot;
                }
                $skorKarir[$karirNama] = $skor;
            }

            // 5. Persentase
            $totalSkor = array_sum($skorKarir);
            $hasil = [];
            foreach ($skorKarir as $karirNama => $skorSAW) {
                $hasil[] = [
                    'karir' => $karirNama,
                    'saw'   => $skorSAW,
                    'persen' => $totalSkor > 0 ? round(($skorSAW / $totalSkor) * 100, 2) : 0
                ];
            }

            // Urutkan
            usort($hasil, fn($a, $b) => $b['persen'] <=> $a['persen']);

            $hasilRekomendasi[] = [
                'nama' => $mahasiswa['nama_mahasiswa'],
                'hasil' => $hasil,
                'normalisasi' => $normalisasi
            ];
        }

        return view('Dashboard/pages/perhitunganSAW', [
            'title' => 'Perhitungan Rekomendasi Karir',
            'activePage' => 'perhitunganSAW',
            'rekomendasi' => $hasilRekomendasi,
            'kriteriaList' => $kriteriaList,
        ]);
    }
}
