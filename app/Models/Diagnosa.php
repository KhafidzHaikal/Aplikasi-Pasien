<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosa extends Model
{
    use HasFactory;

    protected $table = 'diagnosas';

    protected $primaryKey = 'kode_sdki';

    public $incrementing = false;

    protected $casts = [
        'kode_sdki' => 'string',
    ];

    protected $keyType = 'string';

    public $timestamps = false;
    
    protected $fillble = ['kode_sdki', 'nama_sdki'];

    public function asuhan_keperawatans()
    {
        return $this->belongsTo(AsuhanKeperawatan::class);
    }
}
