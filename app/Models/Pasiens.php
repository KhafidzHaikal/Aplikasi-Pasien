<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\KajianPasien;
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

    public function kajian_pasiens()
    {
        return $this->hasMany(KajianPasien::class);
    }

    public function pelayanan_pasiens()
    {
        return $this->hasMany(PelayananPasien::class);
    }
}
