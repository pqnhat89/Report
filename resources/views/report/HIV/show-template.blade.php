@php
    $titles = [
            'Phụ nữ mang thai',
            'Người bệnh lao',
            'Bệnh nhân mắc các nhiễm trùng LTQDTD',
            'Bệnh nhân nghi ngờ AIDS',
            'Người hiến máu',
            'Các đối tượng khác (ghi rõ)'
        ];
    $reports = ($reports ?? false) ? $reports : null;
@endphp
<table class="table table-bordered">
    @component('report.'.request()->type.'.thead', [
        'report' => $report ?? [],
        'reports' => $reports ?? []
    ])@endcomponent
    <tbody>
    @php $i=0 @endphp
    @foreach($titles as $no => $title)
        <tr>
            <td style="text-align: center">{{ $no+1 }}</td>
            <td class="nowrap">{{ $title }}</td>
            @php $a=0 @endphp
            @php $b=0 @endphp
            @php $sum=0 @endphp
            @for($j=1;$j<=14;$j++)
                <td>
                    @php $column=\PHPExcel_Cell::stringFromColumnIndex($i++); @endphp
                    @if ($report ?? false)
                        @php $sum = $report->$column @endphp
                    @endif
                    @if ($reports ?? false)
                        @php $sum = $reports->sum($column) @endphp
                    @endif
                    {{ $sum }}
                    @php $a+= $j%2 ? $sum : 0 @endphp
                    @php $b+= $j%2==0 ? $sum : 0 @endphp
                </td>
            @endfor
            @if (!in_array(request()->route()->getName(), ['report.create', 'report.edit']))
                <th style="font-weight: bold">{{ $a ? $a/2 : 0 }}</th>
                <th style="font-weight: bold">{{ $b ? $b/2 : 0 }}</th>
            @endif
        </tr>
    @endforeach
    @if (!in_array(request()->route()->getName(), ['report.create', 'report.edit']))
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold">Tổng</td>
            @php $a=0 @endphp
            @php $b=0 @endphp
            @php $sum=0 @endphp
            @for($i=0;$i<=13;$i++)
                @php $column1=\PHPExcel_Cell::stringFromColumnIndex($i); @endphp
                @php $column2=\PHPExcel_Cell::stringFromColumnIndex($i+14); @endphp
                @php $column3=\PHPExcel_Cell::stringFromColumnIndex($i+28); @endphp
                @php $column4=\PHPExcel_Cell::stringFromColumnIndex($i+42); @endphp
                @php $column5=\PHPExcel_Cell::stringFromColumnIndex($i+56); @endphp
                @php $column6=\PHPExcel_Cell::stringFromColumnIndex($i+70); @endphp
                <td style="font-weight: bold">
                    @if ($report ?? false)
                        @php $sum = $report->$column1 + $report->$column2 + $report->$column3 + $report->$column4 + $report->$column5 + $report->$column6 @endphp
                    @endif
                    @if ($reports ?? false)
                        @php $sum = $reports->sum($column1) + $reports->sum($column2) + $reports->sum($column3) + $reports->sum($column4) + $reports->sum($column5) + $reports->sum($column6) @endphp
                    @endif
                    {{ $sum }}
                    @php $a+= $i%2==0 ? $sum : 0 @endphp
                    @php $b+= $i%2 ? $sum : 0 @endphp
                </td>
            @endfor
            <td style="font-weight: bold">{{ $a ? $a/2 : 0 }}</td>
            <td style="font-weight: bold">{{ $b ? $b/2 : 0 }}</td>
        </tr>
    @endif
    </tbody>
</table>
