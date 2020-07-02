<?php

namespace App\Models;

use App\Models\BaseModel;

class Reports extends BaseModel
{
    protected $table = 'reports';

    protected $primaryKey = 'id';

    public $guarded = [];
}
