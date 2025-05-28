<?php

namespace App\Services;
use App\Models\Dokter;
use Exception;
use Illuminate\Http\Request;

class DokterService
{
    protected $model;

    public function __construct()
    {
        $this->model = new Dokter();
    }

    public function getAll($search = null)
    {
        try {
            $query = Dokter::query();

            // Jika ada parameter pencarian
            if ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('nama_dokter', 'like', "%{$search}%")
                      ->orWhere('spesialisasi', 'like', "%{$search}%")
                      ->orWhere('alamat_dokter', 'like', "%{$search}%")
                      ->orWhere('SIP', 'like', "%{$search}%");
                });
            }
    
            

            // Jika tidak ada parameter pencarian, kembalikan semua data
            return $query->paginate(10); // <= ini penting
        } catch (\Exception $e) {
            \Log::error('Error getting all dokter: ' . $e->getMessage());
            return false;
        }
    }

    

    public function create(Request $request)
    {
        // dd($request->all());
        try {
            $kelas = Kelas::create([
                'nama_kelas' => $request->nama_kelas,
                'id_jeniskelas' => $request->jenis_kelas,
                'id_jurusan' => $request->jurusan,
                'id_pegawai' => $request->id_pegawai,
            ]);


            
        } catch (Exception $e) {
            \Log::error('Error creating kelas: ' . $e->getMessage());
            return false;
        }
        return $kelas;
    }

    public function update(Request $request, $id_kelas)
    {
        try {
            $kelas = Kelas::findOrFail($id_kelas);
            $kelas->update([
                'nama_kelas' => $request->nama_kelas,
                'id_jeniskelas' => $request->jenis_kelas,
                'id_jurusan' => $request->jurusan,
                'id_pegawai' => $request->id_pegawai,
            ]);
            return $kelas;
        } catch (Exception $e) {
            \Log::error('Error updating kelas: ' . $e->getMessage());
            return false;
        }
    }

    public function delete($id_kelas)
    {
        try {
            $kelas = Kelas::findOrFail($id_kelas);
            return $kelas->delete();
        } catch (Exception $e) {
            \Log::error('Error deleting kelas: ' . $e->getMessage());
            return false;
        }
    }

}
