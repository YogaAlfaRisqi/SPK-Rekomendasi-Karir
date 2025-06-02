<?= $this->extend('Dashboard/layout/dashboard') ?>

<?= $this->section('content') ?>

<div class="container-fluid px-4">
  <h3 class="mt-4"><?= esc($title) ?></h3>
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active"><?= esc($subtitle) ?></li>
  </ol>

  <!-- Trigger Modal for Create -->
  <button type="button" class="btn btn-outline-primary shadow-sm mb-2" data-bs-toggle="modal" data-bs-target="#criteriaModal">
    <i class="bi bi-plus-circle me-1"></i> Add New
  </button>


  <div class="table-responsive shadow-sm rounded">
    <table class="table table-striped table-hover table-bordered align-middle mb-0">
      <thead class="table-primary text-center text-uppercase">
        <tr>
          <th scope="col" style="width: 50px;">#</th>
          <th scope="col">Username</th>
          <th scope="col">Email</th>
          <th scope="col">Password</th>
          <th scope="col" style="width: 160px;">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row" class="text-center">1</th>
          <td>Arya</td>
          <td>arya@gmail.com</td>
          <td>arya12345</td>
          <td class="text-center">
            <a href="?edit=1" class="btn btn-sm btn-outline-primary me-1" title="Edit">
              <i class="bi bi-pencil"></i>
            </a>
            <a href="<?= base_url('your-controller/delete/1') ?>" class="btn btn-sm btn-outline-danger" title="Delete" onclick="return confirm('Are you sure want to delete this item?');">
              <i class="bi bi-trash"></i>
            </a>

          </td>
        </tr>

      </tbody>
    </table>
  </div>
</div>

<!-- Modal Form -->
<?php
// Simulasi data edit manual via URL
$isEdit = isset($_GET['edit']) && $_GET['edit'] == '1';
$edit = $isEdit ? [
  'id' => 1,
  'username' => 'Arya',
  'email' => "arya@gmail.com",
  'password' => "arya12345"
] : null;

$formAction = $isEdit ? base_url('update') : base_url('create');
$modalTitle = $isEdit ? 'Edit User' : 'Add New User';
$submitLabel = $isEdit ? 'Update' : 'Save';
?>

<!-- Modal shown only if editing -->
<?php if ($isEdit): ?>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var modal = new bootstrap.Modal(document.getElementById('criteriaModal'));
      modal.show();
    });
  </script>
<?php endif; ?>


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
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" id="username" required value="<?= $isEdit ? esc($edit['username']) : '' ?>">
          </div>

          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" step="any" class="form-control" name="email" id="email" required value="<?= $isEdit ? esc($edit['email']) : '' ?>">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" step="any" class="form-control" name="password" id="password" required value="<?= $isEdit ? esc($edit['password']) : '' ?>">
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


<?= $this->endSection() ?>