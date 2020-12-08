@php $locations = \App\Enums\Locations::toArray() @endphp
{{--@if (in_array(request()->type, ['B11', 'DINH_DUONG', 'HIV']))--}}
{{--    @php $locations = \App\Enums\Locations::$tuyenHuyen @endphp--}}
{{--@endif--}}
@php $isRequired = 'required'  @endphp
@if ($required ?? false)
    @if($required == 'false')
        @php $isRequired = null  @endphp
    @endif
@endif
<label class="text-center location">Cơ sở</label>
<select class="form-control" name="location" {{ $isRequired }}>
    <option value=''>Vui lòng chọn Cơ sở ...</option>
    @foreach($locations as $location)
        @php $selected = request()->location == $location ? 'selected' : null @endphp
        @if ($report ?? false)
            @php $selected = $report->location == $location ? 'selected' : null @endphp
        @endif
        <option value="{{ $location }}" {{ $selected }}>{{ $location }}</option>
    @endforeach
</select>
