@php $n = \App\Enums\UserRole::isQuanHuyen() ? 0 : -2; @endphp
@if ($report ?? false)
    <table class="table table-bordered" style="width: 1700px!important">
        @component('report.'.request()->type.'.thead')@endcomponent
        <tbody>
        <tr>
            <td style="text-align: center">I</td>
            <td class="nowrap">
                {{ $report->location }}
            </td>
            @for($i=0; $i<=10+$n; $i++)
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
    @component('report.'.request()->type.'.show-template-custom', ['reports' => $reports, 'from' => 0, 'to' => 10+$n])@endcomponent
@endif
