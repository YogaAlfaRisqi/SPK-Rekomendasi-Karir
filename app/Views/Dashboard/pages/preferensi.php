<?= $this->extend('Dashboard/layout/dashboard') ?>
<?= $this->section('content') ?>

<div class="container py-4">
  <h4 class="mb-4 fw-bold">Preferensi</h4>

  <ul class="nav nav-tabs mb-4" id="courseTabs">
    <li class="nav-item"><a class="nav-link active" href="#" data-tab="0">IPK</a></li>
    <li class="nav-item"><a class="nav-link" href="#" data-tab="1">Proyek Terkait</a></li>
    <li class="nav-item"><a class="nav-link" href="#" data-tab="2">Pengalaman Kerja</a></li>
    <li class="nav-item"><a class="nav-link" href="#" data-tab="3">Sertifikasi</a></li>
  </ul>

  <div class="tab-content">
    <!-- Tab IPK -->
    <div class="tab-pane active" data-content="0">
      <div class="row g-4">
        <div class="col-md-4">
          <img src="<?=base_url("images/ipk.jpg")?>" class="img-fluid rounded" alt="IPK">
        </div>
        <div class="col-md-8">
          <div class="mb-3">
            <label class="form-label fw-semibold">IPK</label>
            <div class="p-3 bg-light border rounded mb-2">
              Seberapa besar Anda menilai pentingnya <strong>Indeks Prestasi Kumulatif (IPK)</strong> dalam karier Anda?
              Apakah Anda merasa IPK merupakan indikator utama dalam menggambarkan potensi akademik Anda untuk pekerjaan yang Anda minati?
            </div>
            <select class="form-select" name="ipk">
              <option value="1">Sangat Tidak Penting</option>
              <option value="3">Tidak Penting</option>
              <option value="5">Netral</option>
              <option value="7">Penting</option>
              <option value="9">Sangat Penting</option>
            </select>
          </div>
          <div class="d-flex gap-2">
            <button class="btn btn-outline-secondary">Simpan</button>
            <button class="btn btn-primary">Lanjut</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Tab Proyek Terkait -->
    <div class="tab-pane d-none" data-content="1">
      <div class="row g-4">
        <div class="col-md-4">
          <img src="<?=base_url("images/Projects.jpg")?>" class="img-fluid rounded" alt="Project">
        </div>
        <div class="col-md-8">
          <div class="mb-3">
            <label class="form-label fw-semibold">Proyek Terkait</label>
            <div class="p-3 bg-light border rounded mb-2">
              Sejauh mana Anda merasa pengalaman dalam <strong>proyek terkait bidang pekerjaan</strong> memengaruhi kesiapan karier Anda?
              Apakah Anda percaya bahwa portofolio proyek yang relevan lebih mencerminkan kemampuan daripada nilai akademik?
            </div>
            <select class="form-select" name="proyek">
              <option value="1">Sangat Tidak Relevan</option>
              <option value="3">Kurang Relevan</option>
              <option value="5">Netral</option>
              <option value="7">Relevan</option>
              <option value="9">Sangat Relevan</option>
            </select>
          </div>
          <div class="d-flex gap-2">
            <button class="btn btn-outline-secondary">Simpan</button>
            <button class="btn btn-primary">Lanjut</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Tab Pengalaman Kerja -->
    <div class="tab-pane d-none" data-content="2">
      <div class="row g-4">
        <div class="col-md-4">
          <img src="<?=base_url("images/work.jpg")?>" class="img-fluid rounded" alt="Work Experience">
        </div>
        <div class="col-md-8">
          <div class="mb-3">
            <label class="form-label fw-semibold">Pengalaman Kerja</label>
            <div class="p-3 bg-light border rounded mb-2">
              Seberapa besar pengaruh <strong>pengalaman kerja</strong> terhadap kesiapan Anda menghadapi dunia profesional?
              Apakah Anda menilai bahwa pengalaman praktis di industri memberikan keunggulan lebih dibandingkan sekadar teori?
            </div>
            <select class="form-select" name="pengalaman">
              <option value="1">Sangat Tidak Berpengaruh</option>
              <option value="3">Kurang Berpengaruh</option>
              <option value="5">Netral</option>
              <option value="7">Berpengaruh</option>
              <option value="9">Sangat Berpengaruh</option>
            </select>
          </div>
          <div class="d-flex gap-2">
            <button class="btn btn-outline-secondary">Simpan</button>
            <button class="btn btn-primary">Lanjut</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Tab Sertifikasi -->
    <div class="tab-pane d-none" data-content="3">
      <div class="row g-4">
        <div class="col-md-4">
          <img src="<?=base_url("images/Sertifikasi.jpg")?>" class="img-fluid rounded" alt="Certificate">
        </div>
        <div class="col-md-8">
          <div class="mb-3">
            <label class="form-label fw-semibold">Sertifikasi</label>
            <div class="p-3 bg-light border rounded mb-2">
              Seberapa penting Anda menilai <strong>sertifikasi</strong> dalam menunjang kompetensi profesional?
              Apakah sertifikasi menjadi salah satu pertimbangan utama Anda dalam menambah nilai jual di dunia kerja?
            </div>
            <select class="form-select" name="sertifikasi">
              <option value="1">Sangat Tidak Penting</option>
              <option value="3">Tidak Penting</option>
              <option value="5">Netral</option>
              <option value="7">Penting</option>
              <option value="9">Sangat Penting</option>
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
    tab.addEventListener('click', function (e) {
      e.preventDefault();
      activateTab(index);
    });
  });

  nextButtons.forEach(btn => {
    btn.addEventListener('click', function () {
      const activeIndex = Array.from(tabs).findIndex(tab => tab.classList.contains('active'));
      if (activeIndex < tabs.length - 1) {
        activateTab(activeIndex + 1);
      }
    });
  });
</script>

<?= $this->endSection() ?>
