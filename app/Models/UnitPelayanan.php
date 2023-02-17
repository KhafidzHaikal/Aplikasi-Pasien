<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitPelayanan extends Model
{
    use HasFactory;

    public function kajian_pasiens()
    {
        $this->hasMany(KajianPasien::class);
    }

    public function pelayanan_pasiens()
    {
        $this->hasMany(PelayananPasien::class);
    }
}
