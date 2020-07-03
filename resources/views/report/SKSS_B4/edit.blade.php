@component('layouts.app')

@section('content')
    <div class="container">
        <p>Biểu số: 4/BCH</p>
        <div class="text-center pb-5">
            <h1>HOẠT ĐỘNG CHĂM SÓC BÀ MẸ</h1>
            <h4>Báo cáo 3, 6, 9 và 12 tháng</h4>
        </div>
        <form method="POST">
            {{ csrf_field() }}
            <div class="overflow-x">
                <table class="table table-bordered" style="width: 3000px!important">
                    <thead>
                    <tr>
                        <th rowspan="2">STT</th>
                        <th rowspan="2">Tên cơ sở</th>
                        <th colspan="2">Phụ nữ có thai</th>
                        <th colspan="2">Số lượt khám thai</th>
                        <th rowspan="2">Tổng số PN đẻ</th>
                        <th colspan="10">Trong đó</th>
                        <th rowspan="2">Số PN đẻ được CB có kỹ năng đỡ</th>
                        <th rowspan="2">Số trẻ được cấp giấy chứng sinh</th>
                        <th colspan="2">CS sau sinh tại nhà</th>
                        <th rowspan="2">Số ca tử vong mẹ được thẩm định</th>
                    </tr>
                    <tr>
                        <th>Tổng số</th>
                        <th>Trđ: Vị thành niên</th>
                        <th>Tổng số</th>
                        <th>Trđ: Số lượt XN protein niệu</th>
                        <th>Số đẻ tuổi vị thành niên </th>
                        <th>Số được  khám thai ≥4 lần/3 kỳ</th>
                        <th>Số đẻ được XN viêm gan B khi mang thai</th>
                        <th>Số đẻ được XN giang mai khi mang thai</th>
                        <th>Số được XN HIV khi mang thai</th>
                        <th>Số phụ nữ có thai có XN khẳng định + HIV trong gđ mang thai</th>
                        <th>Số PN đẻ HIV (+) được điều trị ARV</th>
                        <th>Số đẻ được XN đường huyết</th>
                        <th>Số PN đẻ được can thiệp  FX/ GH</th>
                        <th>Số PN được mổ đẻ</th>
                        <th>Tuần đầu</th>
                        <th>Từ tuần 2 đến hết 6 tuần</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @for($i=1; $i<=22; $i++)
                                <td class="text-center">{{ $i }}</td>
                            @endfor
                        </tr>
                        <tr>
                            <td class="text-center">I</td>
                            <td class="text-center nowrap">
                                @if (\App\Enums\UserRole::isNormalUser())
                                    {{ Auth::user()->location }}
                                @endif
                            </td>
                            <td></td>
                            <td></td>
                            @for($i=0; $i<=17; $i++)
                            @php $column = \PHPExcel_Cell::stringFromColumnIndex($i); @endphp
                            <td>
                                <input class="form-control" name="{{ $column }}" value="{{ $report->$column ?? null }}" type="number" required>
                            </td>
                            @endfor
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row pt-5">
                <div class="col-sm">
                    <select class="form-control" name="month" required>
                        <option value="">Vui lòng chọn Quý ...</option>
                        @foreach (\App\Enums\Months::toArray() as $month)
                            <option value="{{ $month }}" {{ ($report->month ?? null) == $month ? 'selected' : null }}>{{ $month }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm text-right">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </div>
        </form>
@endsection

@endcomponent
