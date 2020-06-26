<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('auth.passwords.change');
    }

    public function change(Request $request)
    {
        $email = Auth::user()->email;

        if (!Hash::check($request->old_password, Auth::user()->password)) {
            return back()->withErrors('Mật khẩu cũ không trùng khớp');
        }

        if ($request->new_password != $request->re_password) {
            return back()->withErrors('Nhập lại mật khẩu mới không trùng khớp');
        }

        if (Auth::user()->role == 2 && $request->email) {
            $email = $request->email;
        }

        DB::table('users')->where('email', $email)->update([
            'password' => bcrypt($request->new_password)
        ]);

        return redirect()->route('home')->withErrors('<span class="text-success">Đổi mật khẩu thành công</span>');
    }
}
