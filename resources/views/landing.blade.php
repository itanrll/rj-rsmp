<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PASTI - Landing Page</title>

  <!-- AdminLTE CSS via CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css">

  <style>
    .hero {
      background: linear-gradient(to right, #1e90ff, #6a11cb);
      color: white;
      padding: 100px 20px;
      text-align: center;
    }
    .section {
      padding: 50px 20px;
    }
  </style>
</head>
<body class="hold-transition layout-top-nav">

<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="#" class="navbar-brand">
        <span class="brand-text font-weight-bold">RJ-RSMP</span>
      </a>
    </div>
  </nav>

  <!-- Hero Section -->
  <div class="hero">
    <div class="container">
      <h1 class="display-4 font-weight-bold">Selamat Datang di Aplikasi RJ-RSMP</h1>
      <p class="lead">Pendaftaran Rawat Jalan Rumah Sakit Medika Pratama</p>
      <a href="{{ route('login.index') }}" class="btn btn-light btn-lg mt-3">Login</a>
    </div>
  </div>

  <!-- Fitur -->
  <div class="section bg-white text-center">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <i class="fas fa-user-md fa-3x text-primary mb-3"></i>
          <h5 class="font-weight-bold">Tenaga Medis Profesional</h5>
          <p>Kami memiliki tim dokter dan tenaga kesehatan terbaik.</p>
        </div>
        <div class="col-md-4">
          <i class="fas fa-hospital fa-3x text-success mb-3"></i>
          <h5 class="font-weight-bold">Fasilitas Modern</h5>
          <p>Fasilitas rawat jalan yang lengkap dan nyaman.</p>
        </div>
        <div class="col-md-4">
          <i class="fas fa-clock fa-3x text-warning mb-3"></i>
          <h5 class="font-weight-bold">Pendaftaran Cepat</h5>
          <p>Daftar online dan hemat waktu.</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="main-footer text-center">
    <strong>&copy; 2025 RJ-RSMP.</strong> All rights reserved.
  </footer>

</div>

<!-- AdminLTE JS via CDN -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>
</html>
