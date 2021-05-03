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
        Sinif::factory(20)->create();
    }
}
