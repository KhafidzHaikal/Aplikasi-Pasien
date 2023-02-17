<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    protected $dates = ['tanggal_masuk', 'tanggal_kadaluarsa'];

    public function getFormulaCalculationAttribute()
    {
        return (($this->harga)*($this->stok));
    }

    public function farmasi_pasiens()
    {
        return $this->hasMany(FarmasiPasien::class);
    }

    public function pelayanan_pasiens()
    {
        return $this->belongsTo(PelayananPasien::class);
    }
}
