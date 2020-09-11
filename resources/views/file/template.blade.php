@component('layouts.app')

@section('content')
    <div class="container">
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>Tên file</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach(\App\Enums\FileNames::toArray() as $type => $filename)
                <tr>
                    <td>{{ $filename }}</td>
                    <td class="text-center">
                        <a class="btn btn-warning" href="{{ route('file.template', ['type' => $type]) }}">Tải mẫu</a>
                        @if (\App\Enums\UserRole::isNormalUser())
                            <a class="btn btn-info" href="{{ route('report.index', ['type' => $type]) }}">Chi tiết</a>
                        @endif
                        @if (\App\Enums\UserRole::isAdmin() || \App\Enums\UserRole::isDepartment())
                            <a class="btn btn-info" href="{{ route('admin.report.index', ['type' => $type]) }}">
                                Tổng hợp
                            </a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@endcomponent
