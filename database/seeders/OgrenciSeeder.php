<?php

namespace Database\Seeders;

use App\Models\Ogrenci;
use Illuminate\Database\Seeder;

class OgrenciSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ogrenci::factory(20)->create();
    }
}
