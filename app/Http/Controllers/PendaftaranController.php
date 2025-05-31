<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Pendaftaran;

class PendaftaranController extends Controller
{
    public function index() {
        $user = auth()->user();
        $pasien = $user->pasien;
        $dokters = Dokter::all();

        return view('pasien.pendaftaran', compact('pasien', 'dokters'));
    }

    public function store(Request $request) {
        $user = auth()->user();

        // Simpan ke pasien jika belum ada
        if (!$user->pasien) {
            $pasien = Pasien::create([
                'user_id' => $user->id,
                'nik' => $request->nik,
                'nama_lengkap' => $request->nama_lengkap,
                'alamat' => $request->alamat,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'no_hp' => $request->no_hp,
            ]);
        } else {
            $pasien = $user->pasien;
        }

        // Simpan ke pendaftaran

        // Pendaftaran::create([
        //     'pasien_id' => $pasien->id,
        //     'dokter_id' => $request->dokter_id,
        //     'waktu_kunjungan' => $request->waktu_kunjungan
        // ]);

        $pendaftaran = Pendaftaran::create([
            'pasien_id' => $pasien->id,
            'dokter_id' => $request->dokter_id,
            'waktu_kunjungan' => $request->waktu_berkunjung
        ]);

        return redirect()->route('sukses')->with('no_pendaftaran', $pendaftaran->id);
    }

    public function sukses()
    {
        $no_pendaftaran = session('no_pendaftaran');
        if (!$no_pendaftaran) {
            return redirect()->route('pendaftaran.index')->with('error', 'Tidak ada data pendaftaran.');
        }

        return view('pasien.sukses', compact('no_pendaftaran'));
    }

    public function edit($id)
    {
        $pendaftaran = Pendaftaran::with('pasien')->findOrFail($id);
        $dokters = Dokter::all();
        return view('pasien.edit_pendaftaran', compact('pendaftaran', 'dokters'));
    }

    public function update(Request $request, $id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);

        $request->validate([
            'dokter_id' => 'required|exists:tb_dokter,id',
            'waktu_berkunjung' => 'required|date',
        ]);

        $pendaftaran->update([
            'dokter_id' => $request->dokter_id,
            'waktu_kunjungan' => $request->waktu_berkunjung,
        ]);

        return redirect()->route('admin.index')->with('success', 'Data Pendaftaran berhasil diubah.');
    }

    public function destroy($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        $pendaftaran->delete();

        return redirect()->route('admin.index')->with('success', 'Data Pendaftaran berhasil dihapus.');
    }

}
