<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevamTakipOgrencisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devam_takip_ogrencis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('devam_takip_id')->constrained();
            $table->foreignId('ogrenci_id')->constrained();
            $table->boolean('devam')->comment('Devamsızlık');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('devam_takip_ogrencis');
    }
}
