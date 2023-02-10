<?php

namespace Database\Seeders;

use App\Models\Icd;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class IcdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::disk('local')->get('/json/master_icd.json');
        $icds = json_decode($json, true);

        foreach ($icds as $icd) {
            Icd::query()->updateOrCreate([
                'kode_icd' => $icd['kode_icd'],
                'nama_icd' => $icd['nama_icd'],
                'nama_icd_indo' => $icd['nama_icd_indo'],
            ]);
        }
    }
}
