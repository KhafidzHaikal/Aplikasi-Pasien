<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $table = 'obats';

    protected $primaryKey = 'no_obat';

    public $incrementing = false;

    protected $casts = [
        'no_obat' => 'string',
    ];

    protected $keyType = 'string';

    // protected $fillable = [
    //     'no_obat', 'tanggal_masuk', 'name', 'sediaan', 'stok_lama', 'stok_baru', 'tanggal_kadaluarsa', 'harga'
    // ];

    protected $guarded = [
        'created_at', 'updated_at'
    ];

    protected $dates = ['tanggal_masuk', 'tanggal_kadaluarsa'];


    public function getFormulaCalculationAttribute()
    {
        $obat_masuk = ObatMasuk::find($this->no_obat);

        return (($this->harga) * ($this->stok_lama));
    }

    public function getJumlahStokBaruAttribute()
    {
        return (($this->harga) * ($this->stok_baru));
    }

    public function getJumlahSisaObatAttribute()
    {
        return (($this->harga) * ($this->total_stok));
    }

    public function getTotalStokAttribute()
    {
        return (($this->stok_lama) - ($this->stok_baru));
    }

    public function farmasi_pasiens()
    {
        return $this->belongsTo(FarmasiPasien::class);
    }

    public function pelayanan_pasiens()
    {
        return $this->belongsTo(PelayananPasien::class);
    }

    public function obat_masuks()
    {
        return $this->belongsTo(ObatMasuk::class);
    }
}
