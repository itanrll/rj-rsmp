<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PasienService;
use App\Models\Pasien;
use Illuminate\Validation\Rule;

class PasienController extends Controller
{
    protected $pasienService;
    public function __construct(PasienService $pasienService)
    {
        $this->pasienService = $pasienService;
    }
    public function index(Request $request)
    {

        $search = $request->input('search');
        $pasien = Pasien::when($search, function ($query, $search) {
            $query->where(function ($q) use ($search) {
            $q->where('nomor_rekam_medis', 'like', "%{$search}%")
              ->orWhere('nik', 'like', "%{$search}%")
              ->orWhere('nama_lengkap', 'like', "%{$search}%")
              ->orWhere('nama_ibu_kandung', 'like', "%{$search}%")
              ->orWhere('tempat_lahir', 'like', "%{$search}%")
              ->orWhere('tanggal_lahir', 'like', "%{$search}%")
              ->orWhere('jenis_kelamin', 'like', "%{$search}%")
              ->orWhere('agama', 'like', "%{$search}%")
              ->orWhere('alamat', 'like', "%{$search}%")
              ->orWhere('pendidikan', 'like', "%{$search}%")
              ->orWhere('pekerjaan', 'like', "%{$search}%")
              ->orWhere('pekerjaan_lain', 'like', "%{$search}%")
              ->orWhere('status_pernikahan', 'like', "%{$search}%")
              ->orWhere('jaminan_kesehatan', 'like', "%{$search}%");
            });
        })->get();

        return view('pasien.data-pasien', compact('pasien'));
    }

    public function create()
    {
        return view('pasien.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_rekam_medis'   => 'nullable|string|max:50|unique:tb_pasien,nomor_rekam_medis',
            'nik'                 => 'required|digits:16|unique:tb_pasien,nik',
            'nama_lengkap'        => 'required|string|max:100',
            'nama_ibu_kandung'    => 'nullable|string|max:100',
            'tempat_lahir'        => 'nullable|string|max:50',
            'tanggal_lahir'       => 'nullable|date',
            'jenis_kelamin'       => 'nullable|in:tidak_diketahui,laki-laki,perempuan,tidak_dapat_ditentukan,tidak_mengisi',
            'agama'               => 'nullable|in:islam,kristen_protestan,katolik,hindu,budha,konghucu,penghayat,lain_lain',
            'alamat'              => 'nullable|string',
            'pendidikan'          => 'nullable|in:tidak_sekolah,sd,sltp_sederajat,slta_sederajat,d1-d3_sederajat,d4,s1,s2,s3',
            'pekerjaan'           => 'nullable|in:tidak_bekerja,pns,tni/polri,bumn,pegawai_swasta/wirausaha,lain-lain',
            'pekerjaan_lain'      => 'nullable|string|max:100',
            'status_pernikahan'   => 'nullable|in:belum_kawin,kawin,cerai_hidup,cerai_mati',
            'jaminan_kesehatan'   => 'nullable|string|max:100',
        ]);
    

    $this->pasienService->create($request);

    return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('pasien.edit', compact('pasien'));
    }

    public function update(Request $request, $id)
    {
        $pasien = Pasien::findOrFail($id);

        $request->validate([
           'nomor_rekam_medis' => [
            'nullable',
            'string',
            'max:50',
            Rule::unique('tb_pasien', 'nomor_rekam_medis')->ignore($id),
            ],
            'nik' => [
                'required',
                'digits:16',
                Rule::unique('tb_pasien', 'nik')->ignore($id),
            ],
            'nama_lengkap'        => 'required|string|max:100',
            'nama_ibu_kandung'    => 'nullable|string|max:100',
            'tempat_lahir'        => 'nullable|string|max:50',
            'tanggal_lahir'       => 'nullable|date',
            'jenis_kelamin'       => 'nullable|in:tidak_diketahui,laki-laki,perempuan,tidak_dapat_ditentukan,tidak_mengisi',
            'agama'               => 'nullable|in:islam,kristen_protestan,katolik,hindu,budha,konghucu,penghayat,lain_lain',
            'alamat'              => 'nullable|string',
            'pendidikan'          => 'nullable|in:tidak_sekolah,sd,sltp_sederajat,slta_sederajat,d1-d3_sederajat,d4,s1,s2,s3',
            'pekerjaan'           => 'nullable|in:tidak_bekerja,pns,tni/polri,bumn,pegawai_swasta/wirausaha,lain-lain',
            'pekerjaan_lain'      => 'nullable|string|max:100',
            'status_pernikahan'   => 'nullable|in:belum_kawin,kawin,cerai_hidup,cerai_mati',
            'jaminan_kesehatan'   => 'nullable|string|max:100',
             $id,
        ]);

        $pasien->update($request->all());

        return redirect()->route('pasien.index')->with('success', 'Data Pasien berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->delete();

        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil dihapus.');
    }
}
