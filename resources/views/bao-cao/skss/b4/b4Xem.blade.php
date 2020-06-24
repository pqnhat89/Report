@component('layouts.app')

@section('content')
<div class="container">
    <div class="text-center">
        <h1>HOẠT ĐỘNG CHĂM SÓC BÀ MẸ</h1>
        <h4>Báo cáo 3, 6, 9 và 12 tháng</h4>
    </div>

    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên</th>
                <th width="1"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($b4 as $no => $data)
                <tr>
                    <td>{{ $no + 1 }}</td>
                    <td>{{ $data->ten }}</td>
                    <td nowrap>
                    <a class="btn btn-info" href="b4/{{ $data->id }}">Xem</a>
                        <a class="btn btn-primary">Sửa</a>
                        <a class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@endcomponent
