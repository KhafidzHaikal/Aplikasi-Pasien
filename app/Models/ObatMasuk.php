<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObatMasuk extends Model
{
    use HasFactory;
    
    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    protected $dates = ['tanggal_masuk'];

    public function obats()
    {
        return $this->belongsTo(Obat::class, 'obats_no_obat');
    }

    public function getFormulaCalculationAttribute()
    {
        return (($this->obats->harga) * ($this->stok));
    }

    public function getTotalObatAttribute()
    {
        $total = ObatMasuk::find($this->no_obat);
        // dd($total);
        return (($this->stok) + ($total->stok));
    }

    public function getTotalAttribute()
    {
        $count = ObatMasuk::join('obats', 'obat_masuks.obats_no_obat', '=', 'obats.no_obat')->count();
        dd($count);
        return $count;
    }

    public function getTotalStokAttribute()
    {
        return (($this->obats->stok_lama) - ($this->obats->stok_baru));
    }

}
