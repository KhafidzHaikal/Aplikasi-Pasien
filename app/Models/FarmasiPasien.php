<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FarmasiPasien extends Model
{
    use HasFactory;

    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    protected $dates = ['tanggal_pelayanan'];

    public function obatssatu()
    {
        return $this->belongsTo(Obat::class, 'obatssatu_no_obat');
    }
    public function obatsdua()
    {
        return $this->belongsTo(Obat::class, 'obatsdua_no_obat');
    }
    public function obatstiga()
    {
        return $this->belongsTo(Obat::class, 'obatstiga_no_obat');
    }
    public function obatsempat()
    {
        return $this->belongsTo(Obat::class, 'obatsempat_no_obat');
    }

    public function obats()
    {
        return $this->belongsTo(Obat::class);
    }

    public function pelayanan_pasiens()
    {
        return $this->belongsTo(PelayananPasien::class);
    }

    public function kajian_pasiens()
    {
        return $this->belongsTo(KajianPasien::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function pasiens()
    {
        return $this->belongsTo(Pasiens::class);
    }

    public function unit_pelayanans()
    {
        return $this->belongsTo(UnitPelayanan::class);
    }
}
