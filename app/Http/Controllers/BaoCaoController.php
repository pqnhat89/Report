<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaoCaoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($thang)
    {
        return view('bao-cao.bao-cao');
    }
}
