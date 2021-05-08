<?php

namespace Database\Seeders;

use App\Models\Sinif;
use Illuminate\Database\Seeder;

class SinifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0;$i<=20;$i++) {
            Sinif::factory(1)
                ->hasOgrenciler(rand(12, 20))
                ->create();
        }
    }
}
