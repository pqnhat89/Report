<table class="table table-bordered" style="width: 7000px!important;">
    @component('report.'.request()->type.'.thead')@endcomponent
    <tbody>
    @if ($report ?? false)
        <tr>
            <td style="text-align: center">I</td>
            <td class="nowrap">
                {{ $report->location }}
            </td>
            @for($i=0; $i<=19; $i++)
                @php $column=\PHPExcel_Cell::stringFromColumnIndex($i); @endphp
                <td>
                    {{ $report->$column }}
                </td>
            @endfor

            <td style="text-align: center">I</td>
            <td class="nowrap">
                {{ $report->location }}
            </td>
            @for($i=20; $i<=39; $i++)
                @php $column=\PHPExcel_Cell::stringFromColumnIndex($i); @endphp
                <td>
                    {{ $report->$column }}
                </td>
            @endfor

            <td style="text-align: center">I</td>
            <td class="nowrap">
                {{ $report->location }}
            </td>
            @for($i=40; $i<=63; $i++)
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
            @for($i=0; $i<=19; $i++)
                @php $column=\PHPExcel_Cell::stringFromColumnIndex($i); @endphp
                <td style="font-weight: bold">
                    {{ $reports->sum($column) }}
                </td>
            @endfor

            <td></td>
            <td class="nowrap" style="text-align: center; font-weight: bold">TỔNG SỐ</td>
            @for($i=20; $i<=39; $i++)
                @php $column=\PHPExcel_Cell::stringFromColumnIndex($i); @endphp
                <td style="font-weight: bold">
                    {{ $reports->sum($column) }}
                </td>
            @endfor

            <td></td>
            <td class="nowrap" style="text-align: center; font-weight: bold">TỔNG SỐ</td>
            @for($i=40; $i<=63; $i++)
                @php $column=\PHPExcel_Cell::stringFromColumnIndex($i); @endphp
                <td style="font-weight: bold">
                    {{ $reports->sum($column) }}
                </td>
            @endfor
        </tr>
        @php $no=1 @endphp
        @foreach(\App\Enums\Locations::$tuyenHuyen as $tuyenHuyen)
            <tr>
                <td style="text-align: center">{{ $no }}</td>
                <td nowrap style="color: purple">{{ $tuyenHuyen }}</td>
                @php $report = $reports->where('location', $tuyenHuyen) @endphp
                @for($i=0; $i<=19; $i++)
                    @php $column=\PHPExcel_Cell::stringFromColumnIndex($i); @endphp
                    <td>
                        {{ $report->sum($column) }}
                    </td>
                @endfor

                <td style="text-align: center">{{ $no }}</td>
                <td nowrap style="color: purple">{{ $tuyenHuyen }}</td>
                @php $report = $reports->where('location', $tuyenHuyen) @endphp
                @for($i=20; $i<=39; $i++)
                    @php $column=\PHPExcel_Cell::stringFromColumnIndex($i); @endphp
                    <td>
                        {{ $report->sum($column) }}
                    </td>
                @endfor

                <td style="text-align: center">{{ $no }}</td>
                <td nowrap style="color: purple">{{ $tuyenHuyen }}</td>
                @php $report = $reports->where('location', $tuyenHuyen) @endphp
                @for($i=40; $i<=63; $i++)
                    @php $column=\PHPExcel_Cell::stringFromColumnIndex($i); @endphp
                    <td>
                        {{ $report->sum($column) }}
                    </td>
                @endfor

                @php $no=$no+1 @endphp
            </tr>
        @endforeach
    @endif
    </tbody>
</table>
