<?= $this->extend('Dashboard/layout/dashboard') ?>
<?= $this->section('content') ?>

<div class="container py-4">
  <h4 class="mb-4 fw-bold">Preferensi</h4>

  <ul class="nav nav-tabs mb-4" id="courseTabs">
    <li class="nav-item"><a class="nav-link active" href="#" data-tab="0">Gaji</a></li>
    <li class="nav-item"><a class="nav-link" href="#" data-tab="1">Prospek Kerja</a></li>
    <li class="nav-item"><a class="nav-link" href="#" data-tab="2">Minat</a></li>
    <li class="nav-item"><a class="nav-link" href="#" data-tab="3">Keterampilan</a></li>
  </ul>

  <!-- Konten Per Tab -->
  <div class="tab-content">
    <!-- Tab Keahlian -->
    <div class="tab-pane active " data-content="0">
      <div class="row g-4">
        <div class="col-md-4">
          <img src="<?= base_url('images/career.jpg') ?>" class="img-fluid rounded" alt="Course Cover">
        </div>
        <div class="col-md-8">
          <div class="mb-3">
            <label class="form-label fw-semibold">Gaji</label>
            <div class="p-3 bg-light border rounded mb-2">
              Anda sedang menilai tingkat minat Anda terhadap <strong>perancangan antarmuka pengguna (UI)</strong>.
              Bidang ini mencakup pembuatan tampilan aplikasi yang <em>user-friendly</em>, modern, dan menarik secara visual.
              Apakah Anda merasa tertarik bekerja dalam proses kreatif untuk mendesain pengalaman digital yang intuitif bagi pengguna?
            </div>
            <select class="form-select" name="minat">
              <option value="1">Sangat Tidak Berminat</option>
              <option value="3">Tidak Berminat</option>
              <option value="5">Netral</option>
              <option value="7">Berminat</option>
              <option value="9">Sangat Berminat</option>
            </select>
          </div>

          <div class="d-flex gap-2">
            <button class="btn btn-outline-secondary">Simpan</button>
            <button class="btn btn-primary">Lanjut</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Tab Minat -->
    <div class="tab-pane d-none" data-content="1">
      <div class="row g-4">
        <div class="col-md-4">
          <img src="<?= base_url('images/career.jpg') ?>" class="img-fluid rounded" alt="Course Cover">
        </div>
        <div class="col-md-8">
          <div class="mb-3">
            <label class="form-label fw-semibold">Prospek Kerja</label>
            <div class="p-3 bg-light border rounded mb-2">
              Anda sedang menilai tingkat minat Anda terhadap <strong>perancangan antarmuka pengguna (UI)</strong>.
              Bidang ini mencakup pembuatan tampilan aplikasi yang <em>user-friendly</em>, modern, dan menarik secara visual.
              Apakah Anda merasa tertarik bekerja dalam proses kreatif untuk mendesain pengalaman digital yang intuitif bagi pengguna?
            </div>
            <select class="form-select" name="minat">
              <option value="1">Sangat Tidak Berminat</option>
              <option value="3">Tidak Berminat</option>
              <option value="5">Netral</option>
              <option value="7">Berminat</option>
              <option value="9">Sangat Berminat</option>
            </select>
          </div>
          <div class="d-flex gap-2">
            <button class="btn btn-outline-secondary">Simpan</button>
            <button class="btn btn-primary">Lanjut</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Tab Lokasi -->
    <div class="tab-pane d-none" data-content="2">
      <div class="row g-4">
        <div class="col-md-4">
          <img src="<?= base_url('images/career.jpg') ?>" class="img-fluid rounded" alt="Course Cover">
        </div>
        <div class="col-md-8">
          <div class="mb-3">
            <label class="form-label fw-semibold">Minat</label>
            <div class="p-3 bg-light border rounded mb-2">
              Anda sedang menilai tingkat minat Anda terhadap <strong>perancangan antarmuka pengguna (UI)</strong>.
              Bidang ini mencakup pembuatan tampilan aplikasi yang <em>user-friendly</em>, modern, dan menarik secara visual.
              Apakah Anda merasa tertarik bekerja dalam proses kreatif untuk mendesain pengalaman digital yang intuitif bagi pengguna?
            </div>
            <select class="form-select" name="minat">
              <option value="1">Sangat Tidak Berminat</option>
              <option value="3">Tidak Berminat</option>
              <option value="5">Netral</option>
              <option value="7">Berminat</option>
              <option value="9">Sangat Berminat</option>
            </select>
          </div>

          <div class="d-flex gap-2">
            <button class="btn btn-outline-secondary">Simpan</button>
            <button class="btn btn-primary">Lanjut</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Tab Keterampilan -->
    <div class="tab-pane d-none" data-content="2">
      <div class="row g-4">
        <div class="col-md-4">
          <img src="<?= base_url('images/career.jpg') ?>" class="img-fluid rounded" alt="Course Cover">
        </div>
        <div class="col-md-8">
          <div class="mb-3">
            <label class="form-label fw-semibold">Keterampilan</label>
            <div class="p-3 bg-light border rounded mb-2">
              Anda sedang menilai tingkat minat Anda terhadap <strong>perancangan antarmuka pengguna (UI)</strong>.
              Bidang ini mencakup pembuatan tampilan aplikasi yang <em>user-friendly</em>, modern, dan menarik secara visual.
              Apakah Anda merasa tertarik bekerja dalam proses kreatif untuk mendesain pengalaman digital yang intuitif bagi pengguna?
            </div>
            <select class="form-select" name="minat">
              <option value="1">Sangat Tidak Berminat</option>
              <option value="3">Tidak Berminat</option>
              <option value="5">Netral</option>
              <option value="7">Berminat</option>
              <option value="9">Sangat Berminat</option>
            </select>
          </div>

          <div class="d-flex gap-2">
            <button class="btn btn-outline-secondary">Simpan</button>
            <button class="btn btn-primary">Lanjut</button>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>



<!-- Style -->
<style>
  body {
    background-color: #f5fbff;
    font-family: sans-serif;
  }

  .nav-tabs .nav-link.active {
    font-weight: 600;
    color: #0d6efd;
    background-color: transparent;
    border: none;
    border-bottom: 3px solid #0d6efd;
  }

  .form-control,
  .form-select {
    font-size: 14px;
  }

  .tab-pane {
    animation: fadeIn 0.2s ease-in-out;
  }

  @keyframes fadeIn {
    from {
      opacity: 0;
      transform: translateY(10px);
    }

    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
</style>

<!-- Script -->
<script>
  const tabs = document.querySelectorAll('#courseTabs .nav-link');
  const tabContents = document.querySelectorAll('.tab-pane');
  const nextButtons = document.querySelectorAll('.btn.btn-primary');

  function activateTab(index) {
    tabs.forEach(tab => tab.classList.remove('active'));
    tabContents.forEach(content => {
      content.classList.add('d-none');
      content.classList.remove('active');
    });

    if (tabs[index]) tabs[index].classList.add('active');
    if (tabContents[index]) {
      tabContents[index].classList.remove('d-none');
      tabContents[index].classList.add('active');
    }
  }


  tabs.forEach((tab, index) => {
    tab.addEventListener('click', function(e) {
      e.preventDefault();
      activateTab(index);
    });
  });

  nextButtons.forEach(btn => {
    btn.addEventListener('click', function() {
      const activeIndex = Array.from(tabs).findIndex(tab => tab.classList.contains('active'));
      if (activeIndex < tabs.length - 1) {
        activateTab(activeIndex + 1);
      }
    });
  });
</script>

<?= $this->endSection() ?>