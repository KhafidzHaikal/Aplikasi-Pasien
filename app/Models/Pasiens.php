<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\KajianPasien;
use App\Models\UnitPelayananBpUmum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pasiens extends Model
{
    use HasFactory;

    protected $table = 'pasiens';

    protected $primaryKey = 'no_rm';

    public $incrementing = false;

    protected $casts = [
        'no_rm' => 'string',
    ];

    protected $keyType = 'string';

    protected $guarded = [
        'created_at', 'updated_at'
    ];

    protected $dates = ['tanggal_lahir', 'tanggal_kunjungan'];

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y');
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function kajian_pasiens()
    {
        return $this->hasMany(KajianPasien::class);
    }

    public function unit_pelayanans()
    {
        return $this->belongsTo(UnitPelayanan::class);
    }

    public function pelayanan_pasiens()
    {
        return $this->hasMany(PelayananPasien::class);
    }

    public function unit_pelayanan_bp_umums()
    {
        return $this->belongsTo(UnitPelayananBpUmum::class);
    }

    public function unit_pelayanan_bp_gigis()
    {
        return $this->belongsTo(UnitPelayananBpGigi::class);
    }

    public function unit_pelayanan_bp_lansias()
    {
        return $this->belongsTo(UnitPelayananBpLansia::class);
    }

    public function unit_pelayanan_kias()
    {
        return $this->belongsTo(UnitPelayananKia::class);
    }

    public function unit_pelayanan_mtbs()
    {
        return $this->belongsTo(UnitPelayananMtbs::class);
    }

    public function unit_pelayanan_konselings()
    {
        return $this->belongsTo(UnitPelayananKonseling::class);
    }
}
