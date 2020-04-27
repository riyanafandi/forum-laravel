<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\User;
use App\Guru;
use App\Mapel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }
    public function kelas()
    {
        $kelass = Kelas::paginate(10);
        return view('admin.kelas', compact('kelass'));
    }

    public function inputkelas(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'wali' => 'required',
            'ketua' => 'required',
            'kode' => 'required'
        ]);
        Kelas::create([
            'nama' => $request->nama,
            'wali' => $request->wali,
            'ketua' => $request->ketua,
            'kode' => $request->kode,
        ]);
        return redirect()->back()->with('suksesinput', 'Kelas ' . $request->nama . ' Berhasil Ditambahkan');
    }

    public function showkelas(Kelas $kelas)
    {
        return view('admin.detailkelas', compact('kelas'));
    }

    public function siswa()
    {
        $siswas = User::orderBy('id', 'DESC')->paginate(20);
        return view('admin.siswa', compact('siswas'));
    }
    public function showsiswa(User $user)
    {
        $siswa = $user;
        $mapels = Mapel::all();
        // dd($mapel);
        return view('admin.detailsiswa', compact('siswa', 'mapels'));
    }

    // mapel

    public function addnilai(Request $request, $idsiswa)
    {
        $user = User::find($idsiswa);
        // dd($user);
        if($user->mapel()->where('mapel_id', $request->mapel_id)->exists()){
            return redirect()->back()->with('nilaiSudahAda', 'Nilai sudah ada');
        }else{
            $user->mapel()->attach($request->mapel_id, ['nilai' => $request->nilai]);
        }
        return redirect()->back()->with('addnilai', 'Nilai '. $user->name .' Berhasil Ditambahkan');
    }



    // guru
    public function guru()
    {
        $gurus = Guru::paginate(25);
        return view('admin.guru', compact('gurus'));
    }

    public function detailguru(Guru $guru)
    {
        return view('admin/detailguru', compact('guru'));
    }

}
