<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KarirModel;
use App\Models\CriteriaModel;
use Config\Database;

class Preferences extends BaseController
{   
    // Tabel Pembobotan Tiap Karir
    protected $bobotTableMap = [
        'Web Developer'    => 'pemb_webdeveloper',
        'Mobile Engineer'  => 'pemb_mobileengineer',
        'Network Engineer' => 'pemb_networkengineer',
        'QA Engineer'      => 'pemb_qaengineer',
        'System Analyst'   => 'pemb_systemanalyst',
        'Data Engineer'    => 'pemb_dataengineer',
    ];

    // Pertanyaan List
    protected $pertanyaan = [
        [
            "Algoritma.jpg",
            "Algoritma Pemrograman",
            "Masukkan nilai akhir Anda untuk <strong>Algoritma Pemrograman</strong>."
        ],
        [
            "basisdata.jpg",
            "Basis Data",
            "Masukkan nilai akhir Anda untuk <strong>Basis Data</strong>."
        ],
        [
            "web.jpg",
            "Pemrograman Web",
            "Masukkan nilai akhir Anda untuk <strong>Pemrograman Web</strong>."
        ],
        [
            "ksi.jpg",
            "Konsep Sistem Informasi",
            "Masukkan nilai akhir Anda untuk <strong>Konsep Sistem Informasi</strong>."
        ],
        [
            "ansi.jpg",
            "Analisis Perancangan Sistem",
            "Masukkan nilai akhir Anda untuk <strong>Analisis dan Perancangan Sistem</strong>."
        ],
        [
            "rpl.jpg",
            "Rekayasa Perangkat Lunak",
            "Masukkan nilai akhir Anda untuk <strong>Rekayasa Perangkat Lunak</strong>."
        ],
        [
            "jarkom.jpg",
            "Jaringan Komputer",
            "Masukkan nilai akhir Anda untuk <strong>Jaringan Komputer</strong>."
        ],
        [
            "strukdata.jpg",
            "Struktur Data",
            "Masukkan nilai akhir Anda untuk <strong>Struktur Data</strong>."
        ],
        [
            "manajjarkom.jpg",
            "Manajemen Jaringan",
            "Masukkan nilai akhir Anda untuk <strong>Manajemen Jaringan</strong>."
        ],
        [
            "dwdm.jpg",
            "Data Warehouse dan Data Mining",
            "Masukkan nilai akhir Anda untuk <strong>Data Warehouse dan Data Mining</strong>."
        ],
        [
            "netadmin.jpg",
            "Network Administrator",
            "Masukkan nilai akhir Anda untuk <strong>Network Administrator</strong>."
        ],
        [
            "manajproti.jpg",
            "Manajemen Proyek TI",
            "Masukkan nilai akhir Anda untuk <strong>Manajemen Proyek TI</strong>."
        ]
    ];


    // Menampilkan Halaman Preferensi Nilai
    public function view()
    {
        $karirModel = new KarirModel();

        $nilai_opsi = ["A", "A-", "B+", "B", "B-", "C+", "C", "D", "E"];

        $daftarNilai = session()->get('preferensi_nilai') ?? [];

        $semuaMatkul = [
            "Algoritma Pemrograman",
            "Basis Data",
            "Pemrograman Web",
            "Konsep Sistem Informasi",
            "Analisis Perancangan Sistem",
            "Rekayasa Perangkat Lunak",
            "Data Warehouse dan Data Mining",
            "Struktur Data",
            "Jaringan Komputer",
            "Manajemen Jaringan",
            "Network Administrator",
            "Manajemen Proyek TI",
        ];

        return view('Dashboard/pages/preferensi', [
            'title' => 'Preferensi Karir',
            'activePage' => 'preferensi',
            'pertanyaan' => $this->pertanyaan,
            'karirList' => $karirModel->findAll(),
            'nilai_opsi' => $nilai_opsi,
            'daftarNilai' => $daftarNilai,
            'semuaMatkul' => $semuaMatkul,
        ]);
    }


