<?= $this->extend('Dashboard/layout/dashboard') ?>

<?= $this->section('content') ?>

<div class="container-fluid px-4">
  <!-- Header -->
  <h4 class="fw-semibold">Welcome back, <span class="fw-bold text-primary">Arya<?= session()->get('username') ?></span></h4>
  <p class="text-muted mb-4">Raih karir terbaikmu sesuai potensi dan minat kamu 🚀</p>

  <!-- Hero Section -->
  <div class="row g-4">
    <div class="col-12">
      <div class="rounded-4 p-4 border-1 shadow-sm" style="background: linear-gradient(135deg, #e0f2ff, #f5faff); box-shadow: 0 4px 12px rgba(0,0,0,0.05);">
        <div class="d-flex flex-column flex-md-row align-items-center justify-content-between gap-3">
          <div>
            <h1 class="h5 fw-bold mb-2">Nggak Perlu Bingung, Yuk Temukan Jalan Karirmu!</h1>
            <p class="small text-muted mb-3">Dari minat kamu, kita bantu rekomendasikan skill dan profesi yang pas ✨</p>

            <a href="<?= base_url('/admin/criteria') ?>" class="btn btn-primary btn-sm">Lihat Rekomendasi</a>
          </div>
          <img src="<?= base_url('images/.jpg') ?>" alt="Hero Illustration" class="img-fluid" style="max-height: 150px;">
        </div>
      </div>
    </div>
  </div>

    <div class="row-lg-4 pt-4">
      <h5 class="fw-semibold mb-3">Fitur Unggulan</h5>
      <div class="row g-4 align-items-stretch">
        <?php foreach ($features as $feature): ?>
          <div class="col-md-6 col-lg-4">
            <div class="card h-100 border-1 shadow-sm hover-scale">
              <div class="card-body">
                <i class="<?= $feature['icon'] ?> fa-2x <?= $feature['color'] ?> mb-3"></i>
                <h6 class="card-title fw-bold"><?= esc($feature['title']) ?></h6>
                <p class="card-text small text-muted"><?= esc($feature['text']) ?></p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
</div>

<style>
  .hover-scale {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .hover-scale:hover {
    transform: scale(1.05);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
  }
</style>

<?= $this->endSection() ?>