<div id="layoutSidenav">
  <div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
      <div class="sb-sidenav-menu">
        <div class="nav py-3">

          <!-- Menu Umum: Untuk Semua Role -->
          <a class="nav-link <?= ($activePage == 'dashboard' ? 'active' : '') ?>" href="<?= base_url('/') ?>">
            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
            Dashboard
          </a>

          <?php if (session()->get('role') === 'user'): ?>
            <!-- Menu Khusus untuk User -->
            <a class="nav-link <?= ($activePage == 'preferensi' ? 'active' : '') ?>" href="<?= base_url('preferensi') ?>">
              <div class="sb-nav-link-icon"><i class="fas fa-sliders-h"></i></div>
              Preferensi
            </a>

            <a class="nav-link <?= ($activePage == 'rekomendasi' ? 'active' : '') ?>" href="<?= base_url('rekomendasi') ?>">
              <div class="sb-nav-link-icon"><i class="fas fa-thumbs-up"></i></div>
              Rekomendasi Saya
            </a>

            <a class="nav-link <?= ($activePage == 'riwayat' ? 'active' : '') ?>" href="<?= base_url('riwayat') ?>">
              <div class="sb-nav-link-icon"><i class="fas fa-history"></i></div>
              Riwayat
            </a>
          <?php endif; ?>

          <?php if (session()->get('role') === 'admin'): ?>
            <!-- Menu Khusus Admin -->
            <div class="sb-sidenav-menu-heading">Admin Menu</div>

            <a class="nav-link <?= ($activePage == 'criteria' ? 'active' : '') ?>" href="<?= base_url('criteria') ?>">
              <div class="sb-nav-link-icon"><i class="fas fa-sliders-h"></i></div>
              Manage Kriteria
            </a>

            <a class="nav-link <?= ($activePage == 'karir' ? 'active' : '') ?>" href="<?= base_url('karir') ?>">
              <div class="sb-nav-link-icon"><i class="fas fa-sliders-h"></i></div>
              Manage Alternatif
            </a>

            <a class="nav-link <?= ($activePage == 'pembobotan' ? 'active' : '') ?>" href="<?= base_url('pembobotan') ?>">
              <div class="sb-nav-link-icon"><i class="fas fa-sliders-h"></i></div>
              Manage Pembobotan
            </a>

            <a class="nav-link <?= ($activePage == 'perhitungan' ? 'active' : '') ?>" href="<?= base_url('perhitungan') ?>">
              <div class="sb-nav-link-icon"><i class="fas fa-calculator"></i></div>
              Perhitungan
            </a>

            <a class="nav-link <?= ($activePage == 'user' ? 'active' : '') ?>" href="<?= base_url('user') ?>">
              <div class="sb-nav-link-icon"><i class="fas fa-users-cog"></i></div>
              User Management
            </a>
          <?php endif; ?>

        </div>
      </div>
    </nav>
  </div>
</div>