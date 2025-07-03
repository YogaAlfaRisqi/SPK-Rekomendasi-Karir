<?= $this->extend('Dashboard/layout/dashboard') ?>
<?= $this->section('content') ?>

<div class="container py-4">
    <h2 class="mb-4 text-start">Perhitungan Rekomendasi Karir</h2>

    <?php if (isset($proses)): ?>

        <!-- 1. Nilai Mahasiswa -->
        <h4>1. Nilai Mahasiswa</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kriteria</th>
                    <th>Nilai</th>
                    <th>Nilai Maksimum</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($proses['nilai_mahasiswa'] as $kid => $nilai): ?>
                    <tr>
                        <td>
                            <?php
                            // Cari nama kriteria berdasarkan ID
                            foreach ($proses['bobot_karir'] as $karirBobot) {
                                foreach ($karirBobot as $namaKriteria => $_) {
                                    if (array_key_exists($namaKriteria, $proses['normalisasi'])) {
                                        echo esc($namaKriteria);
                                        break 2;
                                    }
                                }
                            }
                            ?>
                        </td>
                        <td><?= esc($nilai) ?></td>
                        <td><?= esc($proses['nilai_maks'][$kid]) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- 2. Normalisasi -->
        <h4 class="mt-5">2. Normalisasi</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kriteria</th>
                    <th>Hasil Normalisasi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($proses['normalisasi'] as $kriteria => $nilai): ?>
                    <tr>
                        <td><?= esc($kriteria) ?></td>
                        <td><?= esc($nilai) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- 3. Bobot Karir -->
        <h4 class="mt-5">3. Bobot per Karir</h4>
        <?php foreach ($proses['bobot_karir'] as $karir => $bobotList): ?>
            <h5 class="mt-3"><?= esc($karir) ?></h5>
            <table class="table table-sm table-bordered">
                <thead>
                    <tr>
                        <th>Kriteria</th>
                        <th>Bobot</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($bobotList as $kriteria => $bobot): ?>
                        <tr>
                            <td><?= esc($kriteria) ?></td>
                            <td><?= esc($bobot) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endforeach; ?>

        <!-- 4. Hasil Akhir -->
        <h4 class="mt-5">4. Hasil Akhir Rekomendasi Karir</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Peringkat</th>
                    <th>Karir</th>
                    <th>Skor Akhir</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($hasil as $i => $row): ?>
                    <tr <?= $i === 0 ? 'class="table-success fw-bold"' : '' ?>>
                        <td><?= $i + 1 ?></td>
                        <td><?= esc($row['karir']) ?></td>
                        <td><?= esc($row['skor']) ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

    <?php else: ?>
        <div class="alert alert-info text-center">
            Silakan pilih mahasiswa dan lakukan perhitungan untuk melihat hasil.
        </div>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>
