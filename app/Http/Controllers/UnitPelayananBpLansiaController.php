<?php

namespace App\Http\Controllers;

use App\Models\Icd;
use App\Models\User;
use App\Models\KajianPasien;
use Illuminate\Http\Request;
use App\Models\UnitPelayananBpLansia;

class UnitPelayananBpLansiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->type == 'admin') {
            return view('admin.bp_lansia.index', [
                'title' => 'Pelayanan Pasien BP lansia',
                'pelayanan_pasiens' => UnitPelayananBpLansia::all()
            ]);
        } else {
            return view('bp_lansia.index', [
                'title' => 'Pelayanan Pasien BP lansia',
                'pelayanan_pasiens' => UnitPelayananBpLansia::all()
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->type == 'admin') {
            return view('admin.bp_lansia.create', [
                'title' => 'Tambah Pelayanan Pasien',
                'kajian_pasiens' => KajianPasien::where('unit_pelayanans_id', '=', 3)->latest()->get()
            ]);
        } else {
            return view('bp_lansia.create', [
                'title' => 'Tambah Pelayanan Pasien',
                'kajian_pasiens' => KajianPasien::where('unit_pelayanans_id', '=', 3)->latest()->get()
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUnitPelayananBpLansiaRequest  $request
     * @return \Illuminate\Http\Response
     */

    public function status(Request $request, KajianPasien $kajianPasien)
    {

        $rules = [
            'status' => 'required',
        ];

        $validatedData = $request->validate($rules);
        KajianPasien::where('id', $kajianPasien->id)->update($validatedData);
        if (auth()->user()->type == 'admin') {
            return redirect()->route('admin-bp-lansia.create')->with('success', 'Status Pasien Sudah Diperiksa');
        } else {
            return redirect()->route('bp-lansia.create')->with('success', 'Status Pasien Sudah Diperiksa');
        }
    }

    public function periksa(KajianPasien $kajianPasien)
    {
        if (auth()->user()->type == 'admin') {
            return view('admin.bp_lansia.periksa', [
                'title' => 'Periksa Pasien',
                'perawats' => User::all(),
                'kajian_pasien' => $kajianPasien,
                'icds' => Icd::all()
            ]);
        } else {
            return view('bp_lansia.periksa', [
                'title' => 'Periksa Pasien',
                'perawats' => User::all(),
                'kajian_pasien' => $kajianPasien,
                'icds' => Icd::all()
            ]);
        }
    }

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
        UnitPelayananBpLansia::create($validatedData);
        if (auth()->user()->type == 'admin') {
            return redirect()->route('admin-bp-lansia.index')->with('success', 'Daftar Pelayanan Pasien Berhasil Ditambahkan');
        } else {
            return redirect()->route('bp-lansia.index')->with('success', 'Daftar Pelayanan Pasien Berhasil Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UnitPelayananBpLansia  $UnitPelayananBpLansia
     * @return \Illuminate\Http\Response
     */
    public function show(UnitPelayananBpLansia $pelayananPasien)
    {
        if (auth()->user()->type == 'admin'){
            return view('admin.bp_lansia.show', [
                'title' => 'Detail Pelayanan Pasiens',
                'pelayanan_pasiens' => $pelayananPasien
            ]);
        } else {
            return view('bp_lansia.show', [
                'title' => 'Detail Pelayanan Pasiens',
                'pelayanan_pasiens' => $pelayananPasien
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UnitPelayananBpLansia  $UnitPelayananBpLansia
     * @return \Illuminate\Http\Response
     */
    public function edit(UnitPelayananBpLansia $pelayananPasien)
    {
        if (auth()->user()->type == 'admin'){
            return view('admin.bp_lansia.edit', [
                'title' => 'Edit Pelayanan Pasien Poli Lansia',
                'pelayanan_pasiens' => $pelayananPasien,
                'perawats' => User::all(),
                'icds' => Icd::all(),
            ]);
        } else {
            return view('bp_lansia.edit', [
                'title' => 'Edit Pelayanan Pasien Poli Lansia',
                'pelayanan_pasiens' => $pelayananPasien,
                'perawats' => User::all(),
                'icds' => Icd::all()
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUnitPelayananBpLansiaRequest  $request
     * @param  \App\Models\UnitPelayananBpLansia  $UnitPelayananBpLansia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UnitPelayananBpLansia $pelayananPasien)
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
        UnitPelayananBpLansia::where('id', $pelayananPasien->id)->update($validatedData);
        if (auth()->user()->type == 'admin') {
            return redirect()->route('admin-bp-lansia.index')->with('success', 'Pasien Berhasil Diubah');
        } else {
            return redirect()->route('bp-lansia.index')->with('success', 'Pasien Berhasil Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UnitPelayananBpLansia  $UnitPelayananBpLansia
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnitPelayananBpLansia $pelayanan_pasien)
    {
        UnitPelayananBpLansia::destroy($pelayanan_pasien->id);
        if (auth()->user()->type == 'admin') {
            return redirect()->route('admin-bp-lansia.index')->with('success', 'Pasien Berhasil Dihapus');
        } else {
        return redirect()->route('bp-lansia.index')->with('success', 'Pasien Berhasil Dihapus');
        }
    }
}