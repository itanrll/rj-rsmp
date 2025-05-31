<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Form Edit Pendaftaran</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f2f2f2;
      padding: 30px;
    }

    .form-container {
      background-color: #fff;
      padding: 30px;
      border-radius: 10px;
      max-width: 960px;
      margin: auto;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }

    h2 {
      text-align: center;
      margin-bottom: 30px;
      color: #333;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h2>Form Edit Pendaftaran</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

<form action="{{ route('pendaftaran.update', $pendaftaran->id) }}" method="POST" id="form-daftar">
    @csrf
        @method('PUT')

    <div class="row g-3">
      <div class="col-md-6">
        <label for="nik" class="form-label">NIK</label>
        <input type="text" class="form-control" id="nik" name="nik" value="{{ old('nik', $pendaftaran->pasien->nik) }}" required>
      </div>

      <div class="col-md-6">
        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap', $pendaftaran->pasien->nama_lengkap) }}" required>
      </div>

      <div class="col-md-6">
        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir', $pendaftaran->pasien->tempat_lahir) }}" required>
      </div>
      <div class="col-md-6">
        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $pendaftaran->pasien->tanggal_lahir) }}" required>
      </div>
      <div class="col-md-6">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ old('alamat', $pendaftaran->pasien->alamat) }}</textarea>
      </div>

      
      <div class="col-md-6">
        <label for="no_hp" class="form-label">No. HP</label>
        <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ old('no_hp', $pendaftaran->pasien->no_hp) }}" required>
      </div>

      <div class="col-md-6">
        <label for="dokter_id" class="form-label">Dokter</label>
        <select class="form-select" id="dokter_id" name="dokter_id" required>
          <option value="">-- Pilih Dokter --</option>
          @foreach ($dokters as $dokter)
            <option value="{{ $dokter->id }}" 
              {{ old('dokter_id', $pendaftaran->dokter_id) == $dokter->id ? 'selected' : '' }}>
              {{ $dokter->nama_dokter }}
            </option>
          @endforeach
        </select>
      </div>

      <div class="col-md-6">
        <label for="waktu_berkunjung" class="form-label">Waktu Berkunjung</label>
        <input type="datetime-local" class="form-control" id="waktu_berkunjung" name="waktu_berkunjung" value="{{ old('waktu_berkunjung', \Carbon\Carbon::parse($pendaftaran->waktu_kunjungan)->format('Y-m-d\TH:i')) }}" required>
      </div>

    </div>
  </form>
  <div class="row mt-4">

    <div class="col-md-6">
        <a href="{{ route('admin.index') }}" class="btn btn-secondary w-100">Kembali</a>
      </div>
    <div class="col-md-6">
      <button type="submit" form="form-daftar" class="btn btn-primary w-100">Perbarui</button>
    </div>
  </div>
  </div>
</body>
</html>