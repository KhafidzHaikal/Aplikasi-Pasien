<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
Use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\KajianPasien;
use Laravel\Sanctum\HasApiTokens;
use App\Models\UnitPelayananBpUmum;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'name',
        'email',
        'password',
        'type'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected function type(): Attribute
    {
        return new Attribute(
            get: fn ($value) => ["admin", "nurse", "bp-umum", "bp-gigi", "bp-lansia", "kia", "mtbs", "konseling", "farmasi"][$value],
        );
    }

    public function pasiens()
    {
        return $this->belongsTo(Pasiens::class);
    }

    public function kajian_pasiens()
    {
        return $this->belongsTo(KajianPasien::class);
    }

    public function pelayanan_pasiens()
    {
        return $this->belongsTo(PelayananPasien::class);
    }

    public function asuhan_keperawatans()
    {
        return $this->belongsTo(AsuhanKeperawatan::class);
    }

}
