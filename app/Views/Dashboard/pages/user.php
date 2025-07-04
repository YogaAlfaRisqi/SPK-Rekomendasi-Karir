<?= $this->extend('Dashboard/layout/dashboard') ?>
<?= $this->section('content') ?>

<div class="container-fluid px-4">
  <h3 class="mt-4"><?= esc($title) ?></h3>
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active"><?= esc($subtitle) ?></li>
  </ol>

  <!-- Button Trigger Modal -->
  <button type="button" class="btn btn-outline-primary shadow-sm mb-2" data-bs-toggle="modal" data-bs-target="#userModal" onclick="openCreateModal()">
    <i class="bi bi-plus-circle me-1"></i> Tambah User
  </button>

  <!-- Flashdata -->
  <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
  <?php endif ?>

  <!-- Table -->
  <div class="table-responsive shadow-sm rounded">
    <table class="table table-striped table-hover table-bordered align-middle mb-0">
      <thead class="table-primary text-center text-uppercase">
        <tr>
          <th>#</th>
          <th>Nama</th>
          <th>Email</th>
          <th>Role</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($users as $i => $user): ?>
          <tr>
            <td class="text-center"><?= $i + 1 ?></td>
            <td><?= esc($user['name']) ?></td>
            <td><?= esc($user['email']) ?></td>
            <td class="text-center"><?= esc($user['role']) ?></td>
            <td class="text-center">
              <button class="btn btn-sm btn-outline-primary me-1"
                onclick='openEditModal(<?= json_encode($user) ?>)'>
                <i class="bi bi-pencil"></i>
              </button>
              <form action="<?= base_url('admin/user/delete/' . $user['id']) ?>" method="post" class="d-inline" onsubmit="return confirm('Hapus user ini?')">
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

<!-- Modal Tambah/Edit User -->
<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="userForm" method="post">
      <?= csrf_field() ?>
      <div class="modal-content rounded-4 shadow">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTitle">Tambah User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" id="userId">

          <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" id="name" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password <small id="passwordNote" class="text-muted">(biarkan kosong jika tidak ingin mengganti)</small></label>
            <input type="password" name="password" id="password" class="form-control">
          </div>
          <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select name="role" id="role" class="form-select" required>
              <option value="user">User</option>
              <option value="admin">Admin</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary" id="submitButton">Simpan</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Script -->
<script>
  function openCreateModal() {
    document.getElementById("modalTitle").innerText = "Tambah User";
    document.getElementById("userForm").action = "<?= base_url('admin/user/create') ?>";
    document.getElementById("userId").value = "";
    document.getElementById("name").value = "";
    document.getElementById("email").value = "";
    document.getElementById("password").value = "";
    document.getElementById("role").value = "user";
    document.getElementById("passwordNote").style.display = "none";
    document.getElementById("password").required = true;
  }

  function openEditModal(user) {
    const modal = new bootstrap.Modal(document.getElementById('userModal'));
    modal.show();

    document.getElementById("modalTitle").innerText = "Edit User";
    document.getElementById("userForm").action = "<?= base_url('admin/user/update') ?>/" + user.id;
    document.getElementById("userId").value = user.id;
    document.getElementById("name").value = user.name;
    document.getElementById("email").value = user.email;
    document.getElementById("password").value = "";
    document.getElementById("role").value = user.role;
    document.getElementById("passwordNote").style.display = "inline";
    document.getElementById("password").required = false;
  }
</script>

<?= $this->endSection() ?>