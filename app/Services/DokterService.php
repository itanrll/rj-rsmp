<?php

namespace App\Services;
use App\Models\Dokter;
use Exception;
// use Illuminate\Container\Attributes\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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

            if ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('nama_dokter', 'like', "%{$search}%")
                      ->orWhere('spesialisasi', 'like', "%{$search}%")
                      ->orWhere('alamat_dokter', 'like', "%{$search}%")
                      ->orWhere('SIP', 'like', "%{$search}%");
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
        try {
            $dokter = Dokter::create([
                'nama_dokter'    => $request->nama_dokter,
                'spesialisasi'   => $request->spesialisasi,
                'alamat_dokter'  => $request->alamat_dokter,
                'SIP'            => $request->SIP,
            ]);

            return $dokter;
        } catch (Exception $e) {
            Log::error("message");('Error creating dokter: ' . $e->getMessage());
            return false;
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $dokter = Dokter::findOrFail($id);
            $dokter->update([
                'nama_dokter'    => $request->nama_dokter,
                'spesialisasi'   => $request->spesialisasi,
                'alamat_dokter'  => $request->alamat_dokter,
                'SIP'            => $request->SIP,
            ]);
            return $dokter;
        } catch (Exception $e) {
            Log::error('Error updating dokter: ' . $e->getMessage());
            return false;
        }
    }

    public function delete($id)
    {
        try {
            $dokter = Dokter::findOrFail($id);
            return $dokter->delete();
        } catch (Exception $e) {
            Log::error("message");('Error deleting dokter: ' . $e->getMessage());
            return false;
        }
    }

}
