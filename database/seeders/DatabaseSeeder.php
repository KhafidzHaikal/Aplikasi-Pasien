<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Obat;
use App\Models\User;
use Ramsey\Uuid\Uuid;
use App\Models\Pasiens;
use App\Models\KajianPasien;
use App\Models\UnitPelayanan;
use App\Models\PelayananPasien;
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
        // Pasiens::factory(50)->create();
        // KajianPasien::factory(50)->create();
        $this->call(IcdSeeder::class);
        $this->call(DiagnosaSeeder::class);
        // PelayananPasien::factory(30)->create();
        // Obat::factory(10)->create();

        User::create([
            'id' => Uuid::uuid4()->getHex(),
            'username' => 'Haikal',
            'name' => 'Muhamad Khafidz Haikal',
            'type' => '0',
            'email' => 'muhammadkhafidzhaikal@gmail.com',
            'password' => Hash::make('111111')
        ]);
        User::create([
            'id' => Uuid::uuid4()->getHex(),
            'username' => 'Nurse',
            'name' => 'Nurse',
            'type' => '1',
            'email' => 'Nurse@gmail.com',
            'password' => Hash::make('111111')
        ]);
        User::create([
            'id' => Uuid::uuid4()->getHex(),
            'username' => 'BP Umum',
            'name' => 'BP UMUM',
            'type' => '2',
            'email' => 'BPUMUM@gmail.com',
            'password' => Hash::make('111111')
        ]);
        User::create([
            'id' => Uuid::uuid4()->getHex(),
            'username' => 'BP GIGI',
            'name' => 'BP GIGI',
            'type' => '3',
            'email' => 'BPGIGI@gmail.com',
            'password' => Hash::make('111111')
        ]);
        User::create([
            'id' => Uuid::uuid4()->getHex(),
            'username' => 'BP LANSIA',
            'name' => 'BP LANSIA',
            'type' => '4',
            'email' => 'BPLANSIA@gmail.com',
            'password' => Hash::make('111111')
        ]);
        User::create([
            'id' => Uuid::uuid4()->getHex(),
            'username' => 'KIA',
            'name' => 'KIA',
            'type' => '5',
            'email' => 'KIAgmail.com',
            'password' => Hash::make('111111')
        ]);
        User::create([
            'id' => Uuid::uuid4()->getHex(),
            'username' => 'MTBS',
            'name' => 'MTBS',
            'type' => '6',
            'email' => 'MTBS@gmail.com',
            'password' => Hash::make('111111')
        ]);
        User::create([
            'id' => Uuid::uuid4()->getHex(),
            'username' => 'Konseling',
            'name' => 'Konseling',
            'type' => '7',
            'email' => 'Konseling@gmail.com',
            'password' => Hash::make('111111')
        ]);
        User::create([
            'id' => Uuid::uuid4()->getHex(),
            'username' => 'Farmasi',
            'name' => 'Farmasi',
            'type' => '8',
            'email' => 'Far@gmail.com',
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
