<?= $this->extend('Dashboard/layout/dashboard') ?>
<?= $this->section('content') ?>

<div class="container py-4">
  <h4 class="mb-4 fw-bold">Preferensi</h4>

  <ul class="nav nav-tabs mb-4" id="courseTabs">
    <li class="nav-item"><a class="nav-link active" href="#" data-tab="0">Nilai</a></li>
    <li class="nav-item"><a class="nav-link" href="#" data-tab="1">Cek Nilai</a></li>
  </ul>

  <div class="tab-content">
    <!-- Tab Nilai -->
    <div class="tab-pane active" data-content="0">
      <div class="row g-4 flex-column">


        <?php
        $pertanyaan = [
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
            "Analisis & Perancangan Sistem",
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
            "Data Warehouse & Data Mining",
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

        $nilai_opsi = ["A", "A-", "B+", "B", "C+", "C", "D", "E"];

        foreach ($pertanyaan as $index => $item):
        ?>
          <div class="row g-4 mb-4">
            <div class="col-md-4" style="height: 200px; overflow: hidden;">
              <img
                src="<?= base_url("images/" . $item[0]) ?>"
                class="img-fluid rounded"
                style="width: 100%; height: 100%; object-fit: cover;"
                alt="<?= htmlspecialchars($item[1]) ?>">
            </div>

            <div class="col-md-8">
              <div class="mb-3">
                <label class="form-label fw-semibold"><?= $item[1] ?></label>
                <div class="p-3 bg-light border rounded mb-2">
                  <?= $item[2] ?>
                </div>
                <select class="form-select" name="nilai[<?= $item[1] ?>]">
                  <option disabled selected>Pilih nilai</option>
                  <?php foreach ($nilai_opsi as $nilai): ?>
                    <option value="<?= $nilai ?>"><?= $nilai ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
          </div>
        <?php endforeach; ?>

        <div class="d-flex gap-2">
          <button class="btn btn-outline-secondary">Simpan</button>
          <button class="btn btn-primary">Lanjut</button>
        </div>
      </div>
    </div>
    <!-- Tab Cek Nilai -->
    <div class="tab-pane active" data-content="1">
      <div class="row g-4">
        <div class="col-md-4">
          <img src="<?= base_url("images/Projects.jpg") ?>" class="img-fluid rounded" alt="Project">
        </div>
        <div class="col-md-8">
          <div class="mb-3">
            <label class="form-label fw-semibold">Rekap Nilai Anda</label>
            <div class="p-3 bg-light border rounded mb-3">
              <p>Berikut adalah rekap nilai Anda berdasarkan input sebelumnya. Gunakan informasi ini untuk menilai kesiapan Anda dalam berkarier.</p>

              <?php
              // Simulasi data (replace dengan data dari database / session / post)
              $daftarNilai = $nilai ?? [];

              // Daftar semua mata kuliah
              $semuaMatkul = [
                "Algoritma dan Pemrograman",
                "Basis Data",
                "Pemrograman Web",
                "Konsep Sistem Informasi",
                "Analisis dan Perancangan Sistem",
                "Rekayasa Perangkat Lunak",
                "Data Warehouse dan Data Mining",
                "Struktur Data",
                "Jaringan Komputer",
                "Manajemen Jaringan",
                "Network Administrator",
                "Manajemen Proyek TI",
              ];

              $adaNilai = false;

              echo '<ul class="list-group mb-2">';
              foreach ($semuaMatkul as $matkul) {
                $nilaiHuruf = $daftarNilai[$matkul] ?? null;
                echo '<li class="list-group-item d-flex justify-content-between align-items-center">';
                echo htmlspecialchars($matkul);
                if ($nilaiHuruf) {
                  echo '<span class="badge bg-primary rounded-pill">' . htmlspecialchars($nilaiHuruf) . '</span>';
                  $adaNilai = true;
                } else {
                  echo '<span class="text-muted">Belum ada data</span>';
                }
                echo '</li>';
              }
              echo '</ul>';
              ?>

              <?php if (!$adaNilai): ?>
                <div class="alert alert-warning mt-3 mb-0">
                  Belum ada data nilai yang diinput.
                </div>
              <?php endif; ?>
            </div>

            <div class="d-flex gap-2">
              <button class="btn btn-outline-secondary" onclick="history.back()">Kembali</button>
              <button class="btn btn-primary">Lanjut</button>
            </div>
          </div>
        </div>
      </div>
    </div>




  </div>
</div>

<style>
  body {
    background-color: #f5fbff;
    font-family: sans-serif;
  }

  .nav-tabs .nav-link.active {
    font-weight: 600;
    color: #0d6efd;
    background-color: transparent;
    border: none;
    border-bottom: 3px solid #0d6efd;
  }

  .form-control,
  .form-select {
    font-size: 14px;
  }

  .tab-pane {
    animation: fadeIn 0.2s ease-in-out;
  }

  @keyframes fadeIn {
    from {
      opacity: 0;
      transform: translateY(10px);
    }

    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
</style>

<script>
  const tabs = document.querySelectorAll('#courseTabs .nav-link');
  const tabContents = document.querySelectorAll('.tab-pane');
  const nextButtons = document.querySelectorAll('.btn.btn-primary');

  function activateTab(index) {
    tabs.forEach(tab => tab.classList.remove('active'));
    tabContents.forEach(content => {
      content.classList.add('d-none');
      content.classList.remove('active');
    });

    if (tabs[index]) tabs[index].classList.add('active');
    if (tabContents[index]) {
      tabContents[index].classList.remove('d-none');
      tabContents[index].classList.add('active');
    }
  }

  tabs.forEach((tab, index) => {
    tab.addEventListener('click', function(e) {
      e.preventDefault();
      activateTab(index);
    });
  });

  nextButtons.forEach(btn => {
    btn.addEventListener('click', function() {
      const activeIndex = Array.from(tabs).findIndex(tab => tab.classList.contains('active'));
      if (activeIndex < tabs.length - 1) {
        activateTab(activeIndex + 1);
      }
    });
  });
</script>

<?= $this->endSection() ?>