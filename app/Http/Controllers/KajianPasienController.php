<?php

namespace App\Http\Controllers;

use App\Models\User;
use Ramsey\Uuid\Uuid;
use App\Models\Pasiens;
use App\Models\KajianPasien;
use Illuminate\Http\Request;
use App\Models\UnitPelayanan;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Requests\UpdateKajianPasienRequest;

class KajianPasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kajian_pasiens.index', [
            'title' => 'Aplikasi Kajian Pasien',
            'kajian_pasiens' => KajianPasien::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kajian_pasiens.create', [
            'title' => 'Tambah Kajian Pasien',
            'pasiens' => Pasiens::all(),
            'perawats' => User::all(),
            'unit_pelayanans' => UnitPelayanan::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKajianPasienRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'pasiens_no_rm' => 'required',
            'tanggal_pemeriksaan' => 'required',
            'users_id' => 'required',
            'tensi' => 'required',
            'nadi' => 'required|integer',
            'resp' => 'required|integer',
            'suhu' => 'required|integer',
            'bb' => 'required|integer',
            'tb' => 'required|integer',
            'sirkulasi_cairan' => 'required',
            'perkemihan' => 'required',
            'pernapasan' => 'required',
            'pencernaan' => 'required',
            'muskuloskeletal' => 'required',
            'fungsi_penglihatan' => 'required',
            'fungsi_pendengaran' => 'required',
            'fungsi_perasa' => 'required',
            'fungsi_perabaan' => 'required',
            'fungsi_penciuman' => 'required',
            'kulit' => 'required',
            'tidur_istirahat' => 'required',
            'mental' => 'required',
            'komunikasi' => 'required',
            'kebersihan_diri' => 'required',
            'perawatan_diri' => 'required',
            'labolatorium' => 'required',
            'radiologi' => 'required',
            'ekg' => 'required',
            'usg' => 'required',
            'unit_pelayanans_id' => 'required',
            'status' => 'required',
        ]);
        $imt = $request->bb / (($request->tb/100)*($request->tb/100));
        $kajian_pasien = new KajianPasien();
        $kajian_pasien->id = Uuid::uuid4()->getHex();
        $kajian_pasien->pasiens_no_rm = $request->pasiens_no_rm;
        $kajian_pasien->tanggal_pemeriksaan = $request->tanggal_pemeriksaan;
        $kajian_pasien->users_id = $request->users_id;
        $kajian_pasien->tensi = $request->tensi;
        $kajian_pasien->nadi = $request->nadi;
        $kajian_pasien->resp = $request->resp;
        $kajian_pasien->suhu = $request->suhu;
        $kajian_pasien->bb = $request->bb;
        $kajian_pasien->tb = $request->tb;
        $kajian_pasien->imt = number_format((float)$imt, 3, '.', '');
        $kajian_pasien->sirkulasi_cairan = json_encode($request->sirkulasi_cairan);
        $kajian_pasien->perkemihan = json_encode($request->perkemihan);
        $kajian_pasien->pernapasan = json_encode($request->pernapasan);
        $kajian_pasien->pencernaan = json_encode($request->pencernaan);
        $kajian_pasien->muskuloskeletal = json_encode($request->muskuloskeletal);
        $kajian_pasien->fungsi_penglihatan = json_encode($request->fungsi_penglihatan);
        $kajian_pasien->fungsi_pendengaran = json_encode($request->fungsi_pendengaran);
        $kajian_pasien->fungsi_perasa = json_encode($request->fungsi_perasa);
        $kajian_pasien->fungsi_perabaan = json_encode($request->fungsi_perabaan);
        $kajian_pasien->fungsi_penciuman = json_encode($request->fungsi_penciuman);
        $kajian_pasien->kulit = json_encode($request->kulit);
        $kajian_pasien->tidur_istirahat = json_encode($request->tidur_istirahat);
        $kajian_pasien->mental = json_encode($request->mental);
        $kajian_pasien->komunikasi = json_encode($request->komunikasi);
        $kajian_pasien->kebersihan_diri = json_encode($request->kebersihan_diri);
        $kajian_pasien->perawatan_diri = json_encode($request->perawatan_diri);
        $kajian_pasien->labolatorium = $request->labolatorium;
        $kajian_pasien->radiologi = $request->radiologi;
        $kajian_pasien->ekg = $request->ekg;
        $kajian_pasien->usg = $request->usg;
        $kajian_pasien->unit_pelayanans_id = $request->unit_pelayanans_id;
        $kajian_pasien->status = $request->status;
        $kajian_pasien->save();
        return redirect()->route('kajian-pasiens.index')->with('success', 'Kajian Pasien Berhasil Ditambakan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KajianPasien  $kajianPasien
     * @return \Illuminate\Http\Response
     */
    public function show(KajianPasien $kajianPasien)
    {
        return view('kajian_pasiens.show', [
            'title' => 'Detail Kajian Pasien',
            'kajian_pasiens' => $kajianPasien
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KajianPasien  $kajianPasien
     * @return \Illuminate\Http\Response
     */
    public function edit(KajianPasien $kajianPasien)
    {
        return view('kajian_pasiens.edit', [
            'title' => 'Edit Kajian Pasien',
            'kajian_pasien' => $kajianPasien,
            'pasiens' => Pasiens::all(),
            'perawats' => User::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKajianPasienRequest  $request
     * @param  \App\Models\KajianPasien  $kajianPasien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KajianPasien $kajianPasien)
    {
        $rules = [
            'pasiens_no_rm' => 'required',
            'tanggal_pemeriksaan' => 'required',
            'users_id' => 'required',
            'tensi' => 'required',
            'nadi' => 'required',
            'resp' => 'required',
            'suhu' => 'required',
            'bb' => 'required',
            'tb' => 'required',
            'imt' => 'required',
        ];

        $validatedData = $request->validate($rules);
        KajianPasien::where('id', $kajianPasien->id)->update($validatedData);
        return redirect()->route('kajian-pasiens.index')->with('success', 'Kajian Pasien Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KajianPasien  $kajianPasien
     * @return \Illuminate\Http\Response
     */
    public function destroy(KajianPasien $kajianPasien)
    {
        KajianPasien::destroy($kajianPasien->id);
        return redirect()->route('kajian-pasiens.index')->with('success', 'Kajian Pasien Berhasil Dihapus');
    }

    public function pdf(KajianPasien $kajianPasien)
    {
        // dd($kajianPasien);
        $pdf = Pdf::loadView('kajian_pasiens.print', ['kajianPasien' => ($kajianPasien), 'title' => 'Kajian Pasien'])->setPaper('a4');
        // return $pdf->download('pasienPDF.pdf');
        return $pdf->stream('kajian-pasienPDF.pdf');
    }
}
