<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SkssController extends Controller
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
    public function index()
    {
        $skss = [
            'b4',
            'b5',
            'b6',
            'b7.1',
            'b8',
            'CTK'
        ];
        return view('bao-cao.skss.skss', ['skss' => $skss]);
    }

    public function b4()
    {
        $conditions = [];
        if (Auth::user()->role != 2) {
            $conditions[] = ['email' => Auth::user()->email];
        }
        $b4 = DB::table('skss_b4')->where($conditions)->get();

        return view('bao-cao.skss.b4.b4', ['b4' => $b4]);
    }

    public function b4Xem($thang, $id)
    {
        $conditions = ['id' => $id];
        if (Auth::user()->role != 2) {
            $conditions[] = ['email' => Auth::user()->email];
        }
        $b4 = DB::table('skss_b4')->where($conditions)->get();

        return view('bao-cao.skss.b4.b4Xem', ['b4' => $b4]);
    }
}
