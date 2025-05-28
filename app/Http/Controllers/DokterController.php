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
        // return ("halaman dokter");
        $search = $request->input('search');
        $dokter = $this->dokterService->getAll($search);

        return view('dokter.data-dokter', compact('dokter'));
    }

    public function show($id)
    {
        $kelas = $this->kelasService->getById($id);

        if ($kelas === false) {
            return response()->json(['error' => 'Failed to retrieve data'], 500);
        }

        return response()->json($kelas);
    }

    public function create()
    {
        $jenisKelas = JenisKelas::all();
        $jurusan = Jurusan::all();
        $guru = Pegawai::where('id_jenispegawai', 2)->get();
        // $cabangs = $this->cabangService->getCabangByBranchManager();
        // if($cabangs == null){
        //     $cabangs = $this->cabangService->getAllLoc();
        // }
        // return view('kelas.create', compact('cabangs'));
        return view('pages.data.tambahDataKelas', compact('jenisKelas', 'jurusan', 'guru'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama_kelas' => 'required|string|max:255|unique:tb_kelas,nama_kelas',
            'jenis_kelas' => 'required',
            'jurusan' => 'required',
            'id_pegawai' => ['required', Rule::unique('tb_kelas', 'id_pegawai')],
        ],[
            'id_pegawai.unique' => 'Pegawai sudah menjadi wali kelas, silahkan pilih pegawai lain',
            'nama_kelas.unique' => 'Kelas sudah ada',
        ]);

        $this->kelasService->create($request);

        return redirect()->route('kelas.create')->with('success', 'Kelas berhasil ditambahkan.');
    }
    public function edit($id)
    {
        $kelas = $this->kelasService->getKelasById($id);
        // dd($kelas);
        $jenisKelas = JenisKelas::all();
        $jurusan = Jurusan::all();
        $guru = Pegawai::where('id_jenispegawai', 2)->get();

        // if ($kelas === false) {
        //     return response()->json(['error' => 'Failed to retrieve data'], 500);
        // }

        return view('pages.data.editKelas', compact('kelas', 'jenisKelas', 'jurusan', 'guru'));
    }
    public function update(Request $request, $id)
    {
        $kelas = $this->kelasService->getKelasById($id);
        $request->validate([
            'nama_kelas' => ['required','string','max:255', Rule::unique('tb_kelas', 'nama_kelas')->ignore($kelas->id_kelas, 'id_kelas'),],
            'jenis_kelas' => 'required',
            'jurusan' => 'required',
            'id_pegawai' => ['required', Rule::unique('tb_kelas', 'id_pegawai')->ignore($kelas->id_kelas, 'id_kelas'),],
        ],[
            'id_pegawai.unique' => 'Pegawai sudah menjadi wali kelas, silahkan pilih pegawai lain',
            'nama_kelas.unique' => 'Kelas sudah ada',
        ]);

        $this->kelasService->update($request, $id);

        return redirect()->route('kelas.edit', ['kela' => $id])->with('success', 'Kelas berhasil ditambahkan.');

    }

    public function destroy($id)
    {
        $result = $this->kelasService->delete($id);

        if ($result === false) {
            return response()->json(['error' => 'Failed to delete data'], 500);
        }

        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil dihapus!');
    }

    public function exportTemplate()
    {
        return Excel::download(new KelasTemplate, 'template-kelas.xlsx');
    }

}