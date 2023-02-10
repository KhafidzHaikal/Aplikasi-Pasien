<?php

namespace App\Http\Controllers;

use App\Models\UnitPelayananBpUmum;
use App\Http\Requests\StoreUnitPelayananBpUmumRequest;
use App\Http\Requests\UpdateUnitPelayananBpUmumRequest;
use App\Models\Icd;
use App\Models\KajianPasien;
use App\Models\User;
use Illuminate\Http\Request;

class UnitPelayananBpUmumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->type == 'admin') {
            return view('admin.bp_umum.pelayanan_pasiens.index', [
                'title' => 'Pelayanan Pasien BP UMUM',
                'pelayanan_pasiens' => UnitPelayananBpUmum::all()
            ]);
        } else {
            return view('bp_umum.pelayanan_pasiens.index', [
                'title' => 'Pelayanan Pasien BP UMUM',
                'pelayanan_pasiens' => UnitPelayananBpUmum::all()
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
            return view('admin.bp_umum.pelayanan_pasiens.create', [
                'title' => 'Tambah Pelayanan Pasien',
                'kajian_pasiens' => KajianPasien::where('unit_pelayanans_id', '=', 1)->get()
            ]);
        } else {
            return view('bp_umum.pelayanan_pasiens.create', [
                'title' => 'Tambah Pelayanan Pasien',
                'kajian_pasiens' => KajianPasien::where('unit_pelayanans_id', '=', 1)->get()
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUnitPelayananBpUmumRequest  $request
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
            return redirect()->route('admin-bp-umum.create')->with('success', 'Status Pasien Berhasil Dihapus');
        } else {
            return redirect()->route('bp-umum.create')->with('success', 'Status Pasien Berhasil Dihapus');
        }
    }

    public function periksa(KajianPasien $kajianPasien)
    {
        if (auth()->user()->type == 'admin') {
            return view('admin.bp_umum.pelayanan_pasiens.periksa', [
                'title' => 'Periksa Pasien',
                'perawats' => User::all(),
                'kajian_pasien' => $kajianPasien,
                'icds' => Icd::all()
            ]);
        } else {
            return view('bp_umum.pelayanan_pasiens.periksa', [
                'title' => 'Periksa Pasien',
                'perawats' => User::all(),
                'kajian_pasien' => $kajianPasien
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
            'tanda_vital'  => 'required',
            'icds_kode_icd' => 'required',
            'diagnosa'  => 'required',
            'penatalaksanaan'  => 'required',
            'tindakan'  => 'required',
            'edukasi'  => 'required',
            'jenis_kasus'  => 'required',
        ];

        $validatedData = $request->validate($rules);
        UnitPelayananBpUmum::create($validatedData);
        if (auth()->user()->type == 'admin') {
            return redirect()->route('admin-bp-umum.index')->with('success', 'Daftar Pelayanan Pasien Berhasil Ditambahkan');
        } else {
            return redirect()->route('bp-umum.index')->with('success', 'Daftar Pelayanan Pasien Berhasil Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UnitPelayananBpUmum  $unitPelayananBpUmum
     * @return \Illuminate\Http\Response
     */
    public function show(UnitPelayananBpUmum $unitPelayananBpUmum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UnitPelayananBpUmum  $unitPelayananBpUmum
     * @return \Illuminate\Http\Response
     */
    public function edit(UnitPelayananBpUmum $unitPelayananBpUmum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUnitPelayananBpUmumRequest  $request
     * @param  \App\Models\UnitPelayananBpUmum  $unitPelayananBpUmum
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUnitPelayananBpUmumRequest $request, UnitPelayananBpUmum $unitPelayananBpUmum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UnitPelayananBpUmum  $unitPelayananBpUmum
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnitPelayananBpUmum $pelayanan_pasien)
    {
        UnitPelayananBpUmum::destroy($pelayanan_pasien->id);
        if (auth()->user()->type == 'admin') {
            return redirect()->route('admin-bp-umum.index')->with('success', 'Pasien Berhasil Dihapus');
        } else {
        return redirect()->route('bp-umum.index')->with('success', 'Pasien Berhasil Dihapus');
        }
    }
}
