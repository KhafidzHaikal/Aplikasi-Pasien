<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\KajianPasien;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
Use Illuminate\Database\Eloquent\Casts\Attribute;

class PelayananPasien extends Model
{
    use HasFactory;

    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    protected $dates = ['tanggal_pemeriksaan'];

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y');
    }

    protected function status(): Attribute
    {
        return new Attribute(
            get: fn ($value) => ["menunggu konfirmasi", "pencarian obat", "sudah ditebus"][$value],
        );
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

    public function icds()
    {
        return $this->belongsTo(Icd::class);
    }

    public function unit_pelayanans()
    {
        return $this->belongsTo(UnitPelayanan::class);
    }

    public function farmasi_pasiens()
    {
        return $this->belongsTo(FarmasiPasien::class);
    }

    public function obats()
    {
        return $this->hasMany(Obat::class);
    }
}
