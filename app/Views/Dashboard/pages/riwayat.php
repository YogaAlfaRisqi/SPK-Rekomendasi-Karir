<?= $this->extend('Dashboard/layout/dashboard') ?>
<?= $this->section('content') ?>

<div class="container py-4">
    <h4 class="fw-semibold mb-4">Riwayat Rekomendasi Anda</h4>

    <?php if (!empty($riwayat)): ?>
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Karir</th>
                    <th>Skor SAW</th>
                    <th>Persentase</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($riwayat as $i => $item): ?>
                    <?php
                    $skor    = number_format((float) $item['skor'], 4);       // SAW mentah: 4 digit
                    $persen  = number_format((float) $item['persentase'], 2); // %: 2 digit
                    $tanggal = date('d-m-Y', strtotime($item['created_at']));
                    ?>
                    <tr>
                        <td><?= $i + 1 ?></td>
                        <td><?= esc($item['karir']) ?></td>
                        <td><span class="badge bg-primary"><?= $skor ?></span></td>
                        <td><span class="badge bg-success"><?= $persen ?>%</span></td>
                        <td><?= $tanggal ?></td>
                        <td>
                            <form action="<?= base_url('riwayat/hapus/' . $item['id']) ?>" method="post" onsubmit="return confirm('Yakin ingin menghapus riwayat ini?')">
                                <?= csrf_field() ?>
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
    <?php else: ?>
        <div class="alert alert-info text-center">
            Belum ada data riwayat.
        </div>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>