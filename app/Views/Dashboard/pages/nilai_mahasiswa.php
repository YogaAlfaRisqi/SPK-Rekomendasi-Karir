<?= $this->extend('Dashboard/layout/dashboard') ?>
<?= $this->section('content') ?>

<div class="container-fluid px-4">
    <h3 class="mt-4"><?= esc($title) ?></h3>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><?= esc($subtitle ?? 'Manajemen Nilai Mahasiswa') ?></li>
    </ol>

    <button type="button" class="btn btn-outline-primary shadow-sm mb-3" data-bs-toggle="modal" data-bs-target="#nilaiModal">
        <i class="bi bi-plus-circle me-1"></i> Tambah Nilai
    </button>

    <div class="table-responsive shadow-sm rounded">
        <table class="table table-bordered table-hover align-middle mb-0">
            <thead class="table-primary text-center text-uppercase">
                <tr>
                    <th>#</th>
                    <th>Nama Mahasiswa</th>
                    <?php for ($i = 1; $i <= 12; $i++): ?>
                        <th>C0<?= $i ?></th>
                    <?php endfor ?>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($nilai as $index => $item): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= esc($item['nama_mahasiswa']) ?></td>
                        <?php for ($i = 1; $i <= 12; $i++): ?>
                            <td><?= esc($item['C0' . $i]) ?></td>
                        <?php endfor ?>
                        <td class="text-center">
                            <button class="btn btn-sm btn-outline-primary btn-edit"
                                data-id="<?= $item['id'] ?>"
                                data-nama="<?= esc($item['nama_mahasiswa']) ?>"
                                <?php for ($i = 1; $i <= 12; $i++): ?>
                                data-c0<?= $i ?>="<?= esc($item['C0' . $i]) ?>"
                                <?php endfor ?>>
                                <i class="bi bi-pencil"></i>
                            </button>
                            <form action="<?= base_url('deletenilaimahasiswa/' . $item['id']) ?>" method="post" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                <?= csrf_field() ?>
                                <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Tambah/Edit -->
<div class="modal fade" id="nilaiModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <form method="post" id="nilaiForm" action="<?= base_url('createnilaimahasiswa') ?>">
            <?= csrf_field() ?>
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header">
                    <h5 class="modal-title" id="nilaiModalLabel">Tambah Nilai Mahasiswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                        <label for="nama_mahasiswa" class="form-label">Nama Mahasiswa</label>
                        <input type="text" class="form-control" name="nama_mahasiswa" id="nama_mahasiswa" required>
                    </div>
                    <div class="row">
                        <?php for ($i = 1; $i <= 12; $i++): ?>
                            <div class="col-md-3 mb-3">
                                <label for="C0<?= $i ?>" class="form-label">C<?= $i ?></label>
                                <input type="text" step="any" min="0" class="form-control" name="C0<?= $i ?>" id="C0<?= $i ?>" maxlength="2" required>
                            </div>
                        <?php endfor ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Bootstrap JS (wajib untuk modal) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-...isi-terbaru..." crossorigin="anonymous"></script>

<!-- JS Script -->

<script>
    const form = document.getElementById('nilaiForm');
    const modal = new bootstrap.Modal(document.getElementById('nilaiModal'));

    document.querySelectorAll('.btn-edit').forEach(btn => {
        btn.addEventListener('click', () => {
            document.getElementById('id').value = btn.dataset.id;
            document.getElementById('nama_mahasiswa').value = btn.dataset.nama;
            <?php for ($i = 1; $i <= 12; $i++): ?>
                document.getElementById('C0<?= $i ?>').value = btn.dataset.c0<?= $i ?>;
            <?php endfor ?>
            form.action = "<?= base_url('updatenilaimahasiswa') ?>/" + btn.dataset.id;
            document.getElementById('nilaiModalLabel').textContent = "Edit Nilai Mahasiswa"; // Perbaikan di sini
            modal.show();
        });
    });


    form.addEventListener('submit', function() {
        this.querySelector('button[type="submit"]').disabled = true;
    });
</script>

<?= $this->endSection() ?>