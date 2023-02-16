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
        return $this->hasMany(Pasiens::class);
    }

    public function kajian_pasiens()
    {
        return $this->hasMany(KajianPasien::class);
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
