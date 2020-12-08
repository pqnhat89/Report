@if (!\App\Enums\UserRole::isNormalUser())
    <form class="pt-5 pb-5 text-center">
        <div class="text-center">
            <h4>Chọn thời gian muốn tổng hợp</h4>
        </div>
        <div class="row">
            <div class="form-group col-md">
                <label>Từ</label>
                @component('component.year', ['required' => 'true', 'name' => 'fromyear'])@endcomponent
            </div>
            <div class="form-group col-md">
                <label>Từ</label>
                @component('component.month', ['required' => 'true', 'name' => 'frommonth'])@endcomponent
            </div>
            <div class="form-group col-md">
                <br>
                ->
                <br>
                ->
            </div>
            <div class="form-group col-md">
                <label>Đến</label>
                @component('component.year', ['required' => 'true', 'name' => 'toyear'])@endcomponent
            </div>
            <div class="form-group col-md">
                <label>Đến</label>
                @component('component.month', ['required' => 'true', 'name' => 'tomonth'])@endcomponent
            </div>
            <div class="form-group col-md-12">
                <div class="nowrap">
                    <button type="submit" class="form-control btn btn-info" style="max-width: 100px">
                        Tổng hợp
                    </button>
                    <a class="form-control btn btn-secondary" href="{{ url()->current() }}" style="max-width: 100px">
                        Làm mới
                    </a>
                </div>
            </div>
        </div>
    </form>
@endif
