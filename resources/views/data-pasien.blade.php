@extends('admin.dashboard')

@section('content')
<h2>Tambah Data Pasien</h2>
<form action="{{ route('pasien.store') }}" method="POST">
    @csrf
    <input type="text" name="nama" placeholder="Nama Pasien" required>
    <input type="text" name="alamat" placeholder="Alamat" required>
    <input type="text" name="telepon" placeholder="Telepon" required>
    <button type="submit">Tambah</button>
</form>

<h2>Daftar Pasien</h2>
<table border="1">
    <tr>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Telepon</th>
    </tr>
    @foreach($pasiens as $pasien)
    <tr>
        <td>{{ $pasien->nama }}</td>
        <td>{{ $pasien->alamat }}</td>
        <td>{{ $pasien->telepon }}</td>
    </tr>
    @endforeach
</table>
@endsection
