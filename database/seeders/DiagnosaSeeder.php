<?php

namespace Database\Seeders;

use App\Models\Diagnosa;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DiagnosaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::disk('local')->get('/json/diagnosas.json');
        $diagnosas = json_decode($json, true);

        foreach ($diagnosas as $diagnosa) {
            Diagnosa::query()->updateOrCreate([
                'kode_sdki' => $diagnosa['kode_sdki'],
                'nama_sdki' => $diagnosa['nama_sdki'],
            ]);
        }
    }
}
