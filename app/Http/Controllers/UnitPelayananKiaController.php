<?php

namespace App\Http\Controllers;

use App\Models\Icd;
use App\Models\User;
use App\Models\KajianPasien;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\UnitPelayananKia;
use App\Http\Requests\StoreUnitPelayananKiaRequest;
use App\Http\Requests\UpdateUnitPelayananKiaRequest;

class UnitPelayananKiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->type == 'admin') {
            return view('admin.poli_kia.index', [
                'title' => 'Pelayanan Pasien BP KIA',
                'pelayanan_pasiens' => UnitPelayananKia::all()
            ]);
        } else {
            return view('poli_kia.index', [
                'title' => 'Pelayanan Pasien BP KIA',
                'pelayanan_pasiens' => UnitPelayananKia::all()
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
            return view('admin.poli_kia.create', [
                'title' => 'Tambah Pelayanan Pasien',
                'kajian_pasiens' => KajianPasien::where('unit_pelayanans_id', '=', 4)->latest()->get()
            ]);
        } else {
            return view('poli_kia.create', [
                'title' => 'Tambah Pelayanan Pasien',
                'kajian_pasiens' => KajianPasien::where('unit_pelayanans_id', '=', 4)->latest()->get()
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUnitPelayananKiaRequest  $request
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
            return redirect()->route('admin-poli-kia.create')->with('success', 'Status Pasien Sudah Diperiksa');
        } else {
            return redirect()->route('poli-kia.create')->with('success', 'Status Pasien Sudah Diperiksa');
        }
    }

    public function periksa(KajianPasien $kajianPasien)
    {
        if (auth()->user()->type == 'admin') {
            return view('admin.poli_kia.periksa', [
                'title' => 'Periksa Pasien',
                'perawats' => User::all(),
                'kajian_pasien' => $kajianPasien,
                'icds' => Icd::all()
            ]);
        } else {
            return view('poli_kia.periksa', [
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
        UnitPelayananKia::create($validatedData);
        if (auth()->user()->type == 'admin') {
            return redirect()->route('admin-poli-kia.index')->with('success', 'Daftar Pelayanan Pasien Berhasil Ditambahkan');
        } else {
            return redirect()->route('poli-kia.index')->with('success', 'Daftar Pelayanan Pasien Berhasil Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UnitPelayananKia  $UnitPelayananKia
     * @return \Illuminate\Http\Response
     */
    public function show(UnitPelayananKia $pelayananPasien)
    {
        if (auth()->user()->type == 'admin'){
            return view('admin.poli_kia.show', [
                'title' => 'Detail Pelayanan Pasiens',
                'pelayanan_pasiens' => $pelayananPasien
            ]);
        } else {
            return view('poli_kia.show', [
                'title' => 'Detail Pelayanan Pasiens',
                'pelayanan_pasiens' => $pelayananPasien
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UnitPelayananKia  $UnitPelayananKia
     * @return \Illuminate\Http\Response
     */
    public function edit(UnitPelayananKia $pelayananPasien)
    {
        if (auth()->user()->type == 'admin'){
            return view('admin.poli_kia.edit', [
                'title' => 'Edit Pelayanan Pasien Poli KIA',
                'pelayanan_pasiens' => $pelayananPasien,
                'perawats' => User::all(),
                'icds' => Icd::all(),
            ]);
        } else {
            return view('poli_kia.edit', [
                'title' => 'Edit Pelayanan Pasien Poli KIA',
                'pelayanan_pasiens' => $pelayananPasien,
                'perawats' => User::all(),
                'icds' => Icd::all()
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUnitPelayananKiaRequest  $request
     * @param  \App\Models\UnitPelayananKia  $UnitPelayananKia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UnitPelayananKia $pelayananPasien)
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
        UnitPelayananKia::where('id', $pelayananPasien->id)->update($validatedData);
        if (auth()->user()->type == 'admin') {
            return redirect()->route('admin-poli-kia.index')->with('success', 'Pasien Berhasil Diubah');
        } else {
            return redirect()->route('poli-kia.index')->with('success', 'Pasien Berhasil Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UnitPelayananKia  $UnitPelayananKia
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnitPelayananKia $pelayanan_pasien)
    {
        UnitPelayananKia::destroy($pelayanan_pasien->id);
        if (auth()->user()->type == 'admin') {
            return redirect()->route('admin-poli-kia.index')->with('success', 'Pasien Berhasil Dihapus');
        } else {
        return redirect()->route('poli-kia.index')->with('success', 'Pasien Berhasil Dihapus');
        }
    }

    public function print($tanggal_awal, $tanggal_akhir)
    {
        // dd($tanggal_awal, $tanggal_akhir);
        $pelayanan_pasiens = UnitPelayananKia::with('users', 'kajian_pasiens', 'icds', 'pasiens')->whereBetween('tanggal_pemeriksaan', [$tanggal_awal, $tanggal_akhir])->get();
        // dd($pelayanan_pasiens);
        $pdf = Pdf::loadView('admin.poli_kia.pdf', compact('pelayanan_pasiens'))->setPaper('legal', 'landscape');
        return $pdf->stream('Laporan-Poli-Kia.pdf');
    }
}
