@component('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center">
            <h1>{{ \App\Enums\Types::getTitle(request()->type) }}</h1>
        </div>

        @component('component.search')@endcomponent

        <div class="row">
            <div class="col-md">
                <div class="mb-3">
                    <a class="btn btn-primary" href="{{ route('report.create', ['type' => request()->type]) }}">
                        Tạo mới
                    </a>
                </div>
            </div>
            <div class="col-md">
                <div class="float-right">
                    {{ $reports->links() }}
                </div>
            </div>
        </div>

        <table class="table table-bordered table-hover table-striped text-center">
            <thead>
            <tr>
                <th>STT</th>
                <th>Năm</th>
                <th>Loại</th>
                @if (\App\Enums\UserRole::isAdmin())
                    <th>Cơ sở</th>
                @endif
                <th>Trạng thái</th>
                <th width="1"></th>
            </tr>
            </thead>
            <tbody>
            @if (count($reports))
                @foreach ($reports as $no => $report)
                    <tr>
                        <td>{{ $no + 1 }}</td>
                        <td>{{ $report->year }}</td>
                        <td nowrap>
                            {{  $report->month }}
                        </td>
                        @if (\App\Enums\UserRole::isAdmin())
                            <td nowrap>{{ $report->location }}</td>
                        @endif
                        <td>
                            {!! \App\Enums\Status::getTitle($report->status) !!}
                        </td>
                        <td nowrap>
                            <a class="btn btn-info"
                               href="{{ route('report.show', ['type' => request()->type, 'id' => $report->id]) }}">Xem</a>
                            @if (!$report->status)
                                <a class="btn btn-primary"
                                   href="{{ route('report.edit', ['type' => request()->type, 'id' => $report->id]) }}">Sửa</a>
                                <form class="d-inline" method="POST"
                                      action="{{ route('report.delete', ['type' => request()->type, 'id' => $report->id]) }}">
                                    {{ csrf_field() }}
                                    <button class="btn btn-danger" type="submit"
                                            onclick="return confirm('Bạn có muốn xóa STT {{ $no + 1 }}?');">Xóa
                                    </button>
                                </form>
                            @endif
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
