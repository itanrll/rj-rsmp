<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\KelasService;
use App\Models\Kelas;
use App\Models\JenisKelas;
use App\Models\Jurusan;
use App\Models\Pegawai;
use App\Models\JenisPegawai;
use Illuminate\Validation\Rule;
use App\Exports\KelasTemplate;
use App\Models\Dokter;
use Maatwebsite\Excel\Facades\Excel;
use App\Services\DokterService;

class DokterController extends Controller
{
    //
    protected $dokterService;
    public function __construct(DokterService $dokterService)
    {
        $this->dokterService = $dokterService;
    }
    public function index(Request $request)
    {

        $search = $request->input('search');
        $dokter = Dokter::when($search, function ($query, $search) {
                return $query->where('nama_dokter', 'like', "%{$search}%")
                             ->orWhere('spesialisasi', 'like', "%{$search}%");
            })->get();

        return view('dokter.data-dokter', compact('dokter'));
    }


    public function create()
    {
        return view('dokter.create');
    }

    public function store(Request $request)
    {

        $request->validate([
        'nama_dokter'    => 'required|string|max:255',
        'spesialisasi'   => 'required|string|max:255',
        'alamat_dokter'  => 'required|string',
        'SIP'            => 'required|string|max:100|unique:tb_dokter,SIP',
    ]);

    $this->dokterService->create($request);

    return redirect()->route('dokter.index')->with('success', 'Data dokter berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $dokter = Dokter::findOrFail($id);
        return view('dokter.edit', compact('dokter'));
    }

    public function update(Request $request, $id)
    {
        $dokter = Dokter::findOrFail($id);

        $request->validate([
            'nama_dokter' => 'required|string|max:255',
            'spesialisasi' => 'required|string|max:255',
            'alamat_dokter' => 'required|string',
            'SIP' => 'required|string|max:100|unique:dokters,SIP,' . $id,
        ]);

        $dokter->update($request->all());

        return redirect()->route('dokter.index')->with('success', 'Data dokter berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $dokter = Dokter::findOrFail($id);
        $dokter->delete();

        return redirect()->route('dokter.index')->with('success', 'Data dokter berhasil dihapus.');
    }

}