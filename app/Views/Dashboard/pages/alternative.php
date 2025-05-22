<?= $this->extend('Dashboard/layout/dashboard') ?>

<?= $this->section('content') ?>

<div class="container-fluid px-4">
  <h3 class="mt-4"><?= esc($title) ?></h3>
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active"><?= esc($subtitle) ?></li>
  </ol>

  <div class="mb-3">
    <a href="<?= base_url('your-controller/add') ?>" class="btn btn-outline-primary shadow-sm">
      <i class="bi bi-plus-circle me-1"></i> Add New
    </a>
  </div>

  <div class="table-responsive shadow-sm rounded">
    <table class="table table-striped table-hover table-bordered align-middle mb-0">
      <thead class="table-primary text-center text-uppercase">
        <tr>
          <th scope="col" style="width: 50px;">#</th>
          <th scope="col">Nama Kriteria</th>
          <th scope="col">Bobot</th>
          
          <th scope="col" style="width: 160px;">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row" class="text-center">1</th>
          <td>Gaji</td>
          <td>0.2544</td>
          <td class="text-center">
            <a href="<?= base_url('your-controller/edit/1') ?>" class="btn btn-sm btn-outline-primary me-1" title="Edit">
              <i class="bi bi-pencil"></i>
            </a>
            <a href="<?= base_url('your-controller/delete/1') ?>" class="btn btn-sm btn-outline-danger" title="Delete" onclick="return confirm('Are you sure want to delete this item?');">
              <i class="bi bi-trash"></i>
            </a>

          </td>
        </tr>
        <tr>
          <th scope="row" class="text-center">2</th>
          <td>Prospek Kerja</td>
          <td>0.0761</td>
          <td class="text-center">
            <a href="<?= base_url('your-controller/edit/2') ?>" class="btn btn-sm btn-outline-primary me-1" title="Edit">
              <i class="bi bi-pencil"></i>
            </a>
            <a href="<?= base_url('your-controller/delete/2') ?>" class="btn btn-sm btn-outline-danger" title="Delete" onclick="return confirm('Are you sure want to delete this item?');">
              <i class="bi bi-trash"></i>
            </a>
          </td>
        </tr>
        
      </tbody>
    </table>
  </div>
</div>

<?= $this->endSection() ?>