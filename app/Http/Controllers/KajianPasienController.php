<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pasiens;
use App\Models\KajianPasien;
use Illuminate\Http\Request;
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
            'kajian_pasiens' => KajianPasien::all(),
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
            'perawats' => User::all()
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
        KajianPasien::create($validatedData);
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
        $pdf = Pdf::loadView('kajian_pasiens.print', ['kajian_pasiens' => ($kajianPasien)])->setPaper('a4');
        // return $pdf->download('pasienPDF.pdf');
        return $pdf->stream('kajian-pasienPDF.pdf');
    }
}
