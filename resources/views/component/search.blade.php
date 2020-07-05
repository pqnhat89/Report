<form class="pt-5 pb-5 text-center">
    <div class="row">
        <div class="form-group col-md-2 text-right">
            <label style="width: 100%">&nbsp;</label>
            <label class="col-form-label nowrap">Tìm kiếm:</label>
        </div>
        <div class="form-group col-md-2">
            <label>Năm</label>
            <input type="number" class="form-control" name="year" value="{{ request()->year }}"
                   placeholder="vd: {{ now()->format('Y') }}">
        </div>
        <div class="form-group col-md-2">
            <label>Tháng</label>
            <select class="form-control" name="month">
                <option value="">Vui lòng chọn ...</option>
                @foreach(\App\Enums\Months::toArray() as $month)
                    <option
                        value="{{ $month }}" {{ request()->month == $month ? 'selected' : null }}>{{ $month }}</option>
                @endforeach
            </select>
        </div>
        @if (\App\Enums\UserRole::isAdmin())
            <div class="form-group col-md-3">
                <label>Cơ sở</label>
                <select class="form-control" name="location">
                    <option value="">Vui lòng chọn ...</option>
                    @foreach(\App\Enums\Locations::toArray() as $location)
                        <option
                            value="{{ $location }}" {{ request()->location == $location ? 'selected' : null }}>{{ $location }}</option>
                    @endforeach
                </select>
            </div>
        @endif
        <div class="form-group col-md-3">
            <label style="width: 100%">&nbsp;</label>
            <div class="nowrap">
                <button type="submit" class="form-control btn btn-info" style="max-width: 100px">
                    Tìm kiếm
                </button>
                <a class="form-control btn btn-secondary" href="{{ url()->current() }}" style="max-width: 100px">
                    Làm mới
                </a>
            </div>
        </div>
    </div>
</form>
