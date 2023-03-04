<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Obat;
use App\Models\User;
use App\Models\ObatKeluar;
use Illuminate\Http\Request;
use App\Models\FarmasiPasien;
use App\Models\PelayananPasien;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
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
                'pelayanan_pasiens' => PelayananPasien::latest()->get()
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
                'obats' => Obat::all(),
                'perawats' => User::all(),
            ]);
        } else {
            return view('farmasi.periksa', [
                'title' => 'Obat Pasien',
                'pelayanan_pasien' => $pelayanan_pasien,
                'obats' => Obat::all(),
                'perawats' => User::all(),
            ]);
        }
    }

    public function store(Request $request)
    {
        $obat = Obat::find($request->obats_no_obat);
        $obatsatu = Obat::find($request->obatssatu_no_obat);
        $obatdua = Obat::find($request->obatsdua_no_obat);
        $obattiga = Obat::find($request->obatstiga_no_obat);
        $obatempat = Obat::find($request->obatsempat_no_obat);

        if ($obat->stok_lama < $request->stok) {
            return back()->withErrors(['Stok Obat Tidak Cukup']);
        } else {
            $rules = [
                'pelayanan_pasiens_id' => 'required',
                'users_id' => 'required',
                'tanggal_pelayanan' => 'required',
                'obats_no_obat'  => 'required',
                'dosis'  => 'required',
                'stok'  => 'required',
                'obatssatu_no_obat'  => 'nullable',
                'dosissatu'  => 'nullable',
                'stoksatu'  => 'nullable',
                'obatsdua_no_obat'  => 'nullable',
                'dosisdua'  => 'nullable',
                'stokdua'  => 'nullable',
                'obatstiga_no_obat'  => 'nullable',
                'dosistiga'  => 'nullable',
                'stoktiga'  => 'nullable',
                'obatsempat_no_obat'  => 'nullable',
                'dosisempat'  => 'nullable',
                'stokempat'  => 'nullable',
            ];

            // $farmasi = new FarmasiPasien();
            // $farmasi->pelayanan_pasiens_id = $request->pelayanan_pasiens_id;
            // $farmasi->users_id = $request->users_id;
            // $farmasi->tanggal_pelayanan = $request->tanggal_pelayanan;
            // $farmasi->obats_no_obat = $request->obats_no_obat;
            // $farmasi->dosis = $request->dosis;
            // $farmasi->stok = $request->stok;
            // if ($request->obatssatu_no_obat != null) {
            //     $farmasi->obatssatu_no_obat = $request->obatssatu_no_obat;
            //     $farmasi->dosissatu = $request->dosissatu;
            //     $farmasi->stoksatu = $request->stoksatu;
            //     if ($request->obatsdua_no_obat != null) {
            //         $farmasi->obatsdua_no_obat = $request->obatsdua_no_obat;
            //         $farmasi->dosisdua = $request->dosisdua;
            //         $farmasi->stokdua = $request->stokdua;
            //         if ($request->obatstiga_no_obat != null) {
            //             $farmasi->obatstiga_no_obat = $request->obatstiga_no_obat;
            //             $farmasi->dosistiga = $request->dosistiga;
            //             $farmasi->stoktiga = $request->stoktiga;
            //             if ($request->obatsempat_no_obat != null) {
            //                 $farmasi->obatsempat_no_obat = $request->obatsempat_no_obat;
            //                 $farmasi->dosisempat = $request->dosisempat;
            //                 $farmasi->stokempat = $request->stokempat;
            //             } else {
            //                 $farmasi->obatsempat_no_obat = $request->get('obatsempat_no_obat', null);
            //             }
            //         } else {
            //             $farmasi->obatstiga_no_obat = $request->get('obatstiga_no_obat', null);
            //         }
            //     } else {
            //         $farmasi->obatsdua_no_obat = $request->get('obatsdua_no_obat', null);
            //     }
            // }
            // // dd($farmasi->obatstiga_no_obat);
            // $farmasi->save();
            // dd($obat);
            $pelayanan_pasien = PelayananPasien::find($request->pelayanan_pasiens_id);
            $pelayanan_pasien->status = 2;
            $pelayanan_pasien->update();

            /** TRANSACTION */
            DB::transaction(function () use ($obat, $request, $obatsatu, $obatdua, $obattiga, $obatempat) {
                $obat->stok_baru += $request->stok;
                $obat->save();

                $stok_keluar = new ObatKeluar();
                $stok_keluar->tanggal_keluar = $request->tanggal_pelayanan;
                $stok_keluar->obats_no_obat = $request->obats_no_obat;
                $stok_keluar->stok = $request->stok;
                $stok_keluar->save();

                if ($obatsatu != null) {
                    if ($obatsatu->stok_lama < $request->stoksatu) {
                        return back()->withErrors(['Stok Obat Tidak Cukup']);
                    } else {
                        $obatsatu->stok_baru = $obatsatu->stok_baru + $request->stoksatu;
                        $obatsatu->save();

                        $stok_keluar->tanggal_keluar = $request->tanggal_pelayanan;
                        $stok_keluar->obats_no_obat = $request->obatssatu_no_obat;
                        $stok_keluar->stok = $request->stoksatu;
                        $stok_keluar->save();
                    }
                }

                if ($obatdua != null) {
                    if ($obatdua->stok_lama < $request->stokdua) {
                        return back()->withErrors(['Stok Obat Tidak Cukup']);
                    } else {
                        $obatdua->stok_baru += $request->stokdua;
                        $obatdua->save();

                        $stok_keluar->tanggal_keluar = $request->tanggal_pelayanan;
                        $stok_keluar->obats_no_obat = $request->obatsdua_no_obat;
                        $stok_keluar->stok = $request->stokdua;
                        $stok_keluar->save();
                    }
                }

                if ($obattiga != null) {
                    if ($obattiga->stok_lama < $request->stoktiga) {
                        return back()->withErrors(['Stok Obat Tidak Cukup']);
                    } else {
                        $obattiga->stok_baru += $request->stoktiga;
                        $obattiga->save();

                        $stok_keluar->tanggal_keluar = $request->tanggal_pelayanan;
                        $stok_keluar->obats_no_obat = $request->obatstiga_no_obat;
                        $stok_keluar->stok = $request->stoktiga;
                        $stok_keluar->save();
                    }
                }

                if ($obatempat != null) {
                    if ($obatempat->stok_lama < $request->stokempat) {
                        return back()->withErrors(['Stok Obat Tidak Cukup']);
                    } else {
                        $obatempat->stok_baru += $request->stokempat;
                        $obatempat->save();

                        $stok_keluar->tanggal_keluar = $request->tanggal_pelayanan;
                        $stok_keluar->obats_no_obat = $request->obatsempat_no_obat;
                        $stok_keluar->stok = $request->stokempat;
                        $stok_keluar->save();
                    }
                }
            });
            /** TRANSACTION */

            $validatedData = $request->validate($rules);
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
        $farmasis = FarmasiPasien::with('users', 'obats', 'kajian_pasiens', 'pasiens', 'unit_pelayanans', 'pelayanan_pasiens')->orderBy('tanggal_pelayanan')->whereBetween('tanggal_pelayanan', [$tanggal_awal, $tanggal_akhir])->get();
        // dd($farmasis);
        $obats = Obat::all();
        $date = Carbon::now()->translatedFormat('d F Y H:i:s');
        $title = 'Laporan Farmasi';
        $tanggal_awal = $tanggal_awal;
        $newTanggalAwal = Carbon::createFromFormat('Y-m-d', $tanggal_awal)->translatedFormat('d F Y');
        $tanggal_akhir = $tanggal_akhir;
        $newTanggalAkhir = Carbon::createFromFormat('Y-m-d', $tanggal_akhir)->translatedFormat('d F Y');
        $pdf = Pdf::loadView('admin.farmasi.pdf', compact('farmasis', 'title', 'obats', 'date', 'newTanggalAwal', 'newTanggalAkhir'))->setPaper('legal', 'landscape');
        return $pdf->stream('Laporan-Farmasi.pdf');
    }
}