    // Fungsi untuk menyimpan nilai
    public function simpan()
    {
        $post = $this->request->getPost('nilai');

        $konversi = [
            'A' => 4.0,
            'A-' => 3.7,
            'B+' => 3.3,
            'B' => 3.0,
            'B-' => 2.7,
            'C+' => 2.5,
            'C' => 2.0,
            'D' => 1.0,
            'E' => 0.0,
        ];

        $nilaiAngka = [];
        foreach ($post as $matkul => $huruf) {
            $angka = $konversi[$huruf] ?? 0;
            $nilaiAngka[$matkul] = round($angka, 2);
        }

        session()->set('preferensi_nilai', $nilaiAngka);

        if ($this->request->getPost('lanjut')) {
            return redirect()->to('/preferensi/view#cek');
        }

        return redirect()->back()->with('success', 'Nilai berhasil disimpan.');
    }

    // Fungsi memproses perhitungan dengan SAW Method
    public function proses()
    {
        $db = Database::connect();
        $karirModel = new KarirModel();
        $kriteriaModel = new CriteriaModel();

        $karirList = $karirModel->findAll();
        $kriteriaList = $kriteriaModel->findAll();
        $preferensi = session()->get('preferensi_nilai');

        if (!$preferensi) {
            return redirect()->to('/preferensi')->with('error', 'Silakan isi nilai preferensi terlebih dahulu.');
        }

        // Ambil nilai dari session berdasarkan nama kriteria
        $nilaiMahasiswa = [];
        foreach ($kriteriaList as $kriteria) {
            $nama = $kriteria['kriteria'];
            $nilaiMahasiswa[$nama] = round(floatval($preferensi[$nama] ?? 0), 2);
        }

        // Normalisasi
        $normalisasi = [];
        foreach ($nilaiMahasiswa as $namaKriteria => $nilai) {
            $normalisasi[$namaKriteria] = round($nilai / 4.0, 4); // Normalisasi ke 0–1
        }

        // Bobot tiap karir
        $bobotKarir = [];
        foreach ($karirList as $karir) {
            $karirNama = $karir['karir'];
            $tabel = $this->bobotTableMap[$karirNama] ?? null;
            if (!$tabel) continue;

            $rows = $db->table($tabel)->get()->getResultArray();

            foreach ($rows as $row) {
                $namaKriteria = $row['kriteria'];
                // Ambil bobot langsung tanpa normalisasi total
                $bobotKarir[$karirNama][$namaKriteria] = round($row['bobot'], 4);
            }
        }
        // dd($bobotKarir);

        $skorKarir = []; 
        $totalSkorSAW = 0;

        // 2. Hitung skor SAW untuk tiap karir
        foreach ($karirList as $karir) {
            $karirNama = $karir['karir'];
            $skor = 0;

            foreach ($normalisasi as $kriteria => $nilaiNormalisasi) {
                $bobot = $bobotKarir[$karirNama][$kriteria] ?? 0;
                $skor += $nilaiNormalisasi * $bobot;
            }

            $skorKarir[$karirNama] = $skor;
            $totalSkorSAW = array_sum($skorKarir); // lebih akurat dan clean

        }

        // 3. Hitung persen kontribusi tiap karir terhadap total skor
        $hasilGabungan = [];
        foreach ($skorKarir as $karirNama => $skorSAW) {
            $persen = $totalSkorSAW > 0 ? ($skorSAW / $totalSkorSAW) : 0;

            $hasilGabungan[] = [
                'karir' => $karirNama,
                'saw'   => $skorSAW,  // Nilai skor mentah
                'skor'  => $persen    // Nilai skor dalam bentuk persentase (0.xx)
            ];
        }

        // 4. Urutkan hasil dari persentase tertinggi ke terendah
        usort($hasilGabungan, fn($a, $b) => $b['skor'] <=> $a['skor']);

        return view('Dashboard/pages/rekomendasi', [
            'title'      => 'Hasil Rekomendasi Karir',
            'activePage' => 'rekomendasi',
            'hasil'      => $hasilGabungan,
            'skorSaw'    => $skorKarir,
            'proses'     => [
                'nilai_mahasiswa' => $nilaiMahasiswa,
                'normalisasi'     => $normalisasi,
                'bobot_karir'     => $bobotKarir,
            ]
        ]);
    }
}
