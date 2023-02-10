<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Pasiens;
use App\Models\UnitPelayanan;
use App\Models\PelayananPasien;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KajianPasien extends Model
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
}
