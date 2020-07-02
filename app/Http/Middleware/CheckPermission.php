<?php

namespace App\Http\Middleware;

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
        $type = $request->t;
        $year = now()->format('Y');
        $month = $request->month;
        $location = Auth::user()->location;

        // check permission
        if (UserRole::isAdmin()) {
            $location = $request->location;
        }

        // check exist
        $data = DB::table('reports')
            ->where([
                'type' => $type,
                'year' => $year,
                'month' => $month,
                'location' => $location
            ])
            ->first();
        if ($data) {
            return redirect()->back()->withErrors("Dữ liệu $month của $location trong năm $year đã tồn tại");
        }
    }

    private static function forEdit($request)
    {
        // init data
        $type = $request->t;
        $id = $request->id;
        $year = now()->format('Y');
        $month = $request->month;
        $location = Auth::user()->location;

        // check permission
        if (UserRole::isAdmin()) {
            $location = $request->location;
        }

        // check exist
        $data = DB::table('reports')
            ->where([
                'type' => $type,
                'year' => $year,
                'month' => $month,
                'location' => $location
            ])
            ->whereNotIn('id', [$id])
            ->first();
        if ($data) {
            return redirect()->back()->withErrors("Dữ liệu $month của $location trong năm $year đã tồn tại");
        }
    }
}
