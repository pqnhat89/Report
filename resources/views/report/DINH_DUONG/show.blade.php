@component('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center pb-5">
            <?php $month = ($report ?? false) ? $report->month : $reports[0]->month  ?>
            <?php $year = ($report ?? false) ? $report->year : $reports[0]->year  ?>
            <h1>{{ str_replace('XXX', $year, \App\Enums\Types::getTitle(request()->type)) }} {{ $year }}</h1>
            <div class="row pt-2">
                <div class="col-md text-center">
                    @if ($report ?? false)
                        Quận / Huyện: {{ $report->location }}
                    @endif
                </div>
                <div class="col-md text-center">
                    Tháng: {{ $month }}
                </div>
            </div>
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
