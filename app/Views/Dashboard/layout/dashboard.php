<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Rekomendasi Karir</title>
  <link href="<?= base_url('assets/sb-admin/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/sb-admin/css/sb-admin-2.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('SB-Admin/css/styles.css') ?>" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
   <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
<!-- Animate.css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

</head>

<body class="flex bg-gray-100 min-h-screen">

  <!-- Navbar-->
  <?= $this->include('Dashboard/components/admin_navbar') ?>
  
  <div id="layoutSidenav" style="display:flex; min-height:100vh;">
    
    <div id="layoutSidenav_nav" style="width: 250px;">
      <?= $this->include('Dashboard/components/admin_sidebar') ?>
    </div>
    
    <div id="layoutSidenav_content" style="flex:1; padding: 20px;">
      <?= $this->include('Dashboard/components/admin_header') ?>
      <main class="p-6 overflow-auto">
        <?= $this->renderSection('content') ?>
      </main>
      <?= $this->include('Dashboard/components/footer.php') ?>
    </div>

  </div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="js/scripts.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <script src="assets/demo/chart-area-demo.js"></script>
  <script src="assets/demo/chart-bar-demo.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
  <script src="js/datatables-simple-demo.js"></script>

</body>

</html>