<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Icd;
use App\Models\User;
use App\Models\KajianPasien;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\UnitPelayananKonseling;

class UnitPelayananKonselingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->type == 'admin') {
            return view('admin.poli_konseling.index', [
                'title' => 'Pelayanan Pasien Konseling',
                'pelayanan_pasiens' => UnitPelayananKonseling::latest()->get()
            ]);
        } else {
            return view('poli_konseling.index', [
                'title' => 'Pelayanan Pasien Konseling',
                'pelayanan_pasiens' => UnitPelayananKonseling::latest()->get()
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
            return view('admin.poli_konseling.create', [
                'title' => 'Tambah Pelayanan Pasien',
                'kajian_pasiens' => KajianPasien::where('unit_pelayanans_id', '=', 6)->latest()->get()
            ]);
        } else {
            return view('poli_konseling.create', [
                'title' => 'Tambah Pelayanan Pasien',
                'kajian_pasiens' => KajianPasien::where('unit_pelayanans_id', '=', 6)->latest()->get()
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUnitPelayananKonselingRequest  $request
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
            return redirect()->route('admin-poli-konseling.create')->with('success', 'Status Pasien Sudah Diperiksa');
        } else {
            return redirect()->route('poli-konseling.create')->with('success', 'Status Pasien Sudah Diperiksa');
        }
    }

    public function periksa(KajianPasien $kajianPasien)
    {
        if (auth()->user()->type == 'admin') {
            return view('admin.poli_konseling.periksa', [
                'title' => 'Periksa Pasien',
                'perawats' => User::all(),
                'kajian_pasien' => $kajianPasien,
                'icds' => Icd::all()
            ]);
        } else {
            return view('poli_konseling.periksa', [
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
        UnitPelayananKonseling::create($validatedData);
        if (auth()->user()->type == 'admin') {
            return redirect()->route('admin-poli-konseling.index')->with('success', 'Daftar Pelayanan Pasien Berhasil Ditambahkan');
        } else {
            return redirect()->route('poli-konseling.index')->with('success', 'Daftar Pelayanan Pasien Berhasil Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UnitPelayananKonseling  $UnitPelayananKonseling
     * @return \Illuminate\Http\Response
     */
    public function show(UnitPelayananKonseling $pelayananPasien)
    {
        if (auth()->user()->type == 'admin'){
            return view('admin.poli_konseling.show', [
                'title' => 'Detail Pelayanan Pasiens',
                'pelayanan_pasiens' => $pelayananPasien
            ]);
        } else {
            return view('poli_konseling.show', [
                'title' => 'Detail Pelayanan Pasiens',
                'pelayanan_pasiens' => $pelayananPasien
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UnitPelayananKonseling  $UnitPelayananKonseling
     * @return \Illuminate\Http\Response
     */
    public function edit(UnitPelayananKonseling $pelayananPasien)
    {
        if (auth()->user()->type == 'admin'){
            return view('admin.poli_konseling.edit', [
                'title' => 'Edit Pelayanan Pasien Poli MTBS',
                'pelayanan_pasiens' => $pelayananPasien,
                'perawats' => User::all(),
                'icds' => Icd::all(),
            ]);
        } else {
            return view('poli_konseling.edit', [
                'title' => 'Edit Pelayanan Pasien Poli MTBS',
                'pelayanan_pasiens' => $pelayananPasien,
                'perawats' => User::all(),
                'icds' => Icd::all()
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUnitPelayananKonselingRequest  $request
     * @param  \App\Models\UnitPelayananKonseling  $UnitPelayananKonseling
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UnitPelayananKonseling $pelayananPasien)
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
        UnitPelayananKonseling::where('id', $pelayananPasien->id)->update($validatedData);
        if (auth()->user()->type == 'admin') {
            return redirect()->route('admin-poli-konseling.index')->with('success', 'Pasien Berhasil Diubah');
        } else {
            return redirect()->route('poli-konseling.index')->with('success', 'Pasien Berhasil Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UnitPelayananKonseling  $UnitPelayananKonseling
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnitPelayananKonseling $pelayanan_pasien)
    {
        UnitPelayananKonseling::destroy($pelayanan_pasien->id);
        if (auth()->user()->type == 'admin') {
            return redirect()->route('admin-poli-konseling.index')->with('success', 'Pasien Berhasil Dihapus');
        } else {
        return redirect()->route('poli-konseling.index')->with('success', 'Pasien Berhasil Dihapus');
        }
    }

    public function print($tanggal_awal, $tanggal_akhir)
    {
        // dd($tanggal_awal, $tanggal_akhir);
        $pelayanan_pasiens = UnitPelayananKonseling::with('users', 'kajian_pasiens', 'icds', 'pasiens')->whereBetween('tanggal_pemeriksaan', [$tanggal_awal, $tanggal_akhir])->get();
        $date = Carbon::now()->format('d-m-Y');
        $tanggal_awal = $tanggal_awal;
        $newTanggalAwal = Carbon::createFromFormat('Y-m-d', $tanggal_awal)->format('d-m-Y');
        $tanggal_akhir = $tanggal_akhir;
        $newTanggalAkhir = Carbon::createFromFormat('Y-m-d', $tanggal_akhir)->format('d-m-Y');
        // dd($pelayanan_pasiens);
        $pdf = Pdf::loadView('admin.poli_konseling.pdf', compact('pelayanan_pasiens', 'date', 'newTanggalAwal', 'newTanggalAkhir'))->setPaper('legal', 'landscape');
        return $pdf->stream('Laporan-Poli-Konseling.pdf');
    }
}
