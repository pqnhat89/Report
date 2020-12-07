<?php

namespace App\Http\Controllers;

use App\Enums\FileNames;
use App\Models\Reports;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('file.template');
    }

    public function template($type)
    {
        $filename = FileNames::toArray()[$type];
        return response()->download(storage_path("files/[Tải mẫu] {$filename}"));
    }

    public function download($id)
    {
        $filename = FileNames::toArray()[$type];
        return response()->download(storage_path("files/{$filename}"));
    }

    public function upload(Request $request)
    {
        $conditions = getConditions();
        $year = $conditions['year'] ?? null;
        $month = $conditions['month'] ?? null;
        $location = $conditions['location'] ?? null;
        $type = $conditions['type'];

        // upload file
        $filepath = Storage::disk('storage')
            ->putFileAs(
                "files/$year/$month/$type",
                $request->file('file'),
                "[$year][$month][$location]$type"
            );

        // update report
        $conditions['filepath'] = $filepath;
        Reports::insert($conditions);

        return back()->withErrors('<span class="text-success">Upload file thành công.</span>');
    }
}
