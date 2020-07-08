@php
    $titles = [
            '1' => 'Số TE < 5T',
            '2' => 'Số TE < 5T được cân tháng 6 hàng năm',
            '3' => 'Số TE < 5T được cân bị SDD',
            '4' => 'Số trẻ SDD < 5T được cân hàng tháng',
            '5' => 'TS TE < 2T',
            '6' => 'Số BM có con < 2T',
            '7' => 'Số TE < 2T có BĐPT',
            '8' => 'Số trẻ < 2T được cân trong tháng( 3 tháng/1 lần)',
            '9' => 'Tổng số trẻ SDD < 2T',
            '10' => 'Số trẻ SDD < 2T được cân hàng tháng',
            '11' => 'Số BM sau đẻ được uống vitamin A',
            '12a' => '	Số lượt BM có thai được hướng dẫn dinh dưỡng',
            '12b' => '	Số lượt BM có con 0-24 tháng tuổi được hướng dẫn dinh dưỡng',
            '13' => 'Tỷ lệ bà mẹ cho trẻ bú mẹ hoàn toàn trong 6 tháng đầu',
            '13.1' => '* Số bà mẹ cho trẻ bú mẹ hoàn toàn trong 6 tháng đầu',
            '13.2' => '* Tổng số bà mẹ được hỏi',
            '14' => 'Tỷ lệ bà mẹ cho trẻ bú mẹ đến 24 tháng tuổi hoặc lâu hơn',
            '14.1' => '* Số bà mẹ cho trẻ bú mẹ đến 24 tháng tuổi hoặc lâu hơn',
            '14.2' => '* Tổng số bà mẹ được hỏi'
        ];
@endphp
<table class="table table-bordered">
    <thead>
    <th>STT</th>
    <th>Chỉ số</th>
    <th>Kết quả</th>
    <th>Lũy tích</th>
    </thead>
    <tbody>
    @if ($report ?? false)
        @php $i = 0 @endphp
        @foreach($titles as $no => $title)
            <tr>
                <td style="text-align: center">{{ $no }}</td>
                <td>{{ $title }}</td>
                <td>
                    @php $column=\PHPExcel_Cell::stringFromColumnIndex($i++); @endphp
                    {{ $report->$column }}
                </td>
                <td>
                    @php $column=\PHPExcel_Cell::stringFromColumnIndex($i++); @endphp
                    {{ $report->$column }}
                </td>
            </tr>
        @endforeach
    @endif
    @if ($reports ?? false)
        <tr>
            <td></td>
            <td class="nowrap" style="text-align: center; font-weight: bold">TỔNG SỐ</td>
            <td></td>
            <td></td>
            @for($i=0; $i<=17; $i++)
                @php $column=\PHPExcel_Cell::stringFromColumnIndex($i); @endphp
                <td style="font-weight: bold">
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
