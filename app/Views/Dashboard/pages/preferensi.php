<?= $this->extend('Dashboard/layout/dashboard') ?>
<?= $this->section('content') ?>

<div class="container py-4">
  <h4 class="mb-4 fw-bold">Preferensi</h4>

  <ul class="nav nav-tabs mb-4" id="courseTabs">
    <li class="nav-item"><a class="nav-link active" href="#" data-tab="0">Nilai</a></li>
    <li class="nav-item"><a class="nav-link" href="#" data-tab="1">Cek Nilai</a></li>
  </ul>

  <div class="tab-content">
    <!-- Tab Nilai -->
    <div class="tab-pane active" data-content="0">
      <form action="<?= base_url('preferensi/simpan') ?>" method="post">
        <div class="row g-4 flex-column">
          <?php foreach ($pertanyaan as $index => $item): ?>
            <div class="row g-2 mb-0">
              

              <div class="col-md-8">
                <div class="mb-3">
                  <label class="form-label fw-semibold"><?= $item[1] ?></label>
                  <div class="p-3 bg-light border rounded mb-2">
                    <?= $item[2] ?>
                  </div>
                  <select class="form-select" name="nilai[<?= $item[1] ?>]">
                    <option disabled selected>Pilih nilai</option>
                    <?php foreach ($nilai_opsi as $nilai): ?>
                      <option value="<?= $nilai ?>"><?= $nilai ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
            </div>
          <?php endforeach; ?>

          <div class="d-flex gap-2">
            <button class="btn btn-outline-secondary" type="submit" name="simpan">Simpan</button>
            <button class="btn btn-primary">Lanjut</button>
          </div>
        </div>
      </form>
    </div>

    <!-- Tab Cek Nilai -->
    <div class="tab-pane" data-content="1">
      <div class="row g-4">
        <div class="col-md-4">
          <img src="<?= base_url("images/Projects.jpg") ?>" class="img-fluid rounded" alt="Project">
        </div>
        <div class="col-md-8">
          <div class="mb-3">
            <label class="form-label fw-semibold">Rekap Nilai Anda</label>
            <div class="p-3 bg-light border rounded mb-3">
              <p>Berikut adalah rekap nilai Anda berdasarkan input sebelumnya. Gunakan informasi ini untuk menilai kesiapan Anda dalam berkarier.</p>

              <?php if (!empty($daftarNilai)): ?>
                <ul class="list-group mb-2">
                  <?php foreach ($semuaMatkul as $matkul): ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      <?= htmlspecialchars($matkul) ?>
                      <?php if (isset($daftarNilai[$matkul])): ?>
                        <span class="badge bg-primary rounded-pill"><?= htmlspecialchars($daftarNilai[$matkul]) ?></span>
                      <?php else: ?>
                        <span class="text-muted">Belum ada data</span>
                      <?php endif; ?>
                    </li>
                  <?php endforeach; ?>
                </ul>
              <?php else: ?>
                <div class="alert alert-warning mt-3 mb-0">
                  Belum ada data nilai yang diinput.
                </div>
              <?php endif; ?>
            </div>

            <div class="d-flex gap-2">
              <button class="btn btn-outline-secondary" onclick="history.back()">Kembali</button>
              <form action="<?= base_url('preferensi/proses') ?>" method="post">
                <?= csrf_field() ?>
                <button type="submit" class="btn btn-primary">Lanjut</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

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