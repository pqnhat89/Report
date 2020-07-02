@component('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center">
            <h1>{{ \App\Enums\Types::toArray()[request()->type] }}</h1>
        </div>

        <div class="text-right pb-1">
            <a class="btn btn-primary" href="{{ route('report.create', ['type' => request()->type]) }}">Tạo mới</a>
        </div>

        <table class="table table-bordered table-hover table-striped">
            <thead>
            <tr>
                <th>STT</th>
                <th>Năm</th>
                <th>Loại</th>
                <th>Cơ sở</th>
                <th width="1"></th>
            </tr>
            </thead>
            <tbody>
            @if (count($reports))
                @foreach ($reports as $no => $report)
                    <tr>
                        <td>{{ $no + 1 }}</td>
                        <td>{{ $report->year }}</td>
                        <td nowrap>{{ $report->month }}</td>
                        <td nowrap>{{ $report->location }}</td>
                        <td nowrap>
                            <a class="btn btn-info" href="{{ route('report.show', ['type' => request()->type, 'id' => $report->id]) }}">Xem</a>
                            <a class="btn btn-primary" href="{{ route('report.edit', ['type' => request()->type, 'id' => $report->id]) }}">Sửa</a>
                            <form class="d-inline" method="POST"
                                  action="{{ route('report.delete', ['type' => request()->type, 'id' => $report->id]) }}">
                                {{ csrf_field() }}
                                <button class="btn btn-danger" typs4cone="submit"
                                        onclick="return confirm('Bạn có muốn xóa STT {{ $no + 1 }}?');">Xóa
                                </button>
                            </form>
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
