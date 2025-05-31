<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Nomor Pendaftaran</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f2f2f2;
      padding: 30px;
    }
    .card-container {
      max-width: 500px;
      margin: auto;
      margin-top: 100px;
    }
    h2 {
      color: #333;
    }
  </style>
</head>
<body>

  <div class="card-container">
    <div class="card shadow">
      <div class="card-body text-center">
        <h2 class="card-title mb-4">Nomor Pendaftaran</h2>
        <h3 class="text-primary">{{ $no_pendaftaran }}</h3>

        <form action="{{ route('logout') }}" method="POST" class="mt-4">
          @csrf
          <button type="submit" class="btn btn-danger w-100">Logout</button>
        </form>
      </div>
    </div>
  </div>

</body>
</html>
