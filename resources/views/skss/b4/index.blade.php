@component('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center">
            <h1>Sức khỏe sinh sản</h1>
        </div>

        <div class="text-right pb-1">
            <a class="btn btn-primary" href="{{ route('skss.b4.create', ['id' => 0]) }}">Tạo mới</a>
        </div>

        <table class="table table-bordered table-hover table-striped">
            <thead>
            <tr>
                <th>STT</th>
                <th>Năm</th>
                <th>Loại</th>
                <th>Quận/Huyện</th>
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
                        <td nowrap>{{ $data->quan_huyen_name }}</td>
                        <td nowrap>
                            <a class="btn btn-info" href="{{ route('skss.b4.show', ['id' => $data->id]) }}">Xem</a>
                            <a class="btn btn-primary" href="{{ route('skss.b4.edit', ['id' => $data->id]) }}">Sửa</a>
                            <form class="d-inline" method="POST"
                                  action="{{ route('skss.b4.delete', ['id' => $data->id]) }}">
                                {{ csrf_field() }}
                                <button class="btn btn-danger" type="submit">Xóa</button>
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
