<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Pasiens;
use App\Models\UnitPelayanan;
use App\Models\PelayananPasien;
use App\Models\UnitPelayananBpUmum;
Use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KajianPasien extends Model
{
    use HasFactory;

    protected $table = 'kajian_pasiens';

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $casts = [
        'id' => 'string',
    ];

    protected $keyType = 'string';

    protected $guarded = [
        'created_at', 'updated_at'
    ];

    protected $dates = ['tanggal_pemeriksaan'];

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y');
    }

    protected function status(): Attribute
    {
        return new Attribute(
            get: fn ($value) => ["menunggu konfirmasi", "sedang diperiksa", "sudah diperiksa"][$value],
        );
    }

    public function pasiens()
    {
        return $this->belongsTo(Pasiens::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function pelayanan_pasiens()
    {
        return $this->hasMany(PelayananPasien::class);
    }

    public function unit_pelayanans()
    {
        return $this->belongsTo(UnitPelayanan::class);
    }

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
    
}
