<?php echo $this->extend('Dashboard/layout/dashboard') ?>

<?php echo $this->section('content') ?>

<!-- Pembobotan Web Developer -->
<div class="container-fluid px-4">
    <h3 class="mt-4 text-primary fw-bold"><?= esc($title1) ?></h3>
    <button class="btn btn-outline-primary shadow-sm mb-2" onclick="openAddModal('web')">
        <i class="bi bi-plus-circle me-1"></i> Tambah Bobot
    </button>

    <div class="table-responsive shadow-sm rounded">
        <table class="table table-striped table-hover table-bordered align-middle mb-0">
            <thead class="table-primary text-center text-uppercase">
                <tr>
                    <th style="width: 50px;">No</th>
                    <th>ID</th>
                    <th>Nama Kriteria</th>
                    <th>Bobot</th>
                    <th style="width: 160px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($webdeveloper as $item): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= esc($item['id']) ?></td>
                        <td><?= esc($item['kriteria']) ?></td>
                        <td><?= esc($item['bobot']) ?></td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-outline-primary me-1" onclick="openEditModal('web', this)"
                                data-id="<?= $item['id'] ?>" data-kriteria="<?= esc($item['kriteria']) ?>" data-bobot="<?= esc($item['bobot']) ?>">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-danger" onclick="deleteItem('web', <?= $item['id'] ?>)">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Web Developer -->
<div class="modal fade" id="modalWeb" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <form method="POST" id="formWeb" class="modal-content rounded-4 border-0 shadow overflow-hidden"
            action="<?= base_url('pembobotan/addWebdeveloper') ?>">
            <?= csrf_field() ?>
            <input type="hidden" name="id" id="id_web">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalLabelWeb"></h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Kriteria</label>
                    <input type="text" name="kriteria" class="form-control" id="kriteria_web" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Bobot</label>
                    <input type="number" name="bobot" class="form-control" id="bobot_web" required min="1">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" id="submitBtnWeb">Add</button>
            </div>
        </form>
    </div>
</div>

<!-- Pembobotan Mobile Engineer -->
<div class="container-fluid px-4 mt-5">
    <h3 class="mt-4 text-success fw-bold"><?= esc($title2) ?></h3>
    <button class="btn btn-outline-success shadow-sm mb-2" onclick="openAddModal('mobile')">
        <i class="bi bi-plus-circle me-1"></i> Tambah Bobot
    </button>

    <div class="table-responsive shadow-sm rounded">
        <table class="table table-striped table-hover table-bordered align-middle mb-0">
            <thead class="table-success text-center text-uppercase">
                <tr>
                    <th style="width: 50px;">No</th>
                    <th>ID</th>
                    <th>Nama Kriteria</th>
                    <th>Bobot</th>
                    <th style="width: 160px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($mobileengineer as $item): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= esc($item['id']) ?></td>
                        <td><?= esc($item['kriteria']) ?></td>
                        <td><?= esc($item['bobot']) ?></td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-outline-success me-1" onclick="openEditModal('mobile', this)"
                                data-id="<?= $item['id'] ?>" data-kriteria="<?= esc($item['kriteria']) ?>" data-bobot="<?= esc($item['bobot']) ?>">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-danger" onclick="deleteItem('mobile', <?= $item['id'] ?>)">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Mobile Engineer -->
<div class="modal fade" id="modalMobile" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <form method="POST" id="formMobile" class="modal-content rounded-4 border-0 shadow overflow-hidden"
            action="<?= base_url('pembobotan/addMobileengineer') ?>">
            <?= csrf_field() ?>
            <input type="hidden" name="id" id="id_mobile">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="modalLabelMobile"></h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Kriteria</label>
                    <input type="text" name="kriteria" class="form-control" id="kriteria_mobile" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Bobot</label>
                    <input type="number" name="bobot" class="form-control" id="bobot_mobile" required min="1">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success" id="submitBtnMobile">Add</button>
            </div>
        </form>
    </div>
</div>

<!-- Script Modal Logic -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const modalWeb = new bootstrap.Modal(document.getElementById('modalWeb'));
    const modalMobile = new bootstrap.Modal(document.getElementById('modalMobile'));

    function openAddModal(type) {
        if (type === 'web') {
            document.getElementById('formWeb').reset();
            document.getElementById('formWeb').action = "<?= base_url('pembobotan/addWebdeveloper') ?>";
            document.getElementById('modalLabelWeb').innerText = 'Tambah Bobot';
            document.getElementById('submitBtnWeb').innerText = 'Add';
            document.getElementById('id_web').value = '';
            modalWeb.show();
        } else if (type === 'mobile') {
            document.getElementById('formMobile').reset();
            document.getElementById('formMobile').action = "<?= base_url('pembobotan/addMobileengineer') ?>";
            document.getElementById('modalLabelMobile').innerText = 'Tambah Bobot';
            document.getElementById('submitBtnMobile').innerText = 'Add';
            document.getElementById('id_mobile').value = '';
            modalMobile.show();
        }
    }

    function openEditModal(type, button) {
        const id = button.getAttribute('data-id');
        const kriteria = button.getAttribute('data-kriteria');
        const bobot = button.getAttribute('data-bobot');

        if (type === 'web') {
            document.getElementById('formWeb').action = "<?= base_url('pembobotan/updateWebdeveloper') ?>/" + id;
            document.getElementById('id_web').value = id;
            document.getElementById('kriteria_web').value = kriteria;
            document.getElementById('bobot_web').value = bobot;
            document.getElementById('modalLabelWeb').innerText = 'Edit Bobot';
            document.getElementById('submitBtnWeb').innerText = 'Update';
            modalWeb.show();
        } else if (type === 'mobile') {
            document.getElementById('formMobile').action = "<?= base_url('pembobotan/updateMobileengineer') ?>/" + id;
            document.getElementById('id_mobile').value = id;
            document.getElementById('kriteria_mobile').value = kriteria;
            document.getElementById('bobot_mobile').value = bobot;
            document.getElementById('modalLabelMobile').innerText = 'Edit Bobot';
            document.getElementById('submitBtnMobile').innerText = 'Update';
            modalMobile.show();
        }
    }

    function deleteItem(type, id) {
        let url = '';
        if (type === 'web') url = "<?= base_url('pembobotan/deleteWebdeveloper') ?>";
        if (type === 'mobile') url = "<?= base_url('pembobotan/deleteMobileengineer') ?>";

        Swal.fire({
            title: 'Yakin ingin menghapus?',
            text: 'Data yang dihapus tidak bisa dikembalikan!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url + '/' + id;
            }
        });
    }
</script>

<?php if (session()->getFlashdata('success')): ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '<?= session()->getFlashdata('success') ?>',
            timer: 2500,
            showConfirmButton: false
        });
    </script>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: '<?= session()->getFlashdata('error') ?>',
            confirmButtonText: 'OK'
        });
    </script>
<?php endif; ?>


<?php echo $this->endSection() ?>