<?php

namespace App\Http\Controllers;

use App\Models\Diagnosa;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDiagnosaRequest;
use App\Http\Requests\UpdateDiagnosaRequest;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class DiagnosaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.diagnosa.index', [
            'title' => 'Diagnosa',
            'diagnosas' => Diagnosa::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.diagnosa.create', [
            'title' => 'Tambah Diagnosa'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDiagnosaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_sdki' => 'required|unique:diagnosas,kode_sdki',
            'nama_sdki' => 'required|unique:diagnosas,nama_sdki',
        ]);

        // $config = ['table' => 'diagnosas', 'length' => 6, 'prefix' => 'D.'];
        // $kode_sdki = IdGenerator::generate($config);

        // $diagnosa = new Diagnosa();
        // $diagnosa->kode_sdki = $kode_sdki;
        // $diagnosa->nama_sdki = $request->nama_sdki;
        // $diagnosa->save();

        Diagnosa::create($validatedData);
        return redirect()->route('admin-diagnosa.index')->with('success', 'Diagnosa Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Diagnosa  $diagnosa
     * @return \Illuminate\Http\Response
     */
    public function show(Diagnosa $diagnosa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Diagnosa  $diagnosa
     * @return \Illuminate\Http\Response
     */
    public function edit(Diagnosa $diagnosa)
    {
        return view('admin.diagnosa.edit', [
            'title' => 'Edit Diagnosa',
            'diagnosa' => $diagnosa
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDiagnosaRequest  $request
     * @param  \App\Models\Diagnosa  $diagnosa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Diagnosa $diagnosa)
    {
        $rules = [];

        if ($diagnosa->kode_sdki != $request->kode_sdki || $diagnosa->nama_sdki != $request->nama_sdki) {
            $diagnosa->kode_sdki = $request->kode_sdki;
            $diagnosa->nama_sdki = $request->nama_sdki;
            $diagnosa->save();
        return redirect()->route('admin-diagnosa.index')->with('success', 'Diagnosa Berhasil Diubah');

        } else {
            return back()->withErrors(['Kode / Nama Diagnosa Sudah Ada']);
        }

        // $validatedData = $request->validate($rules);
        // Diagnosa::where('kode_sdki', $diagnosa->kode_sdki)->update([$validatedData]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Diagnosa  $diagnosa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diagnosa $diagnosa)
    {
        Diagnosa::destroy($diagnosa->kode_diagnosa);
        return redirect()->route('admin-diagnosa.index')->with('success', 'Diagnosa Berhasil Dihapus');
    }
}
