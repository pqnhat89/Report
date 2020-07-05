<?php

namespace App\Http\Middleware;

use App\Enums\UserRole;
use App\Models\Reports;
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
        if ($request->isMethod('post') && $request->type) {
            if ($request->route()->getName() == 'report.delete') {
                // skip
            } else if ($request->id) {
                $check = self::forEdit($request);
            } else {
                $check = self::forCreate($request);
            }
        }
        if ($check) {
            return $check;
        }
        return $next($request);
    }

    private static function forCreate($request)
    {
        // init data
        $conditions = getConditions();
        $conditions['year'] = now()->format('Y');

        // check permission
        if (UserRole::isAdmin()) {
            $conditions['location'] = $request->location;
        }

        // check exist
        $data = DB::table('reports')
            ->where($conditions)
            ->first();
        if ($data) {
            return redirect()->back()->withErrors("Dữ liệu " . $conditions['month'] . " của " . $conditions['location'] . " trong năm " . $conditions['year'] . " đã tồn tại");
        }
    }

    private static function forEdit($request)
    {
        // init data
        $conditions = getConditions();
        $id = $conditions['id'];
        unset($conditions['id']);
        $conditions['year'] = now()->format('Y');

        // check permission
        if (UserRole::isAdmin()) {
            $conditions['location'] = $request->location;
        }

        // check exist
        $data = Reports::where($conditions)
            ->whereNotIn('id', [$id])
            ->first();

        if ($data) {
            return redirect()->back()->withErrors("Dữ liệu " . $conditions['month'] . " của " . $conditions['location'] . " trong năm " . $conditions['year'] . " đã tồn tại");
        }
    }
}
