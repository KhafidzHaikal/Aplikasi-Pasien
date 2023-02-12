<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UnitPelayananBpUmum extends Model
{
    use HasFactory;

    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    protected $dates = ['tanggal_pemeriksaan'];

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
        return $this->hasMany(Pasiens::class);
    }

    public function icds()
    {
        return $this->belongsTo(Icd::class);
    }


}
