<form class="pt-5 pb-5 text-center">
    <div class="row">
        <div class="form-group col-md-1 text-right">
            <label style="width: 100%">&nbsp;</label>
            <label class="col-form-label nowrap">Tìm kiếm:</label>
        </div>
        <div class="form-group col-md">
            <label>Năm</label>
            <input type="number" class="form-control" name="year" value="{{ request()->year }}"
                   placeholder="vd: {{ now()->format('Y') }}">
        </div>
        <div class="form-group col-md">
            @component('component.month')@endcomponent
        </div>
        @if (\App\Enums\UserRole::isAdmin())
            <div class="form-group col-md">
                @component('component.location')@endcomponent
            </div>
        @endif
        <div class="form-group col-md">
            <label>Trạng thái</label>
            <select class="form-control" name="status">
                <option value="">Vui lòng chọn ...</option>
                @foreach(\App\Enums\Status::toArray() as $status)
                    <option value="{{ $status }}" {{ request()->status === (string)$status ? 'selected' : null }}>
                        {!! \App\Enums\Status::getTitle($status) !!}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-12">
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
