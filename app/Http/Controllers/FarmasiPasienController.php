<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Obat;
use App\Models\ObatKeluar;
use Illuminate\Http\Request;
use App\Models\FarmasiPasien;
use App\Models\PelayananPasien;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Requests\StoreFarmasiPasienRequest;
use App\Http\Requests\UpdateFarmasiPasienRequest;

class FarmasiPasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->type == 'admin') {
            return view('admin.farmasi.index', [
                'title' => 'Pelayanan Pasien Farmasi',
                'farmasis' => FarmasiPasien::latest()->get()
            ]);
        } else {
            return view('farmasi.index', [
                'title' => 'Pelayanan Pasien Farmasi',
                'farmasis' => FarmasiPasien::latest()->get()
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
            return view('admin.farmasi.create', [
                'title' => 'Tambah Pelayanan Pasien',
                'pelayanan_pasiens' => PelayananPasien::latest()->get()
            ]);
        } else {
            return view('farmasi.create', [
                'title' => 'Tambah Pelayanan Pasien',
                'pelayanan_pasiens' => PelayananPasien::all()
            ]);
        }
    }

    public function status(Request $request, PelayananPasien $pelayananPasien)
    {
        $rules = [
            'status' => 'required',
        ];

        $validatedData = $request->validate($rules);
        PelayananPasien::where('id', $pelayananPasien->id)->update($validatedData);
        if (auth()->user()->type == 'admin') {
            return redirect()->route('admin-farmasi.create')->with('success', 'Status Pasien Diubah');
        } else {
            return redirect()->route('farmasi.create')->with('success', 'Status Pasien Diubah');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFarmasiPasienRequest  $request
     * @return \Illuminate\Http\Response
     */

    public function periksa(PelayananPasien $pelayanan_pasien)
    {
        if (auth()->user()->type == 'admin') {
            return view('admin.farmasi.periksa', [
                'title' => 'Obat Pasien',
                'pelayanan_pasien' => $pelayanan_pasien,
                'obats' => Obat::all()
            ]);
        } else {
            return view('farmasi.periksa', [
                'title' => 'Obat Pasien',
                'pelayanan_pasien' => $pelayanan_pasien,
                'obats' => Obat::all()
            ]);
        }
    }

    public function store(Request $request)
    {
        $obat = Obat::find($request->obats_no_obat);
        // $obatsatu = Obat::find($request->obatssatu_no_obat);
        // $obatdua = Obat::find($request->obatsdua_no_obat);
        // $obattiga = Obat::find($request->obatstiga_no_obat);
        // $obatempat = Obat::find($request->obatsempat_no_obat);

        // dd($obatsatu->stok_lama, $obatdua->stok_lama, $obattiga, $obatempat);

        if ($obat->stok_lama < $request->stok) {
            return back()->withErrors(['Stok Obat Tidak Cukup']);
        } else {
            $validatedData = $request->validate([
                'pelayanan_pasiens_id' => 'required',
                'tanggal_pelayanan' => 'required',
                'obats_no_obat'  => 'required',
                'dosis'  => 'required',
                'stok'  => 'required',
            ]);

            // $pelayanan_pasien = PelayananPasien::find($request->pelayanan_pasiens_id);
            // // dd($pelayanan_pasien->status = 2);
            // $pelayanan_pasien->status = 2;
            // $pelayanan_pasien->update();

            $obat->stok_baru += $request->stok;
            // dd($obat->stok_baru);
            $obat->save();

            // if ($obatsatu != null) {
            //     if ($obatsatu->stok_lama < $request->stoksatu) {
            //         return back()->withErrors(['Stok Obat Tidak Cukup']);
            //     } else {
            //         $obatsatu->stok_baru += $request->stok;
            //         // dd($obatsatu->stok_baru);
            //         $obatsatu->save();
            //     }
            // }

            // if ($obatdua != null) {
            //     if ($obatdua->stok_lama < $request->stokdua) {
            //         return back()->withErrors(['Stok Obat Tidak Cukup']);
            //     } else {
            //         $obatdua->stok_baru += $request->stok;
            //         // dd($obatdua->stok_baru);
            //         $obatdua->save();
            //     }
            // }

            // if ($obattiga != null) {
            //     if ($obattiga->stok_lama < $request->stoktiga) {
            //         return back()->withErrors(['Stok Obat Tidak Cukup']);
            //     } else {
            //         $obattiga->stok_baru += $request->stok;
            //         // dd($obattiga->stok_baru);
            //         $obattiga->save();
            //     }
            // }

            // if ($obatempat != null) {
            //     if ($obatempat->stok_lama < $request->stokempat) {
            //         return back()->withErrors(['Stok Obat Tidak Cukup']);
            //     } else {
            //         $obatempat->stok_baru += $request->stok;
            //         // dd($obatempat->stok_baru);
            //         $obatempat->save();
            //     }
            // }

            $stok_keluar = new ObatKeluar();
            $stok_keluar->tanggal_keluar = $request->tanggal_pelayanan;
            $stok_keluar->obats_no_obat = $request->obats_no_obat;
            $stok_keluar->stok += $request->stok;
            // dd($obat, $obatsatu, $obatdua, $obattiga, $obatempat, $stok_keluar);
            $stok_keluar->save();

            // $obat_keluar = new ObatKeluar();
            // $obat_keluar->tanggal_keluar = $request->tanggal_pelayanan;
            // $obat_keluar->obats_no_obat = $request->obats_no_obat;
            // $obat_keluar->stok = $request->stok;
            // $obat_keluar->save();

            FarmasiPasien::create($validatedData);
            if (auth()->user()->type == 'admin') {
                return redirect()->route('admin-farmasi.index')->with('success', 'Pasien Berhasil Ditambahkan');
            } else {
                return redirect()->route('farmasi.index')->with('success', 'Pasien Berhasil Ditambahkan');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FarmasiPasien  $farmasiPasien
     * @return \Illuminate\Http\Response
     */
    public function show(FarmasiPasien $farmasiPasien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FarmasiPasien  $farmasiPasien
     * @return \Illuminate\Http\Response
     */
    public function edit(FarmasiPasien $farmasiPasien)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFarmasiPasienRequest  $request
     * @param  \App\Models\FarmasiPasien  $farmasiPasien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FarmasiPasien $farmasiPasien)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FarmasiPasien  $farmasiPasien
     * @return \Illuminate\Http\Response
     */
    public function destroy(FarmasiPasien $farmasi)
    {
        $pelayanan_pasien = PelayananPasien::find($farmasi->pelayanan_pasiens_id);
        // dd($pelayanan_pasien->status);
        $pelayanan_pasien->status = 0;
        $pelayanan_pasien->update();

        // $obat = Obat::find($farmasi->obats_no_obat);
        // $obat->stok_lama += $farmasi->obats->stok_baru;
        // $obat->save();
        // dd($obat->stok_lama += $farmasi->obats->stok_baru);

        FarmasiPasien::destroy($farmasi->id);
        if (auth()->user()->type == 'admin') {
            return redirect()->route('admin-farmasi.index')->with('success', 'Pasien Berhasil Dihapus');
        } else {
            return redirect()->route('farmasi.index')->with('success', 'Pasien Berhasil Dihapus');
        }
    }

    public function print($tanggal_awal, $tanggal_akhir)
    {
        // dd($tanggal_awal, $tanggal_akhir);
        $farmasis = FarmasiPasien::with('users', 'obats', 'kajian_pasiens', 'pasiens', 'unit_pelayanans', 'pelayanan_pasiens')->whereBetween('tanggal_pelayanan', [$tanggal_awal, $tanggal_akhir])->get();
        // dd($farmasis);
        $date = Carbon::now()->translatedFormat('d F Y H:i:s');
        $tanggal_awal = $tanggal_awal;
        $newTanggalAwal = Carbon::createFromFormat('Y-m-d', $tanggal_awal)->format('d-m-Y');
        $tanggal_akhir = $tanggal_akhir;
        $newTanggalAkhir = Carbon::createFromFormat('Y-m-d', $tanggal_akhir)->format('d-m-Y');
        $pdf = Pdf::loadView('admin.farmasi.pdf', compact('farmasis', 'date', 'newTanggalAwal', 'newTanggalAkhir'))->setPaper('legal', 'landscape');
        return $pdf->stream('Laporan-Farmasi.pdf');
    }
}
