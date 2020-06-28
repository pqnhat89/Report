<?php

namespace App\Http\Middleware;

use App\Enums\LoaiBaoCao;
use App\Enums\UserRole;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $check = null;
        if ($request->isMethod('post') && $request->t) {
            if ($request->id) {
                $check = self::forEdit($request);
            } else {
                $check = self::forCreate($request);
            }
        }
        unset($request['t']);
        if ($check) {
            return $check;
        }
        return $next($request);
    }

    private static function forCreate($request)
    {
        // init data
        $table = $request->t;
        $nam = now()->format('Y');
        $loai = $request->loai;
        $quanHuyen = Auth::user()->quan_huyen;

        // check permission
        if (UserRole::isAdmin()) {
            $quanHuyen = $request->quan_huyen;
        }

        // check exist
        $data = DB::table($table)
            ->where([
                'nam' => $nam,
                'loai' => $loai,
                'quan_huyen' => $quanHuyen
            ])
            ->first();
        if ($data) {
            $quanHuyen = (DB::table('quan_huyen')->where('id', $quanHuyen)->first())->name ?? null;
            $loai = LoaiBaoCao::getTitle($loai);
            return redirect()->back()->withErrors("Dữ liệu $loai của $quanHuyen trong năm $nam đã tồn tại");
        }
    }

    private static function forEdit($request)
    {
        // init data
        $table = $request->t;
        $id = $request->id;
        $nam = now()->format('Y');
        $loai = $request->loai;
        $quanHuyen = Auth::user()->quan_huyen;

        // check permission
        if (UserRole::isAdmin()) {
            $quanHuyen = $request->quan_huyen;
        }

        // check exist
        $data = DB::table($table)
            ->where([
                'nam' => $nam,
                'loai' => $loai,
                'quan_huyen' => $quanHuyen
            ])
            ->whereNotIn('id', [$id])
            ->first();
        if ($data) {
            $quanHuyen = (DB::table('quan_huyen')->where('id', $quanHuyen)->first())->name ?? null;
            $loai = LoaiBaoCao::getTitle($loai);
            return redirect()->back()->withErrors("Dữ liệu $loai của $quanHuyen trong năm $nam đã tồn tại");
        }
    }
}
