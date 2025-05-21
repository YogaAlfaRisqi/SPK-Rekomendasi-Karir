<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
  <div class="container-fluid px-4">
    <!-- Brand -->
    <a class="navbar-brand d-flex align-items-center fw-semibold text-primary fs-5" href="index.html" style="gap: 0.5rem;">
      <i class="fa-solid fa-briefcase fa-lg"></i>
      <div class="d-flex flex-column lh-sm">
        <span class="fw-bold">Rekomendasi Karir</span>
        <small class="text-muted" style="font-size: 0.75rem;">Temukan jalur suksesmu</small>
      </div>
    </a>


    <!-- Sidebar Toggle Button -->
    <button
      class="navbar-toggler d-flex flex-column justify-content-between align-items-center p-1 border-0 bg-transparent d-md-none"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#navbarResponsive"
      aria-controls="navbarResponsive"
      aria-expanded="false"
      aria-label="Toggle navigation"
      onmouseover="this.classList.add('hovered')"
      onmouseout="this.classList.remove('hovered')"
      style="width: 24px; height: 20px;">
      <span class="line1" style="width: 100%; height: 2px; background: #333; transition: all 0.3s;"></span>
      <span class="line2" style="width: 100%; height: 2px; background: #333; transition: all 0.3s;"></span>
      <span class="line3" style="width: 100%; height: 2px; background: #333; transition: all 0.3s;"></span>
    </button>

    <!-- Navbar Content -->
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <!-- Search Form -->
      <form class="d-flex me-auto my-2 my-lg-0 ms-3" role="search">
        <div class="input-group">
          <input
            type="search"
            class="form-control"
            placeholder="Cari karir..."
            aria-label="Cari karir"
            aria-describedby="button-search" />
          <button class="btn btn-outline-primary" type="submit" id="button-search">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </form>



      <!-- User Dropdown -->
      <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="<?=base_url("images/userAvatar.jpg")?>" alt="User Avatar" class="rounded-circle me-2" width="32" height="32">
            <span class="d-none d-lg-inline text-dark fw-medium">Akun</span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end shadow-sm rounded-3" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#!">Pengaturan</a></li>
            <li><a class="dropdown-item" href="#!">Riwayat Aktivitas</a></li>
            <li>
              <hr class="dropdown-divider" />
            </li>
            <li><a class="dropdown-item text-danger" href="#!">Keluar</a></li>
          </ul>
        </li>
      </ul>

    </div>
  </div>
</nav>
<!-- Inline Script for hover effect -->
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