<?php

namespace App\Http\Controllers;

use App\Models\Pasiens;
use App\Http\Requests\StorePasiensRequest;
use App\Http\Requests\UpdatePasiensRequest;
use Illuminate\Http\Request;

class PasiensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pasiens.index', [
            'title' => 'Pasiens',
            'pasiens' => Pasiens::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pasiens.create', [
            'title' => 'Tambah Pasien'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePasiensRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'no_rm' => 'required|unique:pasiens,no_rm',
            'tanggal_kunjungan' => 'required',
            'nama_petugas' => 'required',
            'name' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'nik' => 'required|unique:pasiens,nik',
            'nama_kk' => 'required',
            'alamat' => 'required',
            'pekerjaan' => 'required',
            'pendidikan' => 'required',
            'agama' => 'required',
            'status_perkawinan' => 'required',
            'pembiayaan' => 'required',
            'status_kunjungan' => 'required',
            'alergi_obat' => 'required',
        ]);

        Pasiens::create($validatedData);
        return redirect()->route('pasiens.index')->with('success', 'Pasien Berhasil Ditambakan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pasiens  $pasiens
     * @return \Illuminate\Http\Response
     */
    public function show(Pasiens $pasiens)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pasiens  $pasiens
     * @return \Illuminate\Http\Response
     */
    public function edit(Pasiens $pasien)
    {
        return view('pasiens.edit', [
            'title' => 'Edit Pasien',
            'pasien' => $pasien
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePasiensRequest  $request
     * @param  \App\Models\Pasiens  $pasiens
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePasiensRequest $request, Pasiens $pasiens)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pasiens  $pasiens
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pasiens $pasiens)
    {
        //
    }
}
