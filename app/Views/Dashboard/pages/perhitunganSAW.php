<?= $this->extend('Dashboard/layout/dashboard') ?>
<?= $this->section('content') ?>

<div class="container-fluid px-4">
  <h3 class="mt-4"><?= esc($title) ?></h3>
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Detail Proses Perhitungan SAW</li>
  </ol>

  <?php foreach ($rekomendasi as $i => $data): ?>
    <?php $collapseId = 'collapseMahasiswa' . $i; ?>
    <div class="card shadow-sm mb-4">
      <div class="card-header fw-bold bg-primary text-white d-flex justify-content-between align-items-center">
        <?= esc($data['nama']) ?>
        <button class="btn btn-sm btn-light text-primary" data-bs-toggle="collapse" data-bs-target="#<?= $collapseId ?>">
          Tampilkan / Sembunyikan Detail
        </button>
      </div>
      <div class="card-body collapse show" id="<?= $collapseId ?>">

        <h6 class="fw-semibold mb-2">1. Nilai Mahasiswa (Huruf dikonversi ke angka)</h6>
        <table class="table table-bordered mb-3">
          <thead class="table-light">
            <tr>
              <th>Kriteria</th>
              <th>Nilai Angka (0-4)</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($data['normalisasi'] as $kriteria => $nilaiNormalisasi): ?>
              <tr>
                <td><?= esc($kriteria) ?></td>
                <td><?= number_format($nilaiNormalisasi * 4, 2) ?></td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>

        <h6 class="fw-semibold mb-2">2. Nilai Normalisasi</h6>
        <table class="table table-bordered mb-3">
          <thead class="table-light">
            <tr>
              <th>Kriteria</th>
              <th>Nilai Normalisasi (0-1)</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($data['normalisasi'] as $kriteria => $nilaiNormalisasi): ?>
              <tr>
                <td><?= esc($kriteria) ?></td>
                <td><?= number_format($nilaiNormalisasi, 4) ?></td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>

        <h6 class="fw-semibold mb-2">3. Skor dan Persentase Setiap Karir</h6>
        <table class="table table-bordered">
          <thead class="table-primary text-center">
            <tr>
              <th>Karir</th>
              <th>Skor SAW</th>
              <th>Persentase (%)</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <?php foreach ($data['hasil'] as $hasil): ?>
              <tr>
                <td class="text-start"><?= esc($hasil['karir']) ?></td>
                <td><?= number_format($hasil['saw'], 4) ?></td>
                <td><?= number_format($hasil['persen'], 2) ?>%</td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>

        <div class="text-end">
          <span class="badge bg-success p-2">
            Rekomendasi: <?= esc($data['hasil'][0]['karir']) ?>
          </span>
        </div>

      </div>
    </div>
  <?php endforeach ?>
</div>

<?= $this->endSection() ?>
