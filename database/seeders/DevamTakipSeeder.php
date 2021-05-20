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
        $k=0;
        for ($i = 1; $i <= 20; $i++) {
            for ($j = 1; $j <= 5; $j++) {
                $k++;
                $sinif = rand(1,20);
                DevamTakip::factory(1)->create([
                    'user_id' => $i,
                    'sinif_id' => $sinif
                ]);
                $ogrenciler = Ogrenci::where('sinif_id', $sinif)->get();
                foreach ($ogrenciler as $ogrenci) {
                    DevamTakipOgrenci::create([
                        'devam_takip_id' => $k,
                        'ogrenci_id' => $ogrenci->id,
                        'devam' => rand(0, 1)
                    ]);
                }
            }
        }
    }
}
