@component('layouts.app')

@section('content')
    <div class="container">
        {{-- from -> to --}}
        @component('component.fromto')
        @endcomponent

        <p>{{ \App\Enums\Types::getTitle2(request()->type) }}</p>
        <div class="text-center pb-5">
            <h1>{{ \App\Enums\Types::getTitle(request()->type) }}</h1>
            <?php $month = request()->month ?? (($report ?? false) ? $report->month : $reports[0]->month)  ?>
            <?php $year = request()->year ?? (($report ?? false) ? $report->year : $reports[0]->year)  ?>
            @php $inRange = request()->frommonth && request()->fromyear && request()->tomonth && request()->toyear @endphp
            @if ($inRange)
                <h4>Báo cáo từ {{ mb_strtolower(request()->frommonth) }} năm {{ request()->fromyear }} đến {{ mb_strtolower(request()->tomonth) }} năm {{ request()->toyear }}</h4>
            @else
                <h4>Báo cáo {{ $month }} năm {{ $year }}</h4>
            @endif
        </div>
        <form method="POST">
            {{ csrf_field() }}
            <div class="overflow-x">
                @component('report.'.request()->type.'.show-template', ['report' => $report ?? [], 'reports' => $reports ?? []])
                @endcomponent
            </div>
        </form>
        <div class="pt-3 text-right">
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
