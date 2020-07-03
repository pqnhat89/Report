@component('layouts.app')

@section('content')
    <div class="container">
        <p>Biểu số: 4/BCH</p>
        <div class="text-center pb-5">
            <h1>HOẠT ĐỘNG CHĂM SÓC BÀ MẸ</h1>
            <h4>Báo cáo {{ $report->month }} năm {{ $report->year }}</h4>
        </div>
        <form method="POST">
            {{ csrf_field() }}
            <div class="overflow-x">
                @component('report.'.request()->type.'.show-template', ['report' => $report])
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
