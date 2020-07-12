@php $isRequired = 'required'  @endphp
@if ($required ?? false)
    @if($required == false)
        @php $isRequired = null  @endphp
    @endif
@endif
<label class="text-center">Năm</label>
<select class="form-control" name="year" {{ $isRequired }}>
    <option value=''>Vui lòng chọn Năm ...</option>
    @php $currentYears = now()->format('Y') @endphp
    @php $start = ($report ?? false) ? ($report->year-5) : ($currentYears-5) @endphp
    @foreach(range($start, $currentYears+5) as $year)
        @php $selected = request()->year == $year ? 'selected' : null @endphp
        @if ($report ?? false)
            @php $selected = $report->year == $year ? 'selected' : null @endphp
        @endif
        <option value="{{ $year }}" {{ $selected }}>{{ $year }}</option>
    @endforeach
</select>
