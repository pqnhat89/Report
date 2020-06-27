<?php

namespace App\Http\Controllers;

class SkssController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $skss = [
            'b4',
            // 'b5',
            // 'b6',
            // 'b7.1',
            // 'b8',
            // 'CTK'
        ];
        return view('skss.index', ['skss' => $skss]);
    }
}
