<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Obat;
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
        $obat = Obat::find($request->obats_id);

        if ($obat->stok_lama < $request->stok) {
            
        } else {
            $validatedData = $request->validate([
                'pelayanan_pasiens_id' => 'required',
                'tanggal_pelayanan' => 'required',
                'obats_id'  => 'required',
                'dosis'  => 'required',
                'stok'  => 'required',
            ]);
            // $farmasi = new FarmasiPasien();
            // $farmasi->pelayanan_pasiens_id = $request->pelayanan_pasiens_id;
            // $farmasi->obats_id = json_encode($request->obats_id);
            // $farmasi->dosis = json_encode($request->dosis);
            // $farmasi->stok = json_encode($request->stok);
            // $farmasi->save();

            // $validatedData = $request->validate($rules);

            FarmasiPasien::create($validatedData);

            $obat->stok_baru += $request->stok;
            // dd($obat->stok_baru);
            $obat->save();
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
    public function update(UpdateFarmasiPasienRequest $request, FarmasiPasien $farmasiPasien)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FarmasiPasien  $farmasiPasien
     * @return \Illuminate\Http\Response
     */
    public function destroy(FarmasiPasien $farmasiPasien)
    {
        FarmasiPasien::destroy($farmasiPasien->id);
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
        $date = Carbon::now()->format('d-m-Y');
        $tanggal_awal = $tanggal_awal;
        $newTanggalAwal = Carbon::createFromFormat('Y-m-d', $tanggal_awal)->format('d-m-Y');
        $tanggal_akhir = $tanggal_akhir;
        $newTanggalAkhir = Carbon::createFromFormat('Y-m-d', $tanggal_akhir)->format('d-m-Y');
        $pdf = Pdf::loadView('admin.farmasi.pdf', compact('farmasis', 'date', 'newTanggalAwal', 'newTanggalAkhir'))->setPaper('legal', 'landscape');
        return $pdf->stream('Laporan-Farmasi.pdf');
    }
}
