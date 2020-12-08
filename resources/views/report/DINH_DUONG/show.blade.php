@component('layouts.app')

@section('content')
    <div class="container">
        {{-- from -> to --}}
        @component('component.fromto')
        @endcomponent

        <div class="text-center pb-5">
            <?php $month = request()->month ?? (($report ?? false) ? $report->month : $reports[0]->month)  ?>
            <?php $year = request()->year ?? (($report ?? false) ? $report->year : $reports[0]->year)  ?>
            @php $inRange = request()->frommonth && request()->fromyear && request()->tomonth && request()->toyear @endphp
            @if ($inRange)
                <h1>{{ \App\Enums\Types::getTitle(request()->type) }} TỪ {{ mb_strtoupper(request()->frommonth) }}
                    NĂM {{ request()->fromyear }} ĐẾN {{ mb_strtoupper(request()->tomonth) }}
                    NĂM {{ request()->toyear }}</h1>
            @else
                <h1>{{ \App\Enums\Types::getTitle(request()->type) }} {{ mb_strtoupper($month) }} NĂM {{ $year }}</h1>
            @endif
            @if ($report ?? false)
                <div class="pt-3">
                    <strong>
                        Quận / Huyện: {{ $report->location }}
                    </strong>
                </div>
            @endif
        </div>
        <form method="POST">
            {{ csrf_field() }}
            <div class="overflow-x">
                @component('report.'.request()->type.'.show-template', ['report' => $report ?? [], 'reports' => $reports ?? []])
                @endcomponent
            </div>
        </form>
        <div class="pt-3 pb-3 text-right">
            <form>
                <input type="hidden" name="export" value="true">
                @foreach(request()->all() as $k => $v)
                    <input type="hidden" name="{{ $k }}" value="{{ $v }}">
                @endforeach
                <button class="btn btn-info" type="submit">Tải xuống</button>
            </form>
        </div>

        @if ($report ?? false)
            <p>Chỉ số 12a: thống kê và báo cáo tất cả số lượt bà mẹ có thai được tư vấn về dinh dưỡng bao gồm cả tư vấn
                trong khám thai, trong những ngày tiêm chủng, trong lớp giáo dục dinh dưỡng</p>
            <p>Chỉ số 12b: thống kê và báo cáo tất cả số lượt bà mẹ có con 0-24 tháng tuổi được tư vấn về dinh dưỡng
                bao gồm cả tư vấn trong khám bệnh hàng ngày, trong những ngày tiêm chủng, trong lớp giáo dục dinh
                dưỡng</p>
            <p>Chỉ số 13: trong file lưu danh sách trẻ tiêm chủng lập một cột <strong>bú mẹ hoàn toàn trong 6 tháng
                    đầu</strong>, khi trẻ được trên 6 tháng tuổi đến tiêm chủng hoặc nhận dịch vụ thì hỏi và đánh dấu
                vào cột này.
                Sau đó hàng tháng cộng tử số và mẫu số để báo cáo</p>
            <p>Chỉ số 14: trong file lưu danh sách trẻ tiêm chủng lập một cột <strong>bú mẹ đến 24 tháng tuổi</strong>,
                khi trẻ được trên
                24 tháng tuổi đến tiêm chủng hoặc nhận dịch vụ thì hỏi và đánh dấu vào cột này.
                Sau đó hàng tháng cộng tử số và mẫu số để báo cáo</p>
    @endif
@endsection

@endcomponent
