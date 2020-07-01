<?php

namespace App\Models;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class BaseMigration extends Migration
{
    const TABLE_NAME = 'default';

    public function up()
    {
        Schema::table(static::TABLE_NAME, function (Blueprint $table) {
            $table->timestamp(BaseModel::CREATED_AT)->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string(BaseModel::CREATED_BY, 170)->nullable();
            $table->timestamp(BaseModel::UPDATED_AT)->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->string(BaseModel::UPDATED_BY, 170)->nullable();
            $table->boolean(BaseModel::IS_DELETED)->default(false);
        });
    }

    public function down()
    {
        Schema::dropIfExists(static::TABLE_NAME);
    }
}
