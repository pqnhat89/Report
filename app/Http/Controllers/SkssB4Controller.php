<?php


namespace App\Http\Controllers;


use App\Enums\LoaiBaoCao;
use App\Enums\Skss\SkssB4;
use App\Enums\UserRole;
use App\Export\SkssB4Export;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Excel;

class SkssB4Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $conditions = [];
        if (UserRole::isNormalUser()) {
            $conditions[] = ['skss_b4.quan_huyen', Auth::user()->quan_huyen];
        }
        $b4 = DB::table('skss_b4')
            ->leftJoin('quan_huyen', 'skss_b4.quan_huyen', 'quan_huyen.id')
            ->where($conditions)
            ->select([
                'skss_b4.*',
                'quan_huyen.name as quan_huyen_name'
            ])
            ->orderBy('skss_b4.id', 'desc')
            ->get();

        return view('skss.b4.index', ['b4' => $b4]);
    }

    public function create()
    {
        $quanHuyen = DB::table('quan_huyen')->get();

        $fields = SkssB4::toArray();

        return view('skss.b4.show', [
            'quanHuyen' => $quanHuyen,
            'fields' => $fields,
            'b4' => null,
            'type' => 'tao'
        ]);
    }

    public function show(Request $request, $id)
    {
        $quanHuyen = DB::table('quan_huyen')->get();

        $fields = SkssB4::toArray();

        $conditions = [
            ['skss_b4.id', $id]
        ];

        if (UserRole::isNormalUser()) {
            $conditions[] = ['skss_b4.quan_huyen', Auth::user()->quan_huyen];
        }
        $b4 = DB::table('skss_b4')
            ->leftJoin('quan_huyen', 'skss_b4.quan_huyen', 'quan_huyen.id')
            ->where($conditions)
            ->select([
                'skss_b4.*',
                'quan_huyen.name as quan_huyen_name'
            ])
            ->first();

        if ($request->export) {
            $nam = $b4->nam;
            $loai = LoaiBaoCao::getTitle($b4->loai);
            $quanHuyen = $b4->quan_huyen_name;
            return Excel::download(new SkssB4Export($b4), "[$nam][$loai][Skss-b4][$quanHuyen].xlsx");
        }

        return view('skss.b4.show', [
            'quanHuyen' => $quanHuyen,
            'fields' => $fields,
            'b4' => $b4,
            'type' => 'xem'
        ]);
    }

    public function edit($id)
    {
        $quanHuyen = DB::table('quan_huyen')->get();

        $fields = SkssB4::toArray();

        if ($id) {
            // edit
            $conditions = [
                ['id', $id]
            ];

            if (UserRole::isNormalUser()) {
                $conditions[] = ['quan_huyen', Auth::user()->quan_huyen];
            }

            $b4 = DB::table('skss_b4')->where($conditions)->first();

            if (!$b4) {
                return redirect()->back()->withErrors('Người dùng không có quyền');
            }
        }

        return view('skss.b4.edit', [
            'quanHuyen' => $quanHuyen ?? [],
            'fields' => $fields ?? [],
            'b4' => $b4 ?? null,
            'type' => 'sua'
        ]);
    }

    public function save(Request $request, $id)
    {
        $inputs = $request->except('_token');
        $inputs['quan_huyen'] = Auth::user()->quan_huyen;
        $inputs['updated_at'] = now();
        $inputs['updated_by'] = Auth::user()->email;
        if (UserRole::isAdmin()) {
            $inputs['quan_huyen'] = $request->quan_huyen;
        }

        if ($id) {
            // cập nhật
            $conditions = ['id' => $id];
            if (UserRole::isNormalUser()) {
                $conditions['quan_huyen'] = Auth::user()->quan_huyen;
            }
            DB::table('skss_b4')->where($conditions)->update($inputs);
        } else {
            // tạo mới
            $inputs['nam'] = now()->format('Y');
            $inputs['created_at'] = now();
            $inputs['created_by'] = Auth::user()->email;
            DB::table('skss_b4')->insert($inputs);
        }

        return redirect()->route('skss.b4.index')
            ->withErrors("<span class='text-success'>Cập nhật thành công.</span>");
    }

    public function delete($id)
    {
        $conditions = ['id' => $id];
        if (UserRole::isNormalUser()) {
            $conditions['quan_huyen'] = Auth::user()->quan_huyen;
        }
        DB::table('skss_b4')->where($conditions)->delete();
        return redirect()->route('skss.b4.index');
    }
}
