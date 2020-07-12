@component('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center pb-5">
            <?php $month = ($report ?? false) ? $report->month : $reports[0]->month  ?>
            <?php $year = ($report ?? false) ? $report->year : $reports[0]->year  ?>
            <div class="row pb-5">
                <div class="col-md-4 text-center">
                    <strong>SỞ Y TẾ THÀNH PHỐ ĐÀ NẴNG</strong><br>
                    @if ($report ?? false)
                        <strong>Đơn vị báo cáo: {{ $report->location }}</strong>
                    @endif
                    @if ($reports ?? false)
                        <strong>TRUNG TÂM KIỂM SOÁT BỆNH TẬT</strong>
                    @endif
                </div>
                <div class="col-md-8 text-center">
                    <strong>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</strong><br>
                    <strong>Độc lập – Tự do – Hạnh phúc</strong>
                </div>
            </div>
            <h1>{{ \App\Enums\Types::getTitle(request()->type) }} {{ mb_strtoupper($month) }} NĂM {{ $year }}</h1>
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
@endsection

@endcomponent
