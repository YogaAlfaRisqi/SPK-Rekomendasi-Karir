<?php echo $this->extend('Dashboard/layout/dashboard') ?>

<?php echo $this->section('content') ?>
<div class="overflow-auto">
    <ul class="nav nav-tabs flex-nowrap mb-4" id="roleTab" role="tablist" style="white-space: nowrap;">
        <?php $index = 0;
        foreach ($roles as $key => $role): ?>
            <li class="nav-item" role="presentation">
                <button class="nav-link <?= $index === 0 ? 'active' : '' ?> text-truncate"
                    id="<?= $key ?>-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#tab-<?= $key ?>"
                    type="button"
                    role="tab"
                    aria-controls="tab-<?= $key ?>"
                    aria-selected="<?= $index === 0 ? 'true' : 'false' ?>"
                    style="max-width: 140px;">
                    <?= esc(implode(' ', array_slice(explode(' ', $role['title']), -2))) ?>
                </button>
            </li>
        <?php $index++;
        endforeach; ?>
    </ul>
</div>



<div class="tab-content" id="roleTabContent">
    <?php $index = 0;
    foreach ($roles as $key => $role): ?>
        <div class="tab-pane fade <?= $index === 0 ? 'show active' : '' ?>" id="tab-<?= $key ?>" role="tabpanel" aria-labelledby="<?= $key ?>-tab">


            <div class="container-fluid px-4 mt-0 shadow-sm rounded bg-white">
                <h3 class="mt-4 text-<?= $role['color'] ?> fw-bold"><?= esc($role['title']) ?></h3>
                <button class="btn btn-outline-<?= $role['color'] ?> shadow-sm mb-2" onclick="openAddModal('<?= $key ?>')">
                    <i class="bi bi-plus-circle me-1"></i> Tambah Bobot
                </button>

                <div class="table-responsive shadow-sm rounded ">
                    <table class="table table-striped table-hover table-bordered align-middle mb-0">
                        <thead class="table-<?= $role['color'] ?> text-center text-uppercase">
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
                            foreach ($$key as $item): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= esc($item['id']) ?></td>
                                    <td><?= esc($item['kriteria']) ?></td>
                                    <td><?= esc($item['bobot']) ?></td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-outline-<?= $role['color'] ?> me-1"
                                            onclick="openEditModal('<?= $key ?>', this)"
                                            data-id="<?= $item['id'] ?>"
                                            data-kriteria="<?= esc($item['kriteria']) ?>"
                                            data-bobot="<?= esc($item['bobot']) ?>">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger"
                                            onclick="deleteItem('<?= $key ?>', <?= $item['id'] ?>)">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="modal<?= ucfirst($key) ?>" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <form method="POST" id="form<?= ucfirst($key) ?>" class="modal-content rounded-4 border-0 shadow overflow-hidden"
                        action="<?= base_url("pembobotan/add{$key}") ?>">
                        <?= csrf_field() ?>
                        <input type="hidden" name="id" id="id_<?= $key ?>">
                        <div class="modal-header bg-<?= $role['color'] ?> text-white">
                            <h5 class="modal-title" id="modalLabel<?= ucfirst($key) ?>"></h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Kriteria</label>
                                <input type="text" name="kriteria" class="form-control" id="kriteria_<?= $key ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Bobot</label>
                                <input type="number" name="bobot" class="form-control" id="bobot_<?= $key ?>" required min="1">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-<?= $role['color'] ?>" id="submitBtn<?= ucfirst($key) ?>">Add</button>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    <?php $index++;
    endforeach; ?>
</div>

<!-- Script Modal Logic -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Inisialisasi semua modal dari server-side roles
    const modalInstances = {};
    const baseUrls = {};

    <?php foreach ($roles as $key => $role): ?>
        modalInstances['<?= $key ?>'] = new bootstrap.Modal(document.getElementById('modal<?= ucfirst($key) ?>'));
        baseUrls['<?= $key ?>'] = {
            add: "<?= base_url("pembobotan/add{$key}") ?>",
            update: "<?= base_url("pembobotan/update{$key}") ?>",
            delete: "<?= base_url("pembobotan/delete{$key}") ?>"
        };
    <?php endforeach; ?>

    function openAddModal(type) {
        const form = document.getElementById(`form${capitalize(type)}`);
        const modalLabel = document.getElementById(`modalLabel${capitalize(type)}`);
        const submitBtn = document.getElementById(`submitBtn${capitalize(type)}`);
        const idField = document.getElementById(`id_${type}`);

        if (!form || !modalLabel || !submitBtn || !modalInstances[type] || !baseUrls[type]) {
            console.error(`openAddModal: Invalid type or missing elements for '${type}'`);
            return;
        }

        form.reset();
        form.action = baseUrls[type].add;
        modalLabel.innerText = 'Tambah Bobot';
        submitBtn.innerText = 'Add';
        idField.value = '';

        modalInstances[type].show();
    }

    function openEditModal(type, button) {
        const id = button.getAttribute('data-id');
        const kriteria = button.getAttribute('data-kriteria');
        const bobot = button.getAttribute('data-bobot');

        const form = document.getElementById(`form${capitalize(type)}`);
        const modalLabel = document.getElementById(`modalLabel${capitalize(type)}`);
        const submitBtn = document.getElementById(`submitBtn${capitalize(type)}`);
        const idField = document.getElementById(`id_${type}`);
        const kriteriaField = document.getElementById(`kriteria_${type}`);
        const bobotField = document.getElementById(`bobot_${type}`);

        if (!form || !modalLabel || !submitBtn || !modalInstances[type] || !baseUrls[type]) {
            console.error(`openEditModal: Invalid type or missing elements for '${type}'`);
            return;
        }

        form.action = baseUrls[type].update + '/' + id;
        modalLabel.innerText = 'Edit Bobot';
        submitBtn.innerText = 'Update';

        idField.value = id;
        kriteriaField.value = kriteria;
        bobotField.value = bobot;

        modalInstances[type].show();
    }

    function deleteItem(type, id) {
        if (!baseUrls[type]) {
            console.error(`deleteItem: No delete URL for type '${type}'`);
            return;
        }

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
                window.location.href = baseUrls[type].delete + '/' + id;
            }
        });
    }

    function capitalize(str) {
        return str.charAt(0).toUpperCase() + str.slice(1);
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