<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FarmasiPasien extends Model
{
    use HasFactory;

    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    public function obats()
    {
        return $this->hasMany(Obat::class);
    }

    public function pelayanan_pasiens()
    {
        return $this->belongsTo(PelayananPasien::class);
    }
}
