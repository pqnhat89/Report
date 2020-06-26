@component('layouts.app')

@section('content')
<div class="container">
    <div class="text-center pb-5">
        <h1>Sức khỏe sinh sản</h1>
    </div>

    @if (($type ?? null) != 'tong-hop')
        <div class="text-right pb-1">
            <a class="btn btn-primary" href="b4/0/tao">Tạo mới</a>
        </div>
    @endif

    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>STT</th>
                <th>Năm</th>
                <th>Loại</th>
                <th width="1">Số Quận / Huyện đã gửi báo cáo</th>
                <th width="1"></th>
            </tr>
        </thead>
        <tbody>
            @if (count($b4))
                @foreach ($b4 as $no => $data)
                    <tr>
                        <td>{{ $no + 1 }}</td>
                        <td>{{ $data->nam }}</td>
                        <td nowrap>{{ \App\Enums\LoaiBaoCao::getTitle($data->loai) }}</td>
                        <td>{{ $data->count }}</td>
                        <td nowrap>
                        <a class="btn btn-info" href="b4/{{ $data->nam }}/{{ $data->loai }}">Tổng hợp</a>
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
