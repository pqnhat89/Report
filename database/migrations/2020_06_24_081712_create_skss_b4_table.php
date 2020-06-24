<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkssB4Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skss_b4', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('nam');
            $table->string('thang');
            $table->string('quan-huyen');
            $table->string('ten');
            $table->string('email');
            $table->integer('one');
            $table->integer('onedotone');
            $table->integer('two');
            $table->integer('twodotone');
            $table->integer('three');
            $table->integer('threedotone');
            $table->integer('threedottwo');
            $table->integer('threedotthree');
            $table->integer('threedotfour');
            $table->integer('threedotfive');
            $table->integer('threedotsix');
            $table->integer('threedotseven');
            $table->integer('threedoteight');
            $table->integer('threedotnine');
            $table->integer('threedotten');
            $table->integer('four');
            $table->integer('five');
            $table->integer('six');
            $table->integer('sixdotone');
            $table->integer('sixdottwo');
            $table->integer('seven');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skss_b4');
    }
}
