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
            $table->string('type', 128)->collation('utf8mb4_unicode_ci');
            $table->smallInteger('year');
            $table->string('month', 128);
            $table->string('location', 128)->collation('utf8mb4_unicode_ci');
            $table->string('filepath')->nullable();
            $table->tinyInteger('status')->default(0);
            for ($i = 0; $i <= 100; $i++) {
                $table->smallInteger(\PHPExcel_Cell::stringFromColumnIndex($i))->default(0);
            }
            $table->unique(['type', 'year', 'month', 'location']);
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
