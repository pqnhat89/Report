<?php

namespace App\Http\Middleware;

use App\Enums\LoaiBaoCao;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->isMethod('post') && $request->t) {
            if (Auth::user()->role != 2) {
                if ($request->id) {
                    // edit
                    $data = DB::table($request->t)->where([
                        'id' => $request->id,
                        'quan_huyen' => Auth::user()->quan_huyen
                    ])->first();
                    if (!$data) {
                        return redirect()->back()->withErrors('Người dùng không có quyền');
                    }
                } else {
                    // create new
                    $data = DB::table($request->t)->where([
                        'nam' => now()->format('Y'),
                        'loai' => $request->loai,
                        'quan_huyen' => Auth::user()->quan_huyen
                    ])->first();
                    if ($data) {
                        $quanHuyen = (DB::table('quan_huyen')->where('id', Auth::user()->quan_huyen)->first())->name ?? null;
                        $nam = now()->format('Y');
                        $loai = LoaiBaoCao::getTitle($request->loai);
                        return redirect()->back()->withErrors("Dữ liệu $loai của $quanHuyen trong năm $nam đã tồn tại");
                    }
                }
            }
        }
        unset($request['t']);
        return $next($request);
    }
}
