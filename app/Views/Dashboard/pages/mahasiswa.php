<?= $this->extend('Dashboard/layout/dashboard') ?>

<?= $this->section('content') ?>

<div class="container-fluid px-4">
  <h3 class="mt-4"><?= esc($title) ?></h3>
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active"></li>
  </ol>

  <!-- Trigger Modal for Create -->
  <button type="button" class="btn btn-outline-primary shadow-sm mb-2" data-bs-toggle="modal" data-bs-target="#criteriaModal">
    <i class="bi bi-plus-circle me-1"></i> Add New
  </button>

  <div class="table-responsive shadow-sm rounded">
    <table class="table table-striped table-hover table-bordered align-middle mb-0">
      <thead class="table-primary text-center text-uppercase">
        <tr>
          <th scope="col" style="width: 50px;">No</th>
          <th scope="col">ID</th>
          <th scope="col">Nama Mahasiswa</th>

          <th scope="col" style="width: 160px;">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1;
        foreach ($criteria as $crt): ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= ($crt['id']) ?></td>
            <td><?= ($crt['nama']) ?></td>

            <td class="text-center">
              <button
                class="btn btn-sm btn-outline-primary me-1 btn-edit"
                data-id="<?= $crt['id'] ?>"
                data-kriteria="<?= $crt['kriteria'] ?>"
                data-jenis="<?= $crt['jenis'] ?>"
                title="Edit">
                <i class="bi bi-pencil"></i>
              </button>

              <button class="btn btn-sm btn-outline-danger btn-delete" data-id="<?= $crt['id'] ?>" title="Delete">
                <i class="bi bi-trash"></i>
              </button>

            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>


<!-- Modal -->
<div class="modal fade <?= $isEdit ? 'show d-block' : '' ?>" id="criteriaModal" tabindex="-1" aria-labelledby="criteriaModalLabel" aria-hidden="<?= $isEdit ? 'false' : 'true' ?>" style="<?= $isEdit ? 'background-color: rgba(0,0,0,0.5);' : '' ?>">
  <div class="modal-dialog">
    <form action="<?= $formAction ?>" method="post">
      <?= csrf_field() ?>
      <div class="modal-content rounded-4 shadow">
        <div class="modal-header">
          <h5 class="modal-title"><?= $modalTitle ?></h5>
          <a href="<?= current_url() ?>" class="btn-close" aria-label="Close"></a>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="kriteria" class="form-label">Nama Kriteria</label>
            <input type="text" class="form-control" name="kriteria" id="kriteria" required
              value="<?= $isEdit ? esc($edit['kriteria']) : '' ?>">
          </div>

          <div class="mb-3">
            <label for="jenis" class="form-label">Jenis</label>
            <select name="jenis" id="jenis" class="form-control" required>
              <option value="">-- Pilih Jenis --</option>
              <option value="Benefit" <?= ($isEdit && $edit['jenis'] == 'Benefit') ? 'selected' : '' ?>>Benefit</option>
              <option value="Cost" <?= ($isEdit && $edit['jenis'] == 'Cost') ? 'selected' : '' ?>>Cost</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <a href="<?= current_url() ?>" class="btn btn-light">Cancel</a>

          <button type="submit" class="btn btn-primary"><?= $submitLabel ?></button>
        </div>
      </div>
    </form>
  </div>
</div>


<!-- Form Update -->
<script>
  document.querySelectorAll('.btn-edit').forEach(button => {
    button.addEventListener('click', function() {
      const id = this.dataset.id;
      const kriteria = this.dataset.kriteria;
      const jenis = this.dataset.jenis;

      // Isi form modal
      document.getElementById('kriteria').value = kriteria;
      document.getElementById('jenis').value = jenis;

      // Ubah form action
      document.querySelector('#criteriaModal form').action = `<?= base_url('criteria/update') ?>/${id}`;

      // Tampilkan modal
      const modal = new bootstrap.Modal(document.getElementById('criteriaModal'));
      modal.show();
    });
  });
</script>

<!-- Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if (session()->getFlashdata('success')): ?>
  <script>
    Swal.fire({
      icon: 'success',
      title: 'Berhasil',
      text: '<?= session()->getFlashdata('success') ?>',
      showConfirmButton: false,
      timer: 2500
    });
  </script>
<?php endif; ?>



<!-- Form delete -->
<script>
  document.querySelectorAll('.btn-delete').forEach(button => {
    button.addEventListener('click', function() {
      const id = this.dataset.id;

      Swal.fire({
        title: 'Yakin ingin menghapus?',
        text: "Data yang dihapus tidak bisa dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = `<?= base_url('criteria/delete') ?>/${id}`;
        }
      });
    });
  });
</script>

<?php if (session()->getFlashdata('success')): ?>
  <script>
    Swal.fire({
      icon: 'success',
      title: 'Berhasil',
      text: '<?= session()->getFlashdata('success') ?>',
      showConfirmButton: false,
      timer: 2500
    });
  </script>
<?php endif; ?>




<style>
  table.table {
    font-size: 0.875rem;
    /* set ke 14px */
  }

  table.table th,
  table.table td {
    vertical-align: middle;
    text-align: center;
    padding: 0.5rem;
  }

  .btn-sm {
    font-size: 0.75rem;
    /* tombol kecil */
    padding: 0.25rem 0.5rem;
  }

  h3.mt-4 {
    font-size: 1.5rem;
    /* judul sedang */
  }

  .breadcrumb {
    font-size: 0.85rem;
  }

  .form-label,
  .form-control,
  select.form-control {
    font-size: 0.875rem;
  }

  .modal-title {
    font-size: 1rem;
  }
</style>






<?= $this->endSection() ?>