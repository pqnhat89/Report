<?php

use App\Models\BaseMigration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CreateReportsTable extends BaseMigration
{
    const TABLE_NAME = 'reports';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(static::TABLE_NAME, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->smallInteger('year');
            $table->tinyInteger('month');
        });

        parent::up();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
