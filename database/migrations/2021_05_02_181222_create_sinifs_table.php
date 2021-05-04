<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSinifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sinifs', function (Blueprint $table) {
            $table->id();
            $table->string('name',150)->comment('Sınıf adı');
            $table->string('description', 500)->nullable()->comment('Sınıf açıklaması');
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
        Schema::dropIfExists('sinifs');
    }
}
