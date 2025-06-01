<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register — RJ-RSMP</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
  </style>
</head>
<body>

<div class="login-container">
  <div class="left-panel">
    <div class="login-logo">
      <i class="fas fa-user-plus"></i>
    </div>
    <h3><strong>Register RJ-RSMP</strong></h3>
    <p class="mb-4">Buat akun baru untuk login</p>
    <form method="POST" action="{{ route('register.action') }}">
      @csrf
      <div class="form-group">
        <label>Username</label>
        <input type="text" class="form-control" placeholder="Masukkan Username" name="username" required>
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" name="password" placeholder="Masukkan Password" required>
      </div>
      <div class="form-group">
        <label>Ulangi Password</label>
        <input type="password" class="form-control" name="password_confirmation" placeholder="Ulangi Password" required>
      </div>
      <div class="form-group">
        <label>Daftar sebagai</label>
        <select class="form-control" name="role" required>
          <option value="" disabled selected>Pilih role</option>
          <option value="petugas">Petugas</option>
          <option value="pasien">Pasien</option>
        </select>
      </div>
      <button type="submit" class="btn btn-warning btn-block">Register</button>
      <div class="text-center mt-3">
        <a href="{{ route('login.index') }}">Sudah punya akun? Login di sini</a>
      </div>
    </form>
  </div>
  <div class="right-panel">
    <div class="overlay-content">
      <h5>Jember, Indonesia</h5>
      <p><small>Photo by RJ-RSMPTeam on Unsplash</small></p>
    </div>
  </div>
</div>
</body>
</html>