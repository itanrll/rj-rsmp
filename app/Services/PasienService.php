<?php

namespace App\Services;
use App\Models\Pasien;
use Exception;
// use Illuminate\Container\Attributes\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PasienService
{
    protected $model;

    public function __construct()
    {
        $this->model = new Pasien();
    }

    public function getAll($search = null)
    {
        try {
            $query = Pasien::query();

            if ($search) {
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
            }

            return $query->paginate(10);
        } catch (Exception $e) {
            Log::error('Error getting all dokter: ' . $e->getMessage());
            return false;
        }
    }

    public function create(Request $request)
    {
        // dd($request);
        try {
            $pasien = Pasien::create([
                'nomor_rekam_medis'   => $request->nomor_rekam_medis,
                'nik'                 => $request->nik,
                'nama_lengkap'        => $request->nama_lengkap,
                'nama_ibu_kandung'    => $request->nama_ibu_kandung,
                'tempat_lahir'        => $request->tempat_lahir,
                'tanggal_lahir'       => $request->tanggal_lahir,
                'jenis_kelamin'       => $request->jenis_kelamin,
                'agama'               => $request->agama,
                'alamat'              => $request->alamat,
                'pendidikan'          => $request->pendidikan,
                'pekerjaan'           => $request->pekerjaan,
                'pekerjaan_lain'      => $request->pekerjaan_lain,
                'status_pernikahan'   => $request->status_pernikahan,
                'jaminan_kesehatan'   => $request->jaminan_kesehatan,
            ]);

            return $pasien;
        } catch (Exception $e) {
            Log::error("message");('Error creating dokter: ' . $e->getMessage());
            dd($e->getMessage());
            return false;
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $pasien = Pasien::findOrFail($id);
            $pasien->update([
                'nomor_rekam_medis'   => $request->nomor_rekam_medis,
                'nik'                 => $request->nik,
                'nama_lengkap'        => $request->nama_lengkap,
                'nama_ibu_kandung'    => $request->nama_ibu_kandung,
                'tempat_lahir'        => $request->tempat_lahir,
                'tanggal_lahir'       => $request->tanggal_lahir,
                'jenis_kelamin'       => $request->jenis_kelamin,
                'agama'               => $request->agama,
                'alamat'              => $request->alamat,
                'pendidikan'          => $request->pendidikan,
                'pekerjaan'           => $request->pekerjaan,
                'pekerjaan_lain'      => $request->pekerjaan_lain,
                'status_pernikahan'   => $request->status_pernikahan,
                'jaminan_kesehatan'   => $request->jaminan_kesehatan,
            ]);
            return $pasien;
        } catch (Exception $e) {
            Log::error('Error updating dokter: ' . $e->getMessage());
            return false;
        }
    }

    public function delete($id)
    {
        try {
            $pasien = Pasien::findOrFail($id);
            return $pasien->delete();
        } catch (Exception $e) {
            Log::error("message");('Error deleting dokter: ' . $e->getMessage());
            return false;
        }
    }

}
