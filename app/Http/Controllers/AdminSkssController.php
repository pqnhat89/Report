<?php

namespace App\Http\Controllers;

use App\Enums\Skss\SkssB4;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminSkssController extends Controller
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
        $b4 = DB::table('skss_b4')
            ->select('nam', 'loai', DB::raw('COUNT(quan_huyen) as count'))
            ->groupBy('nam', 'loai')
            ->orderBy('nam', 'desc')
            ->get();
        return view('bao-cao.skss.admin.admin_b4', [
            'b4' => $b4,
            'type' => 'tong-hop'
        ]);
    }

    public function b4TongHop($nam, $loai)
    {
        $b4 = DB::table('skss_b4')
            ->where([
                'nam' => $nam,
                'loai' => $loai
            ])
            ->select([
                'nam',
                'loai',
                DB::raw('SUM(one) as one'),
                DB::raw('SUM(onedotone) as onedotone'),
                DB::raw('SUM(two) as two'),
                DB::raw('SUM(twodotone) as twodotone'),
                DB::raw('SUM(three) as three'),
                DB::raw('SUM(threedotone) as threedotone'),
                DB::raw('SUM(threedottwo) as threedottwo'),
                DB::raw('SUM(threedotthree) as threedotthree'),
                DB::raw('SUM(threedotfour) as threedotfour'),
                DB::raw('SUM(threedotfive) as threedotfive'),
                DB::raw('SUM(threedotsix) as threedotsix'),
                DB::raw('SUM(threedotseven) as threedotseven'),
                DB::raw('SUM(threedoteight) as threedoteight'),
                DB::raw('SUM(threedotnine) as threedotnine'),
                DB::raw('SUM(threedotten) as threedotten'),
                DB::raw('SUM(four) as four'),
                DB::raw('SUM(five) as five'),
                DB::raw('SUM(six) as six'),
                DB::raw('SUM(sixdotone) as sixdotone'),
                DB::raw('SUM(sixdottwo) as sixdottwo'),
                DB::raw('SUM(seven) as seven')
            ])
            ->groupBy('nam', 'loai')
            ->first();
        return view('bao-cao.skss.b4.b4Xem', [
            'b4' => $b4,
            'type' => 'tong-hop'
        ]);
    }
}
