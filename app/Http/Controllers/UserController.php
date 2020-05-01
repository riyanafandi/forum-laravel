<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Forum;
use App\Komentar;
use App\Tugas;
use App\Jawaban;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index');
    }
    public function beranda()
    {
        $forums = Forum::orderBy('id', 'DESC')->paginate(25);
        return view('beranda.index', compact('forums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function komentarberanda(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'forum_id' => 'required',
            'komentar' => 'required'
        ]);
        Komentar::create([
            'isi' => $request->komentar,
            'user_id' => $request->user_id,
            'forum_id' => $request->forum_id,
        ]);
        return redirect()->back()->with('sukseskomen', 'Komentar anda telah ditambahkan');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function tugas()
    {
        return view('tugas.index');
    }

    public function showtugas(Tugas $tugas)
    {
        // dd($tugas);
        return view('tugas/detailtugas', compact('tugas'));
    }


    public function jawaban(Request $request)
    {
        $request->validate([
            'jawaban' => 'required',
            'gambar' => 'max:3000|mimes:jpg,jpeg,png'
        ]); 
        $gambar = $request->gambar;
        $newGambar = $gambar->getClientOriginalName();
        Jawaban::create([
            'jawaban' => $request->jawaban,
            'gambar' => 'img/' . $newGambar,
            'user_id' => $request->user_id,
            'tugas_id' => $request->tugas_id,
        ]);
        $gambar->move('img/', $newGambar);
        return redirect()->back()->with('berhasil', 'Jawaban Berhasil Dikirimkan');
    }
}
