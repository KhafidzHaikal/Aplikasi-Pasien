<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Icd;
use App\Models\User;
use App\Models\KajianPasien;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\UnitPelayananBpUmum;
use App\Models\PelayananPasien;

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
                'pelayanan_pasiens' => PelayananPasien::where('unit_pelayanans_id', '=', 1)->latest()->get()
            ]);
        } else {
            return view('bp_umum.pelayanan_pasiens.index', [
                'title' => 'Pelayanan Pasien BP UMUM',
                'pelayanan_pasiens' => PelayananPasien::where('unit_pelayanans_id', '=', 1)->latest()->get()
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
            return redirect()->route('admin-bp-umum.create')->with('success', 'Status Pasien Diubah');
        } else {
            return redirect()->route('bp-umum.create')->with('success', 'Status Pasien Diubah');
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
            'unit_pelayanans_id' => 'required',
            'status'  => 'required',
        ];

        $validatedData = $request->validate($rules);
        PelayananPasien::create($validatedData);
        if (auth()->user()->type == 'admin') {
            return redirect()->route('admin-bp-umum.index')->with('success', 'Pasien Berhasil Ditambahkan');
        } else {
            return redirect()->route('bp-umum.index')->with('success', 'Pasien Berhasil Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UnitPelayananBpUmum  $unitPelayananBpUmum
     * @return \Illuminate\Http\Response
     */
    public function show(PelayananPasien $pelayananPasien)
    {
        if (auth()->user()->type == 'admin') {
            return view('admin.bp_umum.pelayanan_pasiens.show', [
                'title' => 'Detail Pelayanan Pasiens',
                'pelayanan_pasiens' => $pelayananPasien
            ]);
        } else {
            return view('bp_umum.pelayanan_pasiens.show', [
                'title' => 'Detail Pelayanan Pasiens',
                'pelayanan_pasiens' => $pelayananPasien
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UnitPelayananBpUmum  $unitPelayananBpUmum
     * @return \Illuminate\Http\Response
     */
    public function edit(PelayananPasien $pelayananPasien)
    {
        if (auth()->user()->type == 'admin') {
            return view('admin.bp_umum.pelayanan_pasiens.edit', [
                'title' => 'Edit Pelayanan Pasien Poli Umum',
                'pelayanan_pasiens' => $pelayananPasien,
                'perawats' => User::all(),
                'icds' => Icd::all(),
            ]);
        } else {
            return view('bp_umum.pelayanan_pasiens.edit', [
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
     * @param  \App\Http\Requests\UpdateUnitPelayananBpUmumRequest  $request
     * @param  \App\Models\UnitPelayananBpUmum  $unitPelayananBpUmum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PelayananPasien $pelayananPasien)
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
        PelayananPasien::where('id', $pelayananPasien->id)->update($validatedData);
        if (auth()->user()->type == 'admin') {
            return redirect()->route('admin-bp-umum.index')->with('success', 'Pasien Berhasil Diubah');
        } else {
            return redirect()->route('bp-umum.index')->with('success', 'Pasien Berhasil Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UnitPelayananBpUmum  $unitPelayananBpUmum
     * @return \Illuminate\Http\Response
     */
    public function destroy(PelayananPasien $pelayanan_pasien)
    {
        PelayananPasien::destroy($pelayanan_pasien->id);
        if (auth()->user()->type == 'admin') {
            return redirect()->route('admin-bp-umum.index')->with('success', 'Pasien Berhasil Dihapus');
        } else {
            return redirect()->route('bp-umum.index')->with('success', 'Pasien Berhasil Dihapus');
        }
    }

    public function print($tanggal_awal, $tanggal_akhir)
    {
        // dd($tanggal_awal, $tanggal_akhir);
        $pelayanan_pasiens = PelayananPasien::where('unit_pelayanans_id', '=', 1)->with('users', 'kajian_pasiens', 'icds', 'pasiens')->whereBetween('tanggal_pemeriksaan', [$tanggal_awal, $tanggal_akhir])->get();
        $date = Carbon::now()->format('d-m-Y');
        $tanggal_awal = $tanggal_awal;
        $newTanggalAwal = Carbon::createFromFormat('Y-m-d', $tanggal_awal)->format('d-m-Y');
        $tanggal_akhir = $tanggal_akhir;
        $newTanggalAkhir = Carbon::createFromFormat('Y-m-d', $tanggal_akhir)->format('d-m-Y');
        // dd($pelayanan_pasiens);
        $pdf = Pdf::loadView('admin.bp_umum.pelayanan_pasiens.pdf', compact('pelayanan_pasiens', 'date', 'newTanggalAwal', 'newTanggalAkhir'))->setPaper('legal', 'landscape');
        return $pdf->stream('Laporan-BP-Umum.pdf');
    }
}
