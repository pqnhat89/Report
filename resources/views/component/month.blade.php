@php $isRequired = 'required'  @endphp
@if ($required ?? false)
    @if($required == false)
        @php $isRequired = null  @endphp
    @endif
@endif
<div class="text-center">Tháng</div>
<select class="form-control" name="month" {{ $isRequired }}>
    <option value=''>Vui lòng chọn Tháng ...</option>
    @foreach(\App\Enums\Months::monthsOfYear() as $month)
        @php $selected = request()->month == $month ? 'selected' : null @endphp
        @if ($report ?? false)
            @php $selected = $report->month == $month ? 'selected' : null @endphp
        @endif
        <option value="{{ $month }}" {{ $selected }}>{{ $month }}</option>
    @endforeach
</select>
