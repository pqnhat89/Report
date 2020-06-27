<?php

namespace App\Http\Controllers;

use App\Export\SkssB4Export;
use Excel;

class ExportController extends Controller
{
    public function test()
    {
        return Excel::download(new SkssB4Export, 'invoices.xlsx');
    }
}
