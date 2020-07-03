<style>
    th, td {
        text-align: center!important;
    }
</style>
<table class="table table-bordered" style="width: 3000px!important">
    <thead>
    <th>
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
            <th>Số được khám thai ≥4 lần/3 kỳ</th>
            <th>Số đẻ được XN viêm gan B khi mang thai</th>
            <th>Số đẻ được XN giang mai khi mang thai</th>
            <th>Số được XN HIV khi mang thai</th>
            <th>Số phụ nữ có thai có XN khẳng định + HIV trong gđ mang thai</th>
            <th>Số PN đẻ HIV (+) được điều trị ARV</th>
            <th>Số đẻ được XN đường huyết</th>
            <th>Số PN đẻ được can thiệp FX/ GH</th>
            <th>Số PN được mổ đẻ</th>
            <th>Tuần đầu</th>
            <th>Từ tuần 2 đến hết 6 tuần</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            @for($i=1; $i<=22; $i++)
                <td>{{ $i }}</td>
            @endfor
        </tr>
        <tr>
            <td>I</td>
            <td class="nowrap">
                @if (\App\Enums\UserRole::isNormalUser())
                    {{ Auth::user()->location }}
                @endif
            </td>
            <td></td>
            <td></td>
            @for($i=0; $i<=17; $i++)
                @php $column=\PHPExcel_Cell::stringFromColumnIndex($i); @endphp
                <td>
                    {{ $report->$column }}
                </td>
            @endfor
        </tr>
    </tbody>
</table>
