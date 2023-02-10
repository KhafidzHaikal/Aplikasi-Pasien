<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\KajianPasien;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
}
