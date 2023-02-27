<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Obat;
use App\Models\ObatMasuk;
use Illuminate\Http\Request;
use App\Models\FarmasiPasien;
use App\Models\PelayananPasien;
use Barryvdh\DomPDF\Facade\Pdf;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Obat $obat)
    {
        if (auth()->user()->type == 'admin') {
            return view('admin.obat.index', [
                'title' => 'Obat',
                'obats' => Obat::all(),
                'obat' => $obat
            ]);
        } else {
            return view('obat.index', [
                'title' => 'Obat',
                'obats' => Obat::all(),
                'obat' => $obat
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
        $request->validate([
            'no_obat' => 'required|unique:obats,no_obat',
            'tanggal_masuk' => 'required',
            'name' => 'required',
            'sediaan' => 'required',
            'harga' => 'required',
            'stok_lama' => 'required',
            'stok_baru' => 'required',
            'tanggal_kadaluarsa' => 'required',
            'sumber_dana' => 'required',
        ]);

        $obat = new Obat();
        $obat->no_obat = $request->no_obat;
        $obat->tanggal_masuk = $request->tanggal_masuk;
        $obat->name = $request->name;
        $obat->sediaan = $request->sediaan;
        $obat->harga = $request->harga;
        $obat->stok_lama = $request->stok_lama;
        $obat->stok_baru = $request->stok_baru;
        $obat->tanggal_kadaluarsa = $request->tanggal_kadaluarsa;
        $obat->sumber_dana = $request->sumber_dana;
        // dd($obat);
        $obat->save();

        $obat_masuk = new ObatMasuk();
        $obat_masuk->tanggal_masuk = $obat->tanggal_masuk;
        $obat_masuk->obats_no_obat = $obat->no_obat;
        $obat_masuk->stok = $obat->stok_lama;
        $obat_masuk->sumber_dana = $obat->sumber_dana;
        $obat_masuk->save();

        if (auth()->user()->type == 'admin') {
            return redirect()->route('admin-obat.index')->with('success', 'Obat Berhasil Ditambahkan');
        } else {
            return redirect()->route('obat.index')->with('success', 'Obat Berhasil Ditambahkan');
        }
    }

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
        $request->validate([
            'tanggal_masuk' => 'required',
            'name' => 'required',
            'sediaan' => 'required',
            'harga' => 'required',
            // 'stok_lama' => 'required',
            'tanggal_kadaluarsa' => 'required',
        ]);

        $obat = Obat::find($obat->no_obat);
        $obat->tanggal_masuk = $request->tanggal_masuk;
        $obat->name = $request->name;
        $obat->sediaan = $request->sediaan;
        $obat->harga = $request->harga;
        // $obat->stok_lama += $request->stok_lama;
        $obat->tanggal_kadaluarsa = $request->tanggal_kadaluarsa;
        $obat->save();
        
        if (auth()->user()->type == 'admin') {
            return redirect()->route('admin-obat.index')->with('success', 'Obat Berhasil Diubah');
        } else {
            return redirect()->route('obat.index')->with('success', 'Obat Berhasil Diubah');
        }
    }

    public function addStok(Obat $obat)
    {   
        return view('admin.obat.addStok', [
            'title' => 'Tambah Stok Obat',
            'obat' => $obat
        ]);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Obat $obat)
    {
        // dd($obat->farmasi_pasiens()->count());
        if ($obat->farmasi_pasiens()->count())
        {
            return back()->withErrors(['error' => 'Obat Tidak Dapat Dihapus']);
            // return back()->with('error', 'Obat Tidak Dapat Dihapus');
        } 
        Obat::destroy($obat->no_obat);
        if (auth()->user()->type == 'admin') {
            return redirect()->route('admin-obat.index')->with('success', 'Obat Berhasil Dihapus');
        } else {
            return redirect()->route('obat.index')->with('success', 'Obat Berhasil Dihapus');
        }
    }

    public function print($tanggal_awal, $tanggal_akhir)
    {
        // dd($tanggal_awal, $tanggal_akhir);
        $obats = ObatMasuk::with('obats')->whereBetween('tanggal_masuk', [$tanggal_awal, $tanggal_akhir])->get();
        $obat_past = Obat::whereBetween('tanggal_masuk', [$tanggal_awal, $tanggal_akhir])->get();
        // dd($obats->total_obat);
        $date = Carbon::now()->translatedFormat('d F Y H:i:s');
        $title = 'Laporan Obat';
        $tanggal_awal = $tanggal_awal;
        $newTanggalAwal = Carbon::createFromFormat('Y-m-d', $tanggal_awal)->translatedFormat('d F Y');
        $tanggal_akhir = $tanggal_akhir;
        $newTanggalAkhir = Carbon::createFromFormat('Y-m-d', $tanggal_akhir)->translatedFormat('d F Y');
        $pdf = Pdf::loadView('admin.obat.pdf', compact('obats', 'title', 'obat_past', 'date', 'newTanggalAwal', 'newTanggalAkhir'))->setPaper('legal', 'landscape');
        return $pdf->stream('Laporan-Obat.pdf');
        // return $pdf->download('obat.pdf');
    }
}
