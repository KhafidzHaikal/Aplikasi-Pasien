<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsuhanKeperawatan extends Model
{
    use HasFactory;

    protected $table = 'asuhan_keperawatans';

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $casts = [
        'id' => 'string',
    ];

    protected $keyType = 'string';

    protected $guarded = [
        'created_at', 'updated_at'
    ];

    protected $dates = ['tanggal_pengkajian'];

    public function diagnosas()
    {
        return $this->belongsTo(Diagnosa::class);
    }

    public function pelayanan_pasiens()
    {
        return $this->belongsTo(PelayananPasien::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function kajian_pasiens()
    {
        return $this->belongsTo(KajianPasien::class);
    }

    public function unit_pelayanans()
    {
        return $this->belongsTo(UnitPelayanan::class);
    }

    public function icds()
    {
        return $this->belongsTo(Icd::class);
    }
}
