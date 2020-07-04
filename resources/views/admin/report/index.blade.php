@component('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center pb-5">
            <h1>Sức khỏe sinh sản</h1>
        </div>

        @if (($type ?? null) != 'tong-hop')
            <div class="text-right pb-1">
                <a class="btn btn-primary" href="{{ route('report.create', ['type' => request()->type]) }}">Tạo mới</a>
            </div>
        @endif

        <table class="table table-bordered table-hover table-striped">
            <thead>
            <tr>
                <th>STT</th>
                <th>Năm</th>
                <th>Loại</th>
                <th width="1" class="nowrap">Số Quận / Huyện đã gửi báo cáo</th>
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
                            <a class="btn btn-info" href="b4/{{ $report->nam }}/{{ $report->loai }}">Tổng hợp</a>
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
@endsection

@endcomponent
