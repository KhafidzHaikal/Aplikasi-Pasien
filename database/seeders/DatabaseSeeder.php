<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\KajianPasien;
use App\Models\Pasiens;
use App\Models\UnitPelayanan;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(100)->create();
        Pasiens::factory(100)->create();
        KajianPasien::factory(100)->create();
        
        User::create([
            'username' => 'Haikal',
            'name' => 'Muhamad Khafidz Haikal',
            'type' => '0',
            'email' => 'muhammadkhafidzhaikal@gmail.com',
            'password' => Hash::make('111111')
        ]);
        User::create([
            'username' => 'BP Umum',
            'name' => 'BP UMUM',
            'type' => '1',
            'email' => 'BPUMUMl@gmail.com',
            'password' => Hash::make('111111')
        ]);
        User::create([
            'username' => 'BP GIGI',
            'name' => 'BP GIGI',
            'type' => '2',
            'email' => 'BPGIGIl@gmail.com',
            'password' => Hash::make('111111')
        ]);
        User::create([
            'username' => 'BP LANSIA',
            'name' => 'BP LANSIA',
            'type' => '3',
            'email' => 'BPLANSIAl@gmail.com',
            'password' => Hash::make('111111')
        ]);
                

        UnitPelayanan::create([
            'name' => 'BP Umum',
        ]);
        UnitPelayanan::create([
            'name' => 'BP Gigi'
        ]);
        UnitPelayanan::create([
            'name' => 'BP Lansia'
        ]);
        UnitPelayanan::create([
            'name' => 'KIA'
        ]);
        UnitPelayanan::create([
            'name' => 'MTBS'
        ]);
        UnitPelayanan::create([
            'name' => 'Konseling'
        ]);
    }
}
