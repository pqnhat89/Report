@php $attrName = $name ?? 'month'  @endphp
@php $months = \App\Enums\Months::monthsOfYear() @endphp
@if (in_array(request()->type, ['SKSS_B4', 'SKSS_B5', 'SKSS_B6', 'SKSS_B7', 'SKSS_B8', 'SKSS_THEM', 'B11']))
    @php $months = \App\Enums\Months::quartersOfYear() @endphp
@endif
@php $isRequired = 'required'  @endphp
@if ($required ?? false)
    @if($required == 'false')
        @php $isRequired = null  @endphp
    @endif
@endif
<label class="text-center">Tháng</label>
<select class="form-control" name="{{ $attrName }}" {{ $isRequired }}>
    <option value=''>Vui lòng chọn Tháng ...</option>
    @foreach($months as $month => $name)
        @php $selected = request($attrName) == $month ? 'selected' : null @endphp
        @if ($report ?? false)
            @php $selected = $report->month == $month ? 'selected' : null @endphp
        @endif
        <option value="{{ $month }}" {{ $selected }}>{{ $name }}</option>
    @endforeach
</select>
