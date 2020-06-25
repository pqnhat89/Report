<?php

namespace App\Http\Controllers;

use App\Enums\Skss\SkssB4;
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
            $conditions[] = ['quan_huyen', Auth::user()->quan_huyen];
        }
        $b4 = DB::table('skss_b4')->where($conditions)
            ->orderBy('id', 'desc')
            ->get();

        return view('bao-cao.skss.b4.b4', ['b4' => $b4]);
    }

    public function b4Tao()
    {
        $quanHuyen = DB::table('quan_huyen')->get();

        $fields = SkssB4::toArray();

        return view('bao-cao.skss.b4.b4Xem', [
            'quanHuyen' => $quanHuyen,
            'fields' => $fields,
            'b4' => null,
            'type' => 'tao'
        ]);
    }

    public function b4Xem($id)
    {
        $quanHuyen = DB::table('quan_huyen')->get();

        $fields = SkssB4::toArray();

        $conditions = [
            ['id', $id]
        ];

        if (Auth::user()->role != 2) {
            $conditions[] = ['quan_huyen', Auth::user()->quan_huyen];
        }
        $b4 = DB::table('skss_b4')->where($conditions)->first();

        return view('bao-cao.skss.b4.b4Xem', [
            'quanHuyen' => $quanHuyen,
            'fields' => $fields,
            'b4' => $b4,
            'type' => 'xem'
        ]);
    }

    public function b4Sua($id)
    {
        $quanHuyen = DB::table('quan_huyen')->get();

        $fields = SkssB4::toArray();

        $conditions = [
            ['id', $id]
        ];

        if (Auth::user()->role != 2) {
            $conditions[] = ['quan_huyen', Auth::user()->quan_huyen];
        }

        $b4 = DB::table('skss_b4')->where($conditions)->first();

        if (!$b4) {
            return redirect()->back()->withErrors('Người dùng không có quyền');
        }

        return view('bao-cao.skss.b4.b4Xem', [
            'quanHuyen' => $quanHuyen,
            'fields' => $fields,
            'b4' => $b4,
            'type' => 'sua'
        ]);
    }

    public function b4Luu(Request $request, $id)
    {
        $inputs = $request->except('_token');
        $inputs['updated_by'] = Auth::user()->email;
        $inputs['updated_at'] = now();

        if ($id) {
            // cập nhật
            DB::table('skss_b4')->where([
                'id' => $id,
                'quan_huyen' => Auth::user()->quan_huyen
            ])->update($inputs);
        } else {
            // tạo mới
            $inputs['quan_huyen'] = Auth::user()->quan_huyen;
            $inputs['nam'] = now()->format('Y');
            $inputs['created_by'] = Auth::user()->email;
            $inputs['updated_by'] = Auth::user()->email;
            DB::table('skss_b4')->insert($inputs);
        }
        return redirect()->route('skss_b4');
    }

    public function b4Xoa($id)
    {
        DB::table('skss_b4')->where([
            'id' => $id,
            'quan_huyen' => Auth::user()->quan_huyen
        ])->delete();
        return redirect()->route('skss_b4');
    }
}
