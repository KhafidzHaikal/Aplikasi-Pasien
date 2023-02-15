<?php

namespace App\Http\Controllers;

use App\Models\Icd;
use App\Models\User;
use App\Models\KajianPasien;
use Illuminate\Http\Request;
use App\Models\UnitPelayananBpGigi;

class UnitPelayananBpGigiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->type == 'admin') {
            return view('admin.bp_gigi.index', [
                'title' => 'Pelayanan Pasien BP Gigi',
                'pelayanan_pasiens' => UnitPelayananBpGigi::all()
            ]);
        } else {
            return view('bp_gigi.index', [
                'title' => 'Pelayanan Pasien BP Gigi',
                'pelayanan_pasiens' => UnitPelayananBpGigi::all()
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
            return view('admin.bp_gigi.create', [
                'title' => 'Tambah Pelayanan Pasien',
                'kajian_pasiens' => KajianPasien::where('unit_pelayanans_id', '=', 2)->latest()->get()
            ]);
        } else {
            return view('bp_gigi.create', [
                'title' => 'Tambah Pelayanan Pasien',
                'kajian_pasiens' => KajianPasien::where('unit_pelayanans_id', '=', 2)->latest()->get()
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUnitPelayananBpGigiRequest  $request
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
            return redirect()->route('admin-bp-gigi.create')->with('success', 'Status Pasien Sudah Diperiksa');
        } else {
            return redirect()->route('bp-gigi.create')->with('success', 'Status Pasien Sudah Diperiksa');
        }
    }

    public function periksa(KajianPasien $kajianPasien)
    {
        if (auth()->user()->type == 'admin') {
            return view('admin.bp_gigi.periksa', [
                'title' => 'Periksa Pasien',
                'perawats' => User::all(),
                'kajian_pasien' => $kajianPasien,
                'icds' => Icd::all()
            ]);
        } else {
            return view('bp_gigi.periksa', [
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
        UnitPelayananBpGigi::create($validatedData);
        if (auth()->user()->type == 'admin') {
            return redirect()->route('admin-bp-gigi.index')->with('success', 'Daftar Pelayanan Pasien Berhasil Ditambahkan');
        } else {
            return redirect()->route('bp-gigi.index')->with('success', 'Daftar Pelayanan Pasien Berhasil Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UnitPelayananBpGigi  $unitPelayananBpGigi
     * @return \Illuminate\Http\Response
     */
    public function show(UnitPelayananBpGigi $pelayananPasien)
    {
        if (auth()->user()->type == 'admin'){
            return view('admin.bp_gigi.show', [
                'title' => 'Detail Pelayanan Pasiens',
                'pelayanan_pasiens' => $pelayananPasien
            ]);
        } else {
            return view('bp_gigi.show', [
                'title' => 'Detail Pelayanan Pasiens',
                'pelayanan_pasiens' => $pelayananPasien
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UnitPelayananBpGigi  $unitPelayananBpGigi
     * @return \Illuminate\Http\Response
     */
    public function edit(UnitPelayananBpGigi $pelayananPasien)
    {
        if (auth()->user()->type == 'admin'){
            return view('admin.bp_gigi.edit', [
                'title' => 'Edit Pelayanan Pasien Poli Umum',
                'pelayanan_pasiens' => $pelayananPasien,
                'perawats' => User::all(),
                'icds' => Icd::all(),
            ]);
        } else {
            return view('bp_gigi.edit', [
                'title' => 'Edit Pelayanan Pasien Poli Umum',
                'pelayanan_pasiens' => $pelayananPasien,
                'perawats' => User::all(),
                'icds' => Icd::all()
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUnitPelayananBpGigiRequest  $request
     * @param  \App\Models\UnitPelayananBpGigi  $unitPelayananBpGigi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UnitPelayananBpGigi $pelayananPasien)
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
        UnitPelayananBpGigi::where('id', $pelayananPasien->id)->update($validatedData);
        if (auth()->user()->type == 'admin') {
            return redirect()->route('admin-bp-gigi.index')->with('success', 'Pasien Berhasil Diubah');
        } else {
            return redirect()->route('bp-gigi.index')->with('success', 'Pasien Berhasil Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UnitPelayananBpGigi  $unitPelayananBpGigi
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnitPelayananBpGigi $pelayanan_pasien)
    {
        UnitPelayananBpGigi::destroy($pelayanan_pasien->id);
        if (auth()->user()->type == 'admin') {
            return redirect()->route('admin-bp-gigi.index')->with('success', 'Pasien Berhasil Dihapus');
        } else {
        return redirect()->route('bp-gigi.index')->with('success', 'Pasien Berhasil Dihapus');
        }
    }
}
