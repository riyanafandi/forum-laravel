<?php

namespace App\Http\Controllers;

use App\Beranda;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berandas = Beranda::orderBy('id', 'DESC')->get();
        // dd($berandas);
        return view('beranda.index', compact('berandas'));
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
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'user_id' => 'required',
        ]);
        Beranda::create([
            'content' => $request->content,
            'user_id' => $request->user_id,
        ]);
        return redirect()->back()->with('status', 'Konten anda berhasil terupload');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Beranda  $beranda
     * @return \Illuminate\Http\Response
     */
    public function show(Beranda $beranda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Beranda  $beranda
     * @return \Illuminate\Http\Response
     */
    public function edit(Beranda $beranda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Beranda  $beranda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Beranda $beranda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Beranda  $beranda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Beranda $beranda)
    {
        //
    }
}
