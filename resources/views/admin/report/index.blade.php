@component('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center">
            <h1>{{ \App\Enums\Types::getTitle(request()->type) }}</h1>
        </div>

        @component('component.search')
        @endcomponent

        <div class="row">
            <div class="col-md">
            </div>
            <div class="col-md">
                <div class="float-right">
                    {{ $reports->links() }}
                </div>
            </div>
        </div>

        <table class="table table-bordered table-hover table-striped">
            <thead>
            <tr>
                <th>STT</th>
                <th>Năm</th>
                <th>Loại</th>
                <th width="1" class="nowrap">Số Quận / Huyện đã gửi báo cáo</th>
                <th width="1"></th>
                <th width="1"></th>
            </tr>
            </thead>
            <tbody>
            @if (count($reports))
                @foreach ($reports as $no => $report)
                    <tr>
                        <td>{{ $no + 1 }}</td>
                        <td>{{ $report->year }}</td>
                        <td nowrap>{{  $report->month }}</td>
                        <td>{{ $report->count }}/{{ count(\App\Enums\Locations::toArray()) }}</td>
                        <td nowrap>
                            <a class="btn btn-info"
                               href="{{ route('admin.report.sum', [
                                    'type' => request()->type,
                                    'year' => $report->year,
                                    'month'=>$report->month
                                    ]) }}">
                                Tổng hợp</a>
                        </td>
                        <td nowrap>
                            <a href="{{ route('report.index', [
                                        'type' => request()->type,
                                        'year' => $report->year,
                                        'month'=>$report->month
                                    ]) }}" class="btn btn-info">
                                Chi tiết
                            </a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="99">Không có dữ liệu</td>
                </tr>
            @endif
            </tbody>
        </table>

        <div class="row">
            <div class="col-md">
            </div>
            <div class="col-md">
                <div class="float-right">
                    {{ $reports->links() }}
                </div>
            </div>
        </div>
@endsection

@endcomponent
