<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gradients', function (Blueprint $table) {
            $table->timestamps();
            $table->string('title')->primary();
            $table->string('style');
            $table->string('direction')->nullable();
            $table->string('color1');
            $table->string('color2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gradients');
    }
}
