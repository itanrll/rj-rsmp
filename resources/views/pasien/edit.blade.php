<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Data Pasien</title>
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
    <h2>Edit Data Pasien</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  

<form action="{{ route('pasien.update', $pasien->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row g-3">
      <div class="col-md-6">
        <label for="nik" class="form-label">NIK</label>
        <input type="text" class="form-control" id="nik" name="nik" value="{{ old('nik', $pasien->nik) }}" required>
      </div>

      <div class="col-md-6">
        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap', $pasien->nama_lengkap) }}" required>
      </div>

      <div class="col-md-6">
        <label for="nama_ibu_kandung" class="form-label">Nama Ibu Kandung</label>
        <input type="text" class="form-control" id="nama_ibu_kandung" name="nama_ibu_kandung" value="{{ old('nama_ibu_kandung', $pasien->nama_ibu_kandung) }}" required>
      </div>

      <div class="col-md-6">
        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir', $pasien->tempat_lahir) }}" required>
      </div>

      <div class="col-md-6">
        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $pasien->tanggal_lahir) }}" required>
      </div>

      <div class="col-md-6">
        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
        <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
          <option value="">-- Pilih --</option>
          <option value="tidak_diketahui" {{ old('jenis_kelamin', $pasien->jenis_kelamin) == 'tidak_diketahui' ? 'selected' : '' }}>Tidak Diketahui</option>
          <option value="laki-laki" {{ old('jenis_kelamin', $pasien->jenis_kelamin) == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
          <option value="perempuan" {{ old('jenis_kelamin', $pasien->jenis_kelamin) == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
          <option value="tidak_dapat_ditentukan" {{ old('jenis_kelamin', $pasien->jenis_kelamin) == 'tidak_dapat_ditentukan' ? 'selected' : '' }}>Tidak Dapat Ditentukan</option>
          <option value="tidak_mengisi" {{ old('jenis_kelamin', $pasien->jenis_kelamin) == 'tidak_mengisi' ? 'selected' : '' }}>Tidak Mengisi</option>
        </select>
      </div>

      <div class="col-md-6">
        <label for="agama" class="form-label">Agama</label>
        <select class="form-select" id="agama" name="agama" required>
          <option value="">-- Pilih --</option>
          <option value="islam" {{ old('agama', $pasien->agama) == 'islam' ? 'selected' : '' }}>Islam</option>
          <option value="kristen_protestan" {{ old('agama', $pasien->agama) == 'kristen_protestan' ? 'selected' : '' }}>Kristen Protestan</option>
          <option value="katolik" {{ old('agama', $pasien->agama) == 'katolik' ? 'selected' : '' }}>Katolik</option>
          <option value="hindu" {{ old('agama', $pasien->agama) == 'hindu' ? 'selected' : '' }}>Hindu</option>
          <option value="budha" {{ old('agama', $pasien->agama) == 'budha' ? 'selected' : '' }}>Budha</option>
          <option value="konghucu" {{ old('agama', $pasien->agama) == 'konghucu' ? 'selected' : '' }}>Konghucu</option>
          <option value="penghayat" {{ old('agama', $pasien->agama) == 'penghayat' ? 'selected' : '' }}>Penghayat</option>
          <option value="lain_lain" {{ old('agama', $pasien->agama) == 'lain_lain' ? 'selected' : '' }}>Lain-lain</option>
        </select>
      </div>

      <div class="col-md-6">
        <label for="jaminan_kesehatan" class="form-label">Jaminan Kesehatan</label>
        <input type="text" class="form-control" id="jaminan_kesehatan" name="jaminan_kesehatan" value="{{ old('jaminan_kesehatan', $pasien->jaminan_kesehatan) }}">
      </div>

      <div class="col-md-6">
        <label for="pendidikan" class="form-label">Pendidikan</label>
        <select class="form-select" id="pendidikan" name="pendidikan" required>
          <option value="">-- Pilih --</option>
          <option value="tidak_sekolah" {{ old('pendidikan', $pasien->pendidikan) == 'tidak_sekolah' ? 'selected' : '' }}>Tidak Sekolah</option>
          <option value="sd" {{ old('pendidikan', $pasien->pendidikan) == 'sd' ? 'selected' : '' }}>SD</option>
          <option value="sltp_sederajat" {{ old('pendidikan', $pasien->pendidikan) == 'sltp_sederajat' ? 'selected' : '' }}>SLTP/Sederajat</option>
          <option value="slta_sederajat" {{ old('pendidikan', $pasien->pendidikan) == 'slta_sederajat' ? 'selected' : '' }}>SLTA/Sederajat</option>
          <option value="d1-d3_sederajat" {{ old('pendidikan', $pasien->pendidikan) == 'd1-d3_sederajat' ? 'selected' : '' }}>D1-D3/Sederajat</option>
          <option value="d4" {{ old('pendidikan', $pasien->pendidikan) == 'd4' ? 'selected' : '' }}>D4</option>
          <option value="s1" {{ old('pendidikan', $pasien->pendidikan) == 's1' ? 'selected' : '' }}>S1</option>
          <option value="s2" {{ old('pendidikan', $pasien->pendidikan) == 's2' ? 'selected' : '' }}>S2</option>
          <option value="s3" {{ old('pendidikan', $pasien->pendidikan) == 's3' ? 'selected' : '' }}>S3</option>
        </select>
      </div>

      <div class="col-md-6">
        <label for="pekerjaan" class="form-label">Pekerjaan</label>
        <select class="form-select" id="pekerjaan" name="pekerjaan">
          <option value="">-- Pilih --</option>
          <option value="tidak_bekerja" {{ old('pekerjaan', $pasien->pekerjaan) == 'tidak_bekerja' ? 'selected' : '' }}>Tidak Bekerja</option>
          <option value="pns" {{ old('pekerjaan', $pasien->pekerjaan) == 'pns' ? 'selected' : '' }}>PNS</option>
          <option value="tni/polri" {{ old('pekerjaan', $pasien->pekerjaan) == 'tni/polri' ? 'selected' : '' }}>TNI/Polri</option>
          <option value="bumn" {{ old('pekerjaan', $pasien->pekerjaan) == 'bumn' ? 'selected' : '' }}>BUMN</option>
          <option value="pegawai_swasta/wirausaha" {{ old('pekerjaan', $pasien->pekerjaan) == 'pegawai_swasta/wirausaha' ? 'selected' : '' }}>Pegawai Swasta/Wirausaha</option>
          <option value="lain-lain" {{ old('pekerjaan', $pasien->pekerjaan) == 'lain-lain' ? 'selected' : '' }}>Lain-lain</option>
        </select>
      </div>

      
      <div class="col-md-6">
        <label for="status_pernikahan" class="form-label">Status Pernikahan</label>
        <select class="form-select" id="status_pernikahan" name="status_pernikahan" required>
            <option value="">-- Pilih --</option>
          <option value="belum_kawin" {{ old('status_pernikahan', $pasien->status_pernikahan) == 'belum_kawin' ? 'selected' : '' }}>Belum Kawin</option>
          <option value="kawin" {{ old('status_pernikahan', $pasien->status_pernikahan) == 'kawin' ? 'selected' : '' }}>Kawin</option>
          <option value="cerai_hidup" {{ old('status_pernikahan', $pasien->status_pernikahan) == 'cerai_hidup' ? 'selected' : '' }}>Cerai Hidup</option>
          <option value="cerai_mati" {{ old('status_pernikahan', $pasien->status_pernikahan) == 'cerai_mati' ? 'selected' : '' }}>Cerai Mati</option>
        </select>
    </div>
    
    <div class="col-md-6">
      <label for="pekerjaan_lain" class="form-label">Pekerjaan Lain</label>
      <input type="text" class="form-control" id="pekerjaan_lain" name="pekerjaan_lain" value="{{ old('pekerjaan_lain', $pasien->pekerjaan_lain) }}">
    </div>
      <div class="col-md-12">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ old('alamat', $pasien->alamat) }}</textarea>
      </div>

      <div class="col-md-6">
        <a href="{{ route('pasien.index') }}" class="btn btn-secondary w-100">Kembali</a>
      </div>

      <div class="col-md-6">
        <button type="submit" class="btn btn-primary w-100">Perbarui Data</button>
      </div>
    </div>
  </form>
  </div>
</body>
</html>