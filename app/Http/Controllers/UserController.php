<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $users = DB::table('users')
            ->orderBy('id', 'desc')
            ->paginate(50)
            ->appends($request->all());
        return view('admin.user.index', ['users' => $users]);
    }

    public function edit(Request $request, $email)
    {
        $user = DB::table('users')
            ->where('email', $email)
            ->first();
        return view('admin.user.edit', [
            'user' => $user
        ]);
    }

    public function save(Request $request, $email)
    {
        $inputs = ['role' => $request->role];
        if ($request->new_password) {
            if ($request->new_password != $request->re_password) {
                return back()->withErrors('Nhập lại mật khẩu mới không trùng khớp');
            }
            $inputs['password'] = bcrypt($request->new_password);
        }
        if ($request->location) {
            $inputs['location'] = $request->location;
        }

        if ($email) {
            // edit
            DB::table('users')
                ->where('email', $email)
                ->update($inputs);
            return redirect()
                ->route('user.index')
                ->withErrors('<span class="text-success">Sửa tài khoản "' . $email . '" thành công</span>');
        } else {
            // create
            $user = DB::table('users')
                ->where([
                    'email' => $request->email
                ])
                ->first();
            if ($user) {
                return redirect()
                    ->route('user.index')
                    ->withErrors('Tài khoản "' . $request->email . '" đã tồn tại.');
            }
            DB::table('users')
                ->insert([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->new_password),
                    'role' => $request->role,
                ]);
            return redirect()
                ->route('user.index')
                ->withErrors('<span class="text-success">Tạo tài khoản "' . $request->email . '" thành công</span>');
        }
    }

    public function delete($email)
    {
        $user = DB::table('users')
            ->where([
                ['email', $email],
                ['role', '!=', UserRole::Admin]
            ])
            ->delete();
        return back()->withErrors('<span class="text-success">Xóa tài khoản "' . $email . '" thành công</span>');
    }
}
