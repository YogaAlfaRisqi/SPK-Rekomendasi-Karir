<div id="layoutSidenav">
  <div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
      <div class="sb-sidenav-menu">
        <div class="nav py-3">
          <!-- Menu untuk User -->
          <!-- <div class="sb-sidenav-menu-heading">Core</div> -->
          <a class="nav-link <?= ($activePage == 'dashboard' ? 'active' : '') ?>" href="<?= base_url('/') ?>">
            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
            Dashboard
          </a>
          <a class="nav-link <?= ($activePage == 'preferensi' ? 'active' : '') ?>" href="<?= base_url('preferensi') ?>">
            <div class="sb-nav-link-icon"><i class="fas fa-sliders-h"></i></div>
            Preferensi
          </a>
          <a class="nav-link <?= ($activePage == 'rekomendasi' ? 'active' : '') ?>" href="<?= base_url('rekomendasi') ?>">
            <div class="sb-nav-link-icon"><i class="fas fa-sliders-h"></i></div>
            Rekomendasi Saya
          </a>
          <a class="nav-link <?= ($activePage == '' ? 'active' : '') ?>" href="<?= base_url('') ?>">
            <div class="sb-nav-link-icon"><i class="fas fa-sliders-h"></i></div>
            Riwayat
          </a>

          <!-- Menu Untuk Admin -->
          <div class="sb-sidenav-menu-heading">Admin Menu</div>
          <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
            Menu
            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
          </a>
          <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
            <nav class="sb-sidenav-menu-nested nav">
              <a class="nav-link <?= ($activePage == 'criteria' ? 'active' : '') ?>" href="<?= base_url('criteria') ?>">
                <div class="sb-nav-link-icon"><i class="fas fa-list-check"></i></div>
                Manage Kriteria
              </a>
              <a class="nav-link <?= ($activePage == '' ? 'active' : '') ?>" href="<?= base_url('') ?>">
                <div class="sb-nav-link-icon"><i class="fas fa-list-check"></i></div>
                Manage Alternative
              </a>
              <a class="nav-link <?= ($activePage == '' ? 'active' : '') ?>" href="<?= base_url('') ?>">
                <div class="sb-nav-link-icon"><i class="fas fa-list-check"></i></div>
                AHP Weights Input
              </a>
              <a class="nav-link <?= ($activePage == '' ? 'active' : '') ?>" href="<?= base_url('') ?>">
                <div class="sb-nav-link-icon"><i class="fas fa-list-check"></i></div>
                User Management
              </a>
            </nav>
          </div>
        </div>
    </nav>
  </div>
</div>