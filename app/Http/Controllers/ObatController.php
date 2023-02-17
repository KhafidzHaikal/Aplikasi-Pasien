<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Obat;
use Illuminate\Http\Request;
use App\Models\PelayananPasien;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Requests\StoreObatRequest;
use App\Http\Requests\UpdateObatRequest;
use App\Models\FarmasiPasien;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->type == 'admin') {
            return view('admin.obat.index', [
                'title' => 'Obat',
                'obats' => Obat::all()
            ]);
        } else {
            return view('obat.index', [
                'title' => 'Obat',
                'obats' => Obat::all()
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(PelayananPasien $pelayananPasien)
    {
        if (auth()->user()->type == 'admin') {
            return view('admin.obat.create', [
                'title' => 'Tambah Obat',
                'pelayanan_pasien' => $pelayananPasien
            ]);
        } else {
            return view('obat.create', [
                'title' => 'Tambah Obat',
                'pelayanan_pasien' => $pelayananPasien
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreObatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'tanggal_masuk' => 'required',
            'name' => 'required',
            'sediaan' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'tanggal_kadaluarsa' => 'required',
        ];

        // $this->decreaseStok();

        $validatedData = $request->validate($rules);
        Obat::create($validatedData);
        if (auth()->user()->type == 'admin') {
            return redirect()->route('admin-obat.index')->with('success', 'Obat Berhasil Ditambahkan');
        } else {
            return redirect()->route('obat.index')->with('success', 'Obat Berhasil Ditambahkan');
        }
    }

    // public function decreaseStok()
    // {
    //     foreach (FarmasiPasien::content() as $item)  
    //     {
    //         $obat = Obat::find($item->id);

    //         $obat->update(['stok' => $obat->stok - $item->stok]);
    //     }
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function show(Obat $obat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function edit(Obat $obat)
    {
        if (auth()->user()->type == 'admin') {
            return view('admin.obat.edit', [
                'title' => 'Edit Obat',
                'obat' => $obat
            ]);
        } else {
            return view('obat.edit', [
                'title' => 'Edit Obat',
                'obat' => $obat
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateObatRequest  $request
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Obat $obat)
    {
        $rules = [
            'tanggal_masuk' => 'required',
            'name' => 'required',
            'sediaan' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'tanggal_kadaluarsa' => 'required',
        ];

        $validatedData = $request->validate($rules);
        Obat::where('id', $obat->id)->update($validatedData);
        if (auth()->user()->type == 'admin') {
            return redirect()->route('admin-obat.index')->with('success', 'Obat Berhasil Diubah');
        } else {
            return redirect()->route('obat.index')->with('success', 'Obat Berhasil Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Obat $obat)
    {
        Obat::destroy($obat->id);
        if (auth()->user()->type == 'admin') {
            return redirect()->route('admin-obat.index')->with('success', 'Obat Berhasil Dihapus');
        } else {
            return redirect()->route('obat.index')->with('success', 'Obat Berhasil Dihapus');
        }
    }

    public function print($tanggal_awal, $tanggal_akhir)
    {
        // dd($tanggal_awal, $tanggal_akhir);
        $obats = Obat::whereBetween('tanggal_masuk', [$tanggal_awal, $tanggal_akhir])->get();
        $date = Carbon::now()->format('d-m-Y');
        $tanggal_awal = $tanggal_awal;
        $newTanggalAwal = Carbon::createFromFormat('Y-m-d', $tanggal_awal)->format('d-m-Y');
        $tanggal_akhir = $tanggal_akhir;
        $newTanggalAkhir = Carbon::createFromFormat('Y-m-d', $tanggal_akhir)->format('d-m-Y');
        // dd($obats);
        $pdf = Pdf::loadView('admin.obat.pdf', compact('obats', 'date', 'newTanggalAwal', 'newTanggalAkhir'))->setPaper('legal', 'landscape');
        return $pdf->stream('Laporan-Obat.pdf');
    }
}
