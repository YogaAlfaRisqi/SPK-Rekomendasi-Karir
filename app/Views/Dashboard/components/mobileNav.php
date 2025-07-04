<?php
$uri = service('uri');
$segment1 = $uri->getSegment(1);
?>

<!-- Bottom Navbar (Mobile Only) -->
<nav class="d-md-none fixed-bottom bg-white border-top shadow-sm">
  <div class="d-flex justify-content-around align-items-center py-2 px-2" style="font-size: 0.85rem;">

    <!-- Dashboard -->
    <a href="<?= base_url('/') ?>"
      class="text-center text-decoration-none <?= $segment1 == '' ? 'text-primary fw-bold' : 'text-muted' ?>">
      <i class="fa-solid fa-house fa-lg mb-1 <?= $segment1 == '' ? 'text-primary' : '' ?>"></i>
      <div>Beranda</div>
    </a>

    <!-- Preferensi -->
    <a href="<?= base_url('preferensi') ?>"
      class="text-center text-decoration-none <?= $segment1 == 'preferensi' ? 'text-primary fw-bold' : 'text-muted' ?>">
      <i class="fa-solid fa-sliders fa-lg mb-1 <?= $segment1 == 'preferensi' ? 'text-primary' : '' ?>"></i>
      <div>Preferensi</div>
    </a>

    <!-- Rekomendasi -->
    <a href="<?= base_url('rekomendasi') ?>"
      class="text-center text-decoration-none <?= $segment1 == 'rekomendasi' ? 'text-primary fw-bold' : 'text-muted' ?>">
      <i class="fa-solid fa-lightbulb fa-lg mb-1 <?= $segment1 == 'rekomendasi' ? 'text-primary' : '' ?>"></i>
      <div>Rekomendasi</div>
    </a>

    <!-- Riwayat -->
    <a href="<?= base_url('riwayat') ?>"
      class="text-center text-decoration-none <?= $segment1 == 'riwayat' ? 'text-primary fw-bold' : 'text-muted' ?>">
      <i class="fa-solid fa-clock-rotate-left fa-lg mb-1 <?= $segment1 == 'riwayat' ? 'text-primary' : '' ?>"></i>
      <div>Riwayat</div>
    </a>

    <!-- Akun -->
    <div class="dropdown text-center">
      <a class="text-decoration-none dropdown-toggle <?= in_array($segment1, ['akun', 'pengaturan']) ? 'text-primary fw-bold' : 'text-muted' ?>"
        href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="<?= base_url('images/userAvatar.jpg') ?>" alt="User" class="rounded-circle mb-1" width="28"
          height="28" />
        <div>Akun</div>
      </a>
      <ul class="dropdown-menu dropdown-menu-end shadow-sm">
        <li class="dropdown-header fw-semibold text-primary">
          <?= esc(session()->get('name')) ?>
        </li>
        <li><a class="dropdown-item" href="<?= base_url('akun/pengaturan') ?>">Pengaturan</a></li>
        <li><a class="dropdown-item" href="<?= base_url('akun/riwayat') ?>">Riwayat</a></li>
        <li>
          <hr class="dropdown-divider" />
        </li>
        <li><a class="dropdown-item text-danger" href="<?= base_url('logout') ?>">Keluar</a></li>
      </ul>
    </div>

  </div>
</nav>


<!-- Inline Script for hamburger hover effect -->
<script>
  document.querySelectorAll('.navbar-toggler').forEach(button => {
    button.addEventListener('mouseover', () => {
      button.querySelector('.line1').style.transform = 'rotate(45deg) translate(3px, 3px)';
      button.querySelector('.line2').style.opacity = '0';
      button.querySelector('.line3').style.transform = 'rotate(-45deg) translate(3px, -3px)';
    });
    button.addEventListener('mouseout', () => {
      button.querySelector('.line1').style.transform = 'none';
      button.querySelector('.line2').style.opacity = '1';
      button.querySelector('.line3').style.transform = 'none';
    });
  });
</script>