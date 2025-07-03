<?= $this->extend('Dashboard/layout/dashboard') ?>
<?= $this->section('content') ?>

<div class="container py-4">

    <?php if (!empty($hasil)): ?>
        <?php
        $topKarir = $hasil[0]['karir'];
        $topSkor = (float) $hasil[0]['skor'];
        $topSkorPersen = number_format($topSkor * 100, 2);
        ?>

        <!-- Karir Utama -->
        <div class="card text-center shadow-sm border-0 mb-4 bg-light rounded-4 p-4 animate__animated animate__fadeInDown">
            <div class="card-body">
                <div class="mb-3">
                    <i class="fas fa-bolt fa-3x text-primary"></i>
                </div>
                <h6 class="text-uppercase text-muted mb-1">Your Best Career Match</h6>
                <h2 class="fw-bold text-primary mb-2"><?= esc($topKarir) ?></h2>
                <span class="badge rounded-pill bg-success px-3 py-2 mb-3 fs-6">
                    Match Score: <?= $topSkorPersen ?>%
                </span>
                <p class="text-muted mb-4">
                    Based on your preferences, this career suits you best.
                </p>
            </div>

            <!-- Progress Kriteria -->
            <?php if (!empty($proses['normalisasi'])): ?>
                <div class="row mb-4 animate__animated animate__fadeInUp animate__delay-1s">
                    <?php foreach ($proses['normalisasi'] as $kriteria => $nilai): ?>
                        <div class="col-md-4 mb-3">
                            <div class="card shadow-sm border-0 h-100">
                                <div class="card-body">
                                    <p class="fw-semibold mb-1"><?= esc($kriteria) ?></p>
                                    <div class="progress" style="height: 8px;">
                                        <div class="progress-bar bg-info" style="width: <?= round($nilai * 100) ?>%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- Ranking Karir -->
        <div class="card shadow-sm border-0 mb-4 animate__animated animate__fadeIn animate__delay-2s">
            <div class="card-header bg-light fw-semibold">📋 Career Match Ranking</div>
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 10%">Rank</th>
                            <th>Career</th>
                            <th>Skor SAW</th> <!-- Tambahkan kolom -->
                            <th>Prosentase (%)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($hasil as $i => $item): ?>
                            <?php
                            $skorSaw     = number_format($item['saw'], 2);
                            $matchPersen = number_format($item['skor'] * 100, 2);
                            ?>
                            <tr>
                                <td><?= ['🥇', '🥈', '🥉'][$i] ?? $i + 1 ?></td>
                                <td><?= esc($item['karir']) ?></td>
                                <td><code><?= $skorSaw ?></code></td> <!-- Tampilkan skor SAW mentah -->
                                <td>
                                    <span class="badge bg-<?= $i === 0 ? 'success' : 'secondary' ?>">
                                        <?= $matchPersen ?>%
                                    </span>
                                </td>


                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Simpan Riwayat -->
        <div class="text-center mt-3">
            <form action="<?= base_url('riwayat/simpan') ?>" method="post">
                <?= csrf_field() ?>

                <!-- Data disimpan dari hasil tertinggi (ranking 1) -->
                <input type="hidden" name="karir" value="<?= esc($hasil[0]['karir']) ?>">
                <input type="hidden" name="skor" value="<?= $hasil[0]['saw'] ?>"> <!-- Skor SAW mentah (float) -->
                <input type="hidden" name="persentase" value="<?= round($hasil[0]['skor'] * 100, 2) ?>"> <!-- Persentase -->

                <button type="submit" class="btn btn-primary">
                    💾 Simpan ke Riwayat
                </button>
            </form>
        </div>

    <?php else: ?>
        <div class="alert alert-info text-center">
            Belum ada hasil perhitungan. Silakan isi preferensi terlebih dahulu.
        </div>
    <?php endif; ?>

</div>

<?= $this->endSection() ?>