@if ($report ?? false)
    <table class="table table-bordered" style="width: 1700px!important">
        @component('report.'.request()->type.'.thead')@endcomponent
        <tbody>
        <tr>
            <td style="text-align: center">I</td>
            <td class="nowrap">
                {{ $report->location }}
            </td>
            @for($i=0; $i<=10; $i++)
                @php $column=\PHPExcel_Cell::stringFromColumnIndex($i); @endphp
                <td>
                    {{ $report->$column }}
                </td>
            @endfor
        </tr>
        <tr>
            <td style="text-align: center">I</td>
            <td class="nowrap">
                Trong đó, nội tỉnh
            </td>
            @for($i=11; $i<=21; $i++)
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
    @component('report.'.request()->type.'.show-template-custom', ['reports' => $reports, 'from' => 0, 'to' => 10])@endcomponent
    <br>
    <h3>Trong đó, nội tỉnh</h3>
    @component('report.'.request()->type.'.show-template-custom', ['reports' => $reports, 'from' => 11, 'to' => 21])@endcomponent
@endif
