<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOgrencisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ogrencis', function (Blueprint $table) {
            $table->id();
            $table->string('name',150);
            $table->string('parent_name',150);
            $table->string('email');
            $table->text('profile_photo_path')->nullable();
            $table->timestamps();
            $table->foreignId('sinif_id')->nullable()->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ogrencis');
    }
}
