@component('layouts.app')

@section('content')
    <div class="container">
        {{-- from -> to --}}
        @component('component.fromto')
        @endcomponent

        <div class="text-center pb-5">
            <?php $month = request()->month ?? (($report ?? false) ? $report->month : $reports[0]->month)  ?>
            <?php $year = request()->year ?? (($report ?? false) ? $report->year : $reports[0]->year)  ?>
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
            @php $inRange = request()->frommonth && request()->fromyear && request()->tomonth && request()->toyear @endphp
            @if ($inRange)
                <h1>{{ \App\Enums\Types::getTitle(request()->type) }} TỪ {{ mb_strtoupper(request()->frommonth) }}
                    NĂM {{ request()->fromyear }} ĐẾN {{ mb_strtoupper(request()->tomonth) }}
                    NĂM {{ request()->toyear }}</h1>
            @else
                <h1>{{ \App\Enums\Types::getTitle(request()->type) }} {{ mb_strtoupper($month) }} NĂM {{ $year }}</h1>
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
@endsection

@endcomponent
