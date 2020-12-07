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
<table class="table table-bordered" style="min-width: 1000px!important;">
    <thead>
    @if (request()->export)
        @if ($report ?? false)
            <tr>
                <td colspan="4" style="text-align: center; font-weight: bold">
                    {!! \App\Enums\Types::getTitle(request()->type) !!} {{ mb_strtoupper($report->month) }}
                    NĂM {{ $report->year }}
                </td>
            </tr>
            <tr>
                <td colspan="4"></td>
            </tr>
        @endif
        @if ($reports ?? false)
            <tr>
                <td colspan="18" style="text-align: center; font-weight: bold">
                    {!! \App\Enums\Types::getTitle(request()->type) !!} {{ mb_strtoupper($reports[0]->month) }}
                    NĂM {{ $reports[0]->year }}
                </td>
            </tr>
            <tr>
                <td colspan="18"></td>
            </tr>
        @endif
    @endif
    @if ($report ?? false)
        <tr>
            <th style="text-align: center">STT</th>
            <th style="text-align: center">Chỉ số</th>
            <th style="text-align: center">Kết quả</th>
            <th style="text-align: center">Lũy tích</th>
        </tr>
    @endif
    @if ($reports ?? false)
        <tr>
            <th rowspan="2">STT</th>
            <th rowspan="2">Chỉ số</th>
            @foreach(\App\Enums\Locations::$tuyenHuyen as $tuyenHuyen)
                <th colspan="2" style="text-align: center">{{ $tuyenHuyen }}</th>
            @endforeach
            <th colspan="2" style="text-align: center">Tổng cộng</th>
        </tr>
        <tr>
            @foreach(\App\Enums\Locations::$tuyenHuyen as $tuyenHuyen)
                <th style="text-align: center">Kết quả</th>
                <th style="text-align: center">Lũy tích</th>
            @endforeach
            <th style="font-weight: bold; text-align: center">Kết quả</th>
            <th style="font-weight: bold; text-align: center">Lũy tích</th>
        </tr>
    @endif
    </thead>
    <tbody>
    @if ($report ?? false)
        @php $i = 0 @endphp
        @foreach($titles as $no => $title)
            <tr>
                <td style="text-align: center">{{ $no }}</td>
                <td style="{{ strpos($title, '*') !== false ? 'font-style: italic' : null }}">{{ $title }}</td>
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
        @php $reports = $reports @endphp
        @php $i = -1 @endphp
        @foreach($titles as $no => $title)
            <tr>
                <td style="text-align: center">{{ $no }}</td>
                <td style="{{ strpos($title, '*') !== false ? 'font-style: italic' : null }}">{{ $title }}</td>
                @foreach(\App\Enums\Locations::$tuyenHuyen as $tuyenHuyen)
                    @php $report = $reports->where('location', $tuyenHuyen)->first() @endphp
                    <td>
                        @php $column1=\PHPExcel_Cell::stringFromColumnIndex($i+1); @endphp
                        {{ $report->$column1 ?? 0 }}
                    </td>
                    <td>
                        @php $column2=\PHPExcel_Cell::stringFromColumnIndex($i+2); @endphp
                        {{ $report->$column2 ?? 0 }}
                    </td>
                @endforeach
                <td style="font-weight: bold">{{ $reports->sum($column1) }}</td>
                <td style="font-weight: bold">{{ $reports->sum($column2) }}</td>
            </tr>
            @php $i = $i+2 @endphp
        @endforeach
    @endif
    </tbody>
</table>
