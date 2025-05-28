@extends('admin.dashboard')

@section('content')
<h2>Tambah Data Dokter</h2>
<form action="{{ route('dokter.store') }}" method="POST">
    @csrf
    <input type="text" name="nama" placeholder="Nama Dokter" required>
    <input type="text" name="spesialis" placeholder="Spesialis" required>
    <input type="text" name="telepon" placeholder="Telepon" required>
    <button type="submit">Tambah</button>
</form>

<h2>Daftar Dokter</h2>
<table border="1">
    <tr>
        <th>Nama</th>
        <th>Spesialis</th>
        <th>Telepon</th>
    </tr>
    @foreach($dokters as $dokter)
    <tr>
        <td>{{ $dokter->nama }}</td>
        <td>{{ $dokter->spesialis }}</td>
        <td>{{ $dokter->telepon }}</td>
    </tr>
    @endforeach
</table>
@endsection
