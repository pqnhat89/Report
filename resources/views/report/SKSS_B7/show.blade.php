@component('layouts.app')

@section('content')
    <div class="container">
        <p>Biểu số: 7/BCH</p>
        <div class="text-center pb-5">
            <h1>{{ \App\Enums\Types::getTitle(request()->type) }}</h1>
            <?php $month = ($report ?? false) ? $report->month : $reports[0]->month  ?>
            <?php $year = ($report ?? false) ? $report->year : $reports[0]->year  ?>
            <h4>Báo cáo {{ $month }} năm {{ $year }}</h4>
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
                <button class="btn btn-info" type="submit">Tải xuống</button>
            </form>
        </div>
@endsection

@endcomponent
