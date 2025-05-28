<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login — RJ-RSMP</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- AdminLTE CSS via CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Roboto', sans-serif;
      background-color: #f4f6f9;
    }
    .login-container {
      display: flex;
      height: 100vh;
    }
    .left-panel {
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 40px;
      background: #fff;
    }
    .right-panel {
      flex: 1;
      background: url('{{ asset('img/unsplash/Foto-by-Kompas-Money.jpg') }}') no-repeat center center;
      background-size: cover;
      position: relative;
      color: white;
      display: flex;
      flex-direction: column;
      justify-content: flex-end;
      padding: 40px;
    }
    .right-panel::before {
      content: "";
      position: absolute;
      top: 0; left: 0; right: 0; bottom: 0;
      background: rgba(0, 0, 0, 0.3);
    }
    .right-panel .overlay-content {
      position: relative;
      z-index: 2;
    }
    .login-logo {
      font-size: 50px;
      font-weight: bold;
      margin-bottom: 20px;
      color: #6c63ff;
    }
    .btn-warning {
      background-color: #6c63ff;
      border: none;
    }
    .btn-warning:hover {
      background-color: #6c63ff;
    }
    .footer-links {
      margin-top: 30px;
      font-size: 13px;
    }
  </style>
</head>
<body>

<div class="login-container">
  <!-- Left: Login form -->
  <div class="left-panel">
    <div class="login-logo">
      <i class="fas fa-circle-notch"></i>
    </div>
    <h3><strong>Welcome to <span style="color:#333;">RJ-RSMP</span></strong></h3>
    <p class="mb-4">Login with your username and password</p>
    @if(session('error'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
    <form method="POST" action="{{ route('actionlogin') }}">
      @csrf
      <div class="form-group">
        <label>Username</label>
        <input type="text" class="form-control" placeholder="Masukkan Username" name="username">
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" placeholder="Masukkan Password" name="password">
      </div>
      <button type="submit" class="btn btn-warning btn-block">Login</button>
    <div class="text-center mt-3">
        <a href="">Belum punya akun? Daftar di sini</a>
    </div>
    </form>
    <div class="footer-links text-center mt-4">
      <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a><br>
      <small>Copyright © RJ-RSMP.</small>
    </div>
  </div>

  <!-- Right: Background and greeting -->
  <div class="right-panel">
    <div class="overlay-content">
      <h5>Jember, Indonesia</h5>
      <p><small>Photo by RJ-RSMPTeam on Unsplash</small></p>
    </div>
  </div>
</div>

<!-- AdminLTE JS via CDN -->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/plugins/jquery/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>
</html>
