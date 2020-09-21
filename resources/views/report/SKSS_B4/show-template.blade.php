@if ($report ?? false)
    <table class="table table-bordered" style="width: 3000px!important">
        @component('report.'.request()->type.'.thead')@endcomponent
        <tbody>
        <tr>
            <td style="text-align: center">I</td>
            <td style="text-align: center" class="nowrap">
                {{ $report->location }}
            </td>
            @for($i=0; $i<=19; $i++)
                @php $column=\PHPExcel_Cell::stringFromColumnIndex($i); @endphp
                <td>
                    {{ $report->$column }}
                </td>
            @endfor
        </tr>
        <tr>
            <td style="text-align: center">I.1</td>
            <td style="text-align: center" class="nowrap">
                Trong đó, nội tỉnh
            </td>
            @for($i=20; $i<=39; $i++)
                @php $column=\PHPExcel_Cell::stringFromColumnIndex($i); @endphp
                <td>
                    {{ $report->$column }}
                </td>
            @endfor
        </tr>
        </tbody>
    </table>
@endif

@if ($reports ?? false)
    @component('report.'.request()->type.'.show-template-custom', ['reports' => $reports, 'from' => 0, 'to' => 19])@endcomponent
    <br>
    <h3>Trong đó, nội tỉnh</h3>
    @component('report.'.request()->type.'.show-template-custom', ['reports' => $reports, 'from' => 20, 'to' => 39])@endcomponent
@endif
