<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Data Dokter</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      padding: 30px;
    }

    .form-container {
      background-color: #fff;
      padding: 25px 30px;
      border-radius: 10px;
      max-width: 500px;
      margin: 50px auto;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }

    h2 {
      text-align: center;
      margin-bottom: 25px;
      color: #333;
    }

    label {
      display: block;
      margin-top: 15px;
      font-weight: bold;
    }

    input[type="text"],
    textarea {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 6px;
      box-sizing: border-box;
    }

    button {
      margin-top: 20px;
      background-color: #007BFF;
      color: white;
      border: none;
      padding: 12px;
      border-radius: 6px;
      cursor: pointer;
      width: 100%;
      font-size: 16px;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h2>Tambah Data Dokter</h2>

    @if ($errors->any())
      <div style="color:red;">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('dokter.store') }}" method="POST">
      @csrf

      <label for="nama_dokter">Nama Dokter:</label>
      <input type="text" id="nama_dokter" name="nama_dokter" required>

      <label for="spesialisasi">Spesialisasi:</label>
      <input type="text" id="spesialisasi" name="spesialisasi" required>

      <label for="alamat_dokter">Alamat:</label>
      <textarea id="alamat_dokter" name="alamat_dokter" rows="3" required></textarea>

      <label for="SIP">SIP:</label>
      <input type="text" id="SIP" name="SIP" required>

      <button type="submit">Simpan</button>
    </form>
  </div>
</body>
</html>