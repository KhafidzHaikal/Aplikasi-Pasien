<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\ObatMasuk;
use Illuminate\Http\Request;
use App\Http\Requests\StoreObatMasukRequest;
use App\Http\Requests\UpdateObatMasukRequest;
use App\Models\ObatKeluar;

class ObatMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.obat.addStok', [
            'title' => 'Tambah Stok Obat',
            'obats' => Obat::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreObatMasukRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tanggal_masuk' => 'required',
            'obats_no_obat' => 'required',
            'stok' => 'required',
            'sumber_dana' => 'required',
        ]);

        $obat = Obat::find($request->obats_no_obat);
        $obat->stok_lama += $request->stok;
        // dd($obat->stok_lama);
        $obat->save();

        ObatMasuk::create($validatedData);
        return redirect()->route('admin-obat.index')->with('success', 'Stok Berhasil DItambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ObatMasuk  $obatMasuk
     * @return \Illuminate\Http\Response
     */
    public function show(ObatMasuk $obatMasuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ObatMasuk  $obatMasuk
     * @return \Illuminate\Http\Response
     */
    public function edit(ObatMasuk $obatMasuk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateObatMasukRequest  $request
     * @param  \App\Models\ObatMasuk  $obatMasuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ObatMasuk $obatMasuk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ObatMasuk  $obatMasuk
     * @return \Illuminate\Http\Response
     */
    public function destroy(ObatMasuk $obatMasuk)
    {
        //
    }
}
