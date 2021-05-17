<?php

namespace Database\Seeders;

use App\Models\DevamTakip;
use App\Models\DevamTakipOgrenci;
use App\Models\Ogrenci;
use App\Models\Sinif;
use Illuminate\Database\Seeder;

class DevamTakipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            DevamTakip::factory(10)->create([
                'user_id' => $i,
                'sinif_id' => $i
            ]);
            $ogrenciler = Ogrenci::where('sinif_id', $i)->get();
            foreach ($ogrenciler as $ogrenci) {
                DevamTakipOgrenci::create([
                    'devam_takip_id' => $i,
                    'ogrenci_id' => $ogrenci->id,
                    'devam' => rand(0,1)
                ]);
            }
        }
    }
}
