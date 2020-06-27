<?php

namespace App\Http\Middleware;

use App\Enums\UserRole;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUser
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
        if (Auth::user()->role == UserRole::NewUser) {
            return redirect()->back()->withErrors('Vui lòng liên hệ Admin để kích hoạt tài khoản');
        }
        return $next($request);
    }
}
