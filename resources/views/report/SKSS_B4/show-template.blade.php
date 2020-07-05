<table class="table table-bordered" style="width: 3000px!important">
    <thead>
    <tr>
        <th rowspan="2">STT</th>
        <th rowspan="2">Tên cơ sở</th>
        <th colspan="2" style="text-align: center">Phụ nữ có thai</th>
        <th colspan="2" style="text-align: center">Số lượt khám thai</th>
        <th rowspan="2">Tổng số PN đẻ</th>
        <th colspan="10" style="text-align: center">Trong đó</th>
        <th rowspan="2">Số PN đẻ được CB có kỹ năng đỡ</th>
        <th rowspan="2">Số trẻ được cấp giấy chứng sinh</th>
        <th colspan="2" style="text-align: center">CS sau sinh tại nhà</th>
        <th rowspan="2">Số ca tử vong mẹ được thẩm định</th>
    </tr>
    <tr>
        <th>Tổng số</th>
        <th>Trđ: Vị thành niên</th>
        <th>Tổng số</th>
        <th>Trđ: Số lượt XN protein niệu</th>
        <th>Số đẻ tuổi vị thành niên</th>
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
            <td style="text-align: center">{{ $i }}</td>
        @endfor
    </tr>
    @if ($report ?? false)
        <tr>
            <td style="text-align: center">I</td>
            <td class="nowrap">
                {{ $report->location }}
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
    @endif
    @if ($reports ?? false)
        <tr>
            <td></td>
            <td class="nowrap" style="text-align: center; font-weight: bold">TỔNG SỐ</td>
            <td></td>
            <td></td>
            @for($i=0; $i<=17; $i++)
                @php $column=\PHPExcel_Cell::stringFromColumnIndex($i); @endphp
                <td>
                    {{ $reports->sum($column) }}
                </td>
            @endfor
        </tr>
        <tr>
            <td style="text-align: center; font-weight: bold">A</td>
            <td nowrap style="font-weight: bold">Y tế công</td>
            <td></td>
            <td></td>
            <?php $reportsss = $reports->whereIn('location', array_merge(\App\Enums\Locations::$tuyenTinh, \App\Enums\Locations::$tuyenHuyen)) ?>
            @for($i=0; $i<=17; $i++)
                @php $column=\PHPExcel_Cell::stringFromColumnIndex($i); @endphp
                <td>
                    {{ $reportsss->sum($column) }}
                </td>
            @endfor
        </tr>
        <tr>
            <td style="text-align: center; font-weight: bold">I</td>
            <td nowrap style="font-weight: bold">Tuyến tỉnh</td>
            <td></td>
            <td></td>
            <?php $reportsss = $reports->whereIn('location', \App\Enums\Locations::$tuyenTinh) ?>
            @for($i=0; $i<=17; $i++)
                @php $column=\PHPExcel_Cell::stringFromColumnIndex($i); @endphp
                <td>
                    {{ $reportsss->sum($column) }}
                </td>
            @endfor
        </tr>
        @php $no=1 @endphp
        @foreach(\App\Enums\Locations::$tuyenTinh as $tuyenTinh)
            <tr>
                <td style="text-align: center">{{ $no++ }}</td>
                <td nowrap style="color: red">{{ $tuyenTinh }}</td>
                <td></td>
                <td></td>
                @php $report = $reports->where('location', $tuyenTinh) @endphp
                @for($i=0; $i<=17; $i++)
                    @php $column=\PHPExcel_Cell::stringFromColumnIndex($i); @endphp
                    <td>
                        {{ $report->sum($column) }}
                    </td>
                @endfor
            </tr>
        @endforeach
        <tr>
            <td style="text-align: center; font-weight: bold">II</td>
            <td nowrap style="font-weight: bold">Tuyến huyện</td>
            <td></td>
            <td></td>
            <?php $reportsss = $reports->whereIn('location', \App\Enums\Locations::$tuyenHuyen) ?>
            @for($i=0; $i<=17; $i++)
                @php $column=\PHPExcel_Cell::stringFromColumnIndex($i); @endphp
                <td>
                    {{ $reportsss->sum($column) }}
                </td>
            @endfor
        </tr>
        @php $no=1 @endphp
        @foreach(\App\Enums\Locations::$tuyenHuyen as $tuyenHuyen)
            <tr>
                <td style="text-align: center">{{ $no++ }}</td>
                <td nowrap style="color: purple">{{ $tuyenHuyen }}</td>
                <td></td>
                <td></td>
                @php $report = $reports->where('location', $tuyenHuyen) @endphp
                @for($i=0; $i<=17; $i++)
                    @php $column=\PHPExcel_Cell::stringFromColumnIndex($i); @endphp
                    <td>
                        {{ $report->sum($column) }}
                    </td>
                @endfor
            </tr>
        @endforeach
        <tr>
            <td style="text-align: center; font-weight: bold">B</td>
            <td nowrap style="font-weight: bold">Y tế tư nhân</td>
            <td></td>
            <td></td>
            <?php $reportsss = $reports->whereIn('location', \App\Enums\Locations::$tuNhan) ?>
            @for($i=0; $i<=17; $i++)
                @php $column=\PHPExcel_Cell::stringFromColumnIndex($i); @endphp
                <td>
                    {{ $reportsss->sum($column) }}
                </td>
            @endfor
        </tr>
        @php $no=1 @endphp
        @foreach(\App\Enums\Locations::$tuNhan as $tuNhan)
            <tr>
                <td style="text-align: center">{{ $no++ }}</td>
                <td nowrap style="color: blue">{{ $tuNhan }}</td>
                <td></td>
                <td></td>
                @php $report = $reports->where('location', $tuNhan) @endphp
                @for($i=0; $i<=17; $i++)
                    @php $column=\PHPExcel_Cell::stringFromColumnIndex($i); @endphp
                    <td>
                        {{ $report->sum($column) }}
                    </td>
                @endfor
            </tr>
        @endforeach
    @endif
    </tbody>
</table>
