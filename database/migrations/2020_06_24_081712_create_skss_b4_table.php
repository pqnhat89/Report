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
            $table->string('loai');
            $table->string('quan_huyen');
            $table->string('ten');
            $table->integer('one')->nullable();
            $table->integer('onedotone')->nullable();
            $table->integer('two')->nullable();
            $table->integer('twodotone')->nullable();
            $table->integer('three')->nullable();
            $table->integer('threedotone')->nullable();
            $table->integer('threedottwo')->nullable();
            $table->integer('threedotthree')->nullable();
            $table->integer('threedotfour')->nullable();
            $table->integer('threedotfive')->nullable();
            $table->integer('threedotsix')->nullable();
            $table->integer('threedotseven')->nullable();
            $table->integer('threedoteight')->nullable();
            $table->integer('threedotnine')->nullable();
            $table->integer('threedotten')->nullable();
            $table->integer('four')->nullable();
            $table->integer('five')->nullable();
            $table->integer('six')->nullable();
            $table->integer('sixdotone')->nullable();
            $table->integer('sixdottwo')->nullable();
            $table->integer('seven')->nullable();
            $table->timestamp('created_at')->default(now());
            $table->timestamp('updated_at')->default(now());
            $table->string('created_by');
            $table->string('updated_by');
            $table->unique(['nam', 'loai', 'quan_huyen']);
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
