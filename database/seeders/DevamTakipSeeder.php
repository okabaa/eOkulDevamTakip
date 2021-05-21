<?php

namespace Database\Seeders;

use App\Models\DevamTakip;
use App\Models\DevamTakipOgrenci;
use App\Models\Ogrenci;
use App\Models\Sinif;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;

class DevamTakipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sinifCount = Sinif::all()->count();
        $userCount = User::all()->count();
        for ($i = 1; $i <= 1000; $i++) {
            $user = rand(1, $userCount);
            $sinif = rand(1, $sinifCount);
            DevamTakip::factory(1)->create([
                'user_id' => $user,
                'sinif_id' => $sinif
            ]);
            $ogrenciler = Ogrenci::where('sinif_id', $sinif)->get();
            foreach ($ogrenciler as $ogrenci) {
                DevamTakipOgrenci::create([
                    'devam_takip_id' => $i,
                    'ogrenci_id' => $ogrenci->id,
                    'devam' => rand(0, 1)
                ]);
            }

        }
    }
}
