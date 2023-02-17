<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\KajianPasien;
use Illuminate\Http\Request;
use App\Models\PelayananPasien;
use App\Http\Requests\StorePelayananPasienRequest;
use App\Http\Requests\UpdatePelayananPasienRequest;

class PelayananPasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pelayanan_pasiens.index', [
            'title' => 'Aplikasi Pelayanan Pasien',
            'pelayanan_pasiens' => PelayananPasien::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelayanan_pasiens.create', [
            'title' => 'Tambah Pelayanan Pasien',
            'kajian_pasiens' => KajianPasien::all(),
            'perawats' => User::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePelayananPasienRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'kajian_pasiens_id' => 'required',
            'tanggal_pemeriksaan'  => 'required',
            'users_id'  => 'required',
            'keluhan_utama'  => 'required',
            'rps'  => 'required',
            'rpo'  => 'required',
            'icds_kode_icd' => 'required',
            'penatalaksanaan'  => 'required',
            'tindakan'  => 'required',
            'edukasi'  => 'required',
            'jenis_kasus'  => 'required',
        ];

        $validatedData = $request->validate($rules);
        PelayananPasien::create($validatedData);
        return redirect()->route('pelayanan-pasiens.index')->with('success', 'Daftar Pelayanan Pasien Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PelayananPasien  $pelayananPasien
     * @return \Illuminate\Http\Response
     */
    public function show(PelayananPasien $pelayananPasien)
    {
        return view('pelayanan_pasiens.show', [
            'title' => 'Detail Pelayanan Pasien',
            'pelayanan_pasiens' => $pelayananPasien
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PelayananPasien  $pelayananPasien
     * @return \Illuminate\Http\Response
     */
    public function edit(PelayananPasien $pelayananPasien)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePelayananPasienRequest  $request
     * @param  \App\Models\PelayananPasien  $pelayananPasien
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePelayananPasienRequest $request, PelayananPasien $pelayananPasien)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PelayananPasien  $pelayananPasien
     * @return \Illuminate\Http\Response
     */
    public function destroy(PelayananPasien $pelayananPasien)
    {
        PelayananPasien::destroy($pelayananPasien->id);
        return redirect()->route('pelayanan-pasiens.index')->with('success', 'Pasien berhasil dihapus');
    }
}
