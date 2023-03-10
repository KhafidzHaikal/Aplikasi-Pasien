<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Icd extends Model
{
    use HasFactory;

    protected $table = 'icds';

    protected $primaryKey = 'kode_icd';

    public $incrementing = false;

    protected $casts = [
        'kode_icd' => 'string',
    ];

    protected $keyType = 'string';

    protected $fillable = [
        'kode_icd', 'nama_icd', 'nama_icd_indo'
    ];

    protected $guarded = [
        'created_at', 'updated_at'
    ];

    public function unit_pelayanan_bp_umums()
    {
        return $this->hasMany(UnitPelayananBpUmum::class);
    }

    public function unit_pelayanan_bp_gigis()
    {
        return $this->hasMany(UnitPelayananBpGigi::class);
    }

    public function unit_pelayanan_bp_lansias()
    {
        return $this->hasMany(UnitPelayananBpLansia::class);
    }

    public function unit_pelayanan_kias()
    {
        return $this->hasMany(UnitPelayananKia::class);
    }

    public function unit_pelayanan_mtbs()
    {
        return $this->hasMany(UnitPelayananMtbs::class);
    }

    public function unit_pelayanan_konselings()
    {
        return $this->hasMany(UnitPelayananKonseling::class);
    }

    public function pelayanan_pasiens()
    {
        return $this->hasMany(PelayananPasien::class);
    }
}
