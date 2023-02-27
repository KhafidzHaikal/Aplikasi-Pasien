<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Icd;
use App\Models\User;
use Ramsey\Uuid\Uuid;
use App\Models\KajianPasien;
use Illuminate\Http\Request;
use App\Models\PelayananPasien;
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
                'pelayanan_pasiens' => PelayananPasien::where('unit_pelayanans_id', '=', 4)->latest()->get()
            ]);
        } else {
            return view('poli_kia.index', [
                'title' => 'Pelayanan Pasien BP KIA',
                'pelayanan_pasiens' => PelayananPasien::where('unit_pelayanans_id', '=', 4)->latest()->get()
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
                'kajian_pasiens' => KajianPasien::where('unit_pelayanans_id', '=', 4)->get()
            ]);
        } else {
            return view('poli_kia.create', [
                'title' => 'Tambah Pelayanan Pasien',
                'kajian_pasiens' => KajianPasien::where('unit_pelayanans_id', '=', 4)->get()
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
            return redirect()->route('admin-poli-kia.create')->with('success', 'Status Pasien Diubah');
        } else {
            return redirect()->route('poli-kia.create')->with('success', 'Status Pasien Diubah');
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
        $request->validate([
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
            'unit_pelayanans_id'  => 'required',
            'status'  => 'required',
            'statusAskep'  => 'required',
        ]);

        $kajianPasien = KajianPasien::find($request->kajian_pasiens_id);
        // dd($kajianPasien->status);
        $kajianPasien->status = 2;
        $kajianPasien->update();

        $pelayanan_pasien = new PelayananPasien();
        $pelayanan_pasien->id = Uuid::uuid4()->getHex();
        $pelayanan_pasien->kajian_pasiens_id = $request->kajian_pasiens_id;
        $pelayanan_pasien->tanggal_pemeriksaan = $request->tanggal_pemeriksaan;
        $pelayanan_pasien->users_id = $request->users_id;
        $pelayanan_pasien->keluhan_utama = $request->keluhan_utama;
        $pelayanan_pasien->rps = $request->rps;
        $pelayanan_pasien->rpo = $request->rpo;
        $pelayanan_pasien->icds_kode_icd = $request->icds_kode_icd;
        $pelayanan_pasien->penatalaksanaan = $request->penatalaksanaan;
        $pelayanan_pasien->tindakan = $request->tindakan;
        $pelayanan_pasien->edukasi = $request->edukasi;
        $pelayanan_pasien->jenis_kasus = $request->jenis_kasus;
        $pelayanan_pasien->unit_pelayanans_id = $request->unit_pelayanans_id;
        $pelayanan_pasien->status = $request->status;
        $pelayanan_pasien->statusAskep = $request->statusAskep;
        // dd($pelayanan_pasien);
        $pelayanan_pasien->save();
        if (auth()->user()->type == 'admin') {
            return redirect()->route('admin-poli-kia.index')->with('success', 'Pasien Berhasil Ditambahkan');
        } else {
            return redirect()->route('poli-kia.index')->with('success', 'Pasien Berhasil Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UnitPelayananKia  $UnitPelayananKia
     * @return \Illuminate\Http\Response
     */
    public function show(PelayananPasien $pelayananPasien)
    {
        if (auth()->user()->type == 'admin') {
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
    public function edit(PelayananPasien $pelayananPasien)
    {
        if (auth()->user()->type == 'admin') {
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
    public function destroy(PelayananPasien $pelayanan_pasien)
    {
        PelayananPasien::destroy($pelayanan_pasien->id);
        if (auth()->user()->type == 'admin') {
            return redirect()->route('admin-poli-kia.index')->with('success', 'Pasien Berhasil Dihapus');
        } else {
            return redirect()->route('poli-kia.index')->with('success', 'Pasien Berhasil Dihapus');
        }
    }

    public function print($tanggal_awal, $tanggal_akhir)
    {
        // dd($tanggal_awal, $tanggal_akhir);
        $pelayanan_pasiens = PelayananPasien::where('unit_pelayanans_id', '=', 4)->with('users', 'kajian_pasiens', 'icds', 'pasiens')->whereBetween('tanggal_pemeriksaan', [$tanggal_awal, $tanggal_akhir])->get();
        $date = Carbon::now()->translatedFormat('d F Y H:i:s');
        $title = 'Laporan Pasien Poli Kia';
        $tanggal_awal = $tanggal_awal;
        $newTanggalAwal = Carbon::createFromFormat('Y-m-d', $tanggal_awal)->translatedFormat('d F Y');
        $tanggal_akhir = $tanggal_akhir;
        $newTanggalAkhir = Carbon::createFromFormat('Y-m-d', $tanggal_akhir)->translatedFormat('d F Y');
        // dd($pelayanan_pasiens);
        $pdf = Pdf::loadView('admin.poli_kia.pdf', compact('pelayanan_pasiens', 'title', 'date', 'newTanggalAwal', 'newTanggalAkhir'))->setPaper('legal', 'landscape');
        return $pdf->stream('Laporan-Poli-Kia.pdf');
    }
}
