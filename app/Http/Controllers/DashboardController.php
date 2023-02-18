<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Pasiens;
use App\Models\KajianPasien;
use Illuminate\Http\Request;
use App\Models\FarmasiPasien;
use App\Models\PelayananPasien;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'title' => 'Dashboard',
            'pasiens' => $this->jumlahPasien(),
            'kajianPasiens' => $this->jumlahKajianPasien(),
            'bpUmum' => $this->jumlahBpUmum(),
            'bpGigi' => $this->jumlahBpGigi(),
            'bpLansia' => $this->jumlahBpLansia(),
            'kia' => $this->jumlahKia(),
            'mtbs' => $this->jumlahMtbs(),
            'konseling' => $this->jumlahKonseling(),
            'obat' => $this->jumlahFarmasi(),
            'farmasi' => $this->jumlahObat(),
        ]);
    }

    public function jumlahPasien()
    {
        $jumlah = Pasiens::count();
        return $jumlah;
    }

    public function jumlahKajianPasien()
    {
        $jumlah = KajianPasien::count();
        return $jumlah;
    }

    public function jumlahBpUmum()
    {
        $jumlah = PelayananPasien::where('unit_pelayanans_id', '=', 1)->count();
        return $jumlah;
    }
    public function jumlahBpGigi()
    {
        $jumlah = PelayananPasien::where('unit_pelayanans_id', '=', 2)->count();
        return $jumlah;
    }
    public function jumlahBpLansia()
    {
        $jumlah = PelayananPasien::where('unit_pelayanans_id', '=', 3)->count();
        return $jumlah;
    }
    public function jumlahKia()
    {
        $jumlah = PelayananPasien::where('unit_pelayanans_id', '=', 4)->count();
        return $jumlah;
    }
    public function jumlahMtbs()
    {
        $jumlah = PelayananPasien::where('unit_pelayanans_id', '=', 5)->count();
        return $jumlah;
    }
    public function jumlahKonseling()
    {
        $jumlah = PelayananPasien::where('unit_pelayanans_id', '=', 6)->count();
        return $jumlah;
    }
    public function jumlahFarmasi()
    {
        $jumlah = FarmasiPasien::count();
        return $jumlah;
    }
    public function jumlahObat()
    {
        $jumlah = Obat::count();
        return $jumlah;
    }
}
