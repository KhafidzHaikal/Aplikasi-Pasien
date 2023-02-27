<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Ramsey\Uuid\Uuid;
use App\Models\Diagnosa;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PelayananPasien;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\AsuhanKeperawatan;
use App\Http\Requests\StoreAsuhanKeperawatanRequest;
use App\Http\Requests\UpdateAsuhanKeperawatanRequest;

class AsuhanKeperawatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('asuhan_keperawatan.index', [
            'title' => 'Asuhan Keperawatan',
            'askeps' => AsuhanKeperawatan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $pelayanan_pasien = PelayananPasien::get();
        // dd($pelayanan_pasien);
        return view('asuhan_keperawatan.create', [
            'title' => 'Tambah Asuhan Keperawatan',
            'pelayanan_pasiens' => PelayananPasien::get()
        ]);
    }

    public function periksa(PelayananPasien $pelayanan_pasien)
    {
        return view('asuhan_keperawatan.periksa', [
            'title' => 'Periksa Askep Pasien',
            'pelayanan_pasien' => $pelayanan_pasien,
            'users' => User::all(),
            'diagnosas' => Diagnosa::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAsuhanKeperawatanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'id' => 'required',
            'pelayanan_pasiens_id' => 'required',
            'tanggal_pengkajian' => 'required',
            'users_id' => 'required',
            'data_obyektif' => 'required',
            'data_subyektif' => 'required',
            'hasil_penunjang' => 'required',
            'diagnosas_kode_sdki' => 'required',
            'tujuan' => 'required',
            'intervensi' => 'required',
            'implementasi' => 'required',
            'subyektif' => 'required',
            'obyektif' => 'required',
            'assesment' => 'required',
            'planning' => 'required',
        ];

        $pelayanan_pasien = PelayananPasien::find($request->pelayanan_pasiens_id);
        $pelayanan_pasien->statusAskep = 1;
        // dd($pelayanan_pasien->statusAskep);
        $pelayanan_pasien->save();

        $askep = new AsuhanKeperawatan();
        $askep->id = Uuid::uuid4()->getHex();
        $askep->pelayanan_pasiens_id = $request->pelayanan_pasiens_id;
        $askep->tanggal_pengkajian = $request->tanggal_pengkajian;
        $askep->users_id = $request->users_id;
        $askep->data_obyektif = $request->data_obyektif;
        $askep->data_subyektif = $request->data_subyektif;
        $askep->hasil_penunjang = $request->hasil_penunjang;
        $askep->diagnosas_kode_sdki = $request->diagnosas_kode_sdki;
        $askep->tujuan = $request->tujuan;
        $askep->intervensi = $request->intervensi;
        $askep->implementasi = $request->implementasi;
        $askep->subyektif = $request->subyektif;
        $askep->obyektif = $request->obyektif;
        $askep->assesment = $request->assesment;
        $askep->planning = $request->planning;
        $askep->save();

        // $validatedData = $request->validate($rules);
        // AsuhanKeperawatan::create($validatedData);
        return redirect()->route('askep.index')->with('success', 'Pasien Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AsuhanKeperawatan  $asuhanKeperawatan
     * @return \Illuminate\Http\Response
     */
    public function Detail(PelayananPasien $pelayanan_pasien)
    {
        return view('asuhan_keperawatan.detail', [
            'title' => 'Detail Pasien',
            'pelayanan_pasiens' => $pelayanan_pasien
        ]);
    }

    public function show(AsuhanKeperawatan $asuhanKeperawatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AsuhanKeperawatan  $asuhanKeperawatan
     * @return \Illuminate\Http\Response
     */
    public function edit(AsuhanKeperawatan $askep)
    {
        return view('asuhan_keperawatan.edit', [
            'title' => 'Edit Asuhan Keperawatan',
            'askep' => $askep,
            'users' => User::all(),
            'diagnosas' => Diagnosa::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAsuhanKeperawatanRequest  $request
     * @param  \App\Models\AsuhanKeperawatan  $asuhanKeperawatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AsuhanKeperawatan $askep)
    {
        $rules = [
            'pelayanan_pasiens_id' => 'required',
            'tanggal_pengkajian' => 'required',
            'users_id' => 'required',
            'data_obyektif' => 'required',
            'data_subyektif' => 'required',
            'hasil_penunjang' => 'required',
            'diagnosas_kode_sdki' => 'required',
            'tujuan' => 'required',
            'intervensi' => 'required',
            'implementasi' => 'required',
            'subyektif' => 'required',
            'obyektif' => 'required',
            'assesment' => 'required',
            'planning' => 'required',
        ];

        $validatedData = $request->validate($rules);
        AsuhanKeperawatan::where('id', $askep->id)->update($validatedData);
        return redirect()->route('askep.index')->with('success', 'Pasien Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AsuhanKeperawatan  $asuhanKeperawatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(AsuhanKeperawatan $askep)
    {
        AsuhanKeperawatan::destroy($askep->id);
        return redirect()->route('askep.index')->with('success', 'Pasien Berhasil Dihapus');
    }

    public function pdf(AsuhanKeperawatan $askep)
    {
        $date = Carbon::now()->translatedFormat('d F Y H:i:s');
        $pdf = Pdf::loadView('asuhan_keperawatan.print', ['askep' => ($askep), 'date' => $date, 'title' => 'Asuhan Keperawatan'])->setPaper('a4');
        // return $pdf->download('pasienPDF.pdf');
        return $pdf->stream('Asuhan-Keperawatan.pdf');
    }

    public function print($tanggal_awal, $tanggal_akhir)
    {
        // dd($tanggal_awal, $tanggal_akhir);
        $askeps = AsuhanKeperawatan::with('pelayanan_pasiens','diagnosas','users','unit_pelayanans', 'icds', 'kajian_pasiens')->whereBetween('tanggal_pengkajian', [$tanggal_awal, $tanggal_akhir])->get();
        $date = Carbon::now()->translatedFormat('d F Y');
        $title = 'Laporan Asuhan Keperawatan';
        $tanggal_awal = $tanggal_awal;
        $newTanggalAwal = Carbon::createFromFormat('Y-m-d', $tanggal_awal)->translatedFormat('d F Y');
        $tanggal_akhir = $tanggal_akhir;
        $newTanggalAkhir = Carbon::createFromFormat('Y-m-d', $tanggal_akhir)->translatedFormat('d F Y');
        // dd($pasiens);
        $pdf = Pdf::loadView('asuhan_keperawatan.pdf', compact('askeps', 'title', 'date', 'newTanggalAwal', 'newTanggalAkhir'))->setPaper('legal', 'landscape');
        return $pdf->stream('Laporan-Askep.pdf');
    }
}
