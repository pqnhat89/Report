@component('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center pb-5">
            <h1>Quản lý tài khoản</h1>
        </div>

        <div class="row">
            <div class="col-md">
                <div class="mb-3">
                    <a class="btn btn-primary" href="{{ route('user.create', ['email' => 0]) }}">Tạo mới</a>
                </div>
            </div>
            <div class="col-md">
                <div class="float-right">
                    {{ $users->links() }}
                </div>
            </div>
        </div>

        <table class="table table-bordered table-hover table-striped">
            <thead>
            <tr>
                <th>STT</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Trực thuộc</th>
                <th width="1"></th>
            </tr>
            </thead>
            <tbody>
            @if (count($users))
                @foreach ($users as $no => $user)
                    <tr>
                        <td>{{ $no + 1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @switch($user->role)
                                @case(\App\Enums\UserRole::NormalUser)
                                {{ $user->location }}
                                @break
                                @case(\App\Enums\UserRole::Admin)
                                <strong>THÀNH PHỐ (quản trị)</strong>
                                @break
                                @case(\App\Enums\UserRole::Department)
                                {{ \App\Enums\UserRole::getTitle(\App\Enums\UserRole::Department) }}
                                @break
                                @default
                                <i>Đang chờ xét duyệt</i>
                            @endswitch
                        </td>
                        <td nowrap>
                            <a class="btn btn-primary"
                               href="{{ route('user.edit', ['email' => $user->email]) }}">Sửa</a>
                            @if ($user->role != \App\Enums\UserRole::Admin)
                                <form class="d-inline" method="post"
                                      action="{{ route('user.delete', ['email' => $user->email]) }}">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Bạn có muốn xóa {{ $user->email }}?');">Xóa
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
                    {{ $users->links() }}
                </div>
            </div>
        </div>
@endsection

@endcomponent
