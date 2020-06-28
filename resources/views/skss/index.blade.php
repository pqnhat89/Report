@component('layouts.app')

@section('content')
<div class="container">
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>STT</th>
                <th>Loại</th>
                @if (\App\Enums\UserRole::isAdmin())
                <th></th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($skss as $no => $type)
            <tr>
                <td>{{ $no+1 }}</td>
                <td>
                    <a class="btn btn-info btn-lg" href="{{ url()->full() }}/{{ $type }}">
                        {{ $type }} {{ $no ? " (đang cập nhật)" : null }}
                    </a>
                </td>
                @if (\App\Enums\UserRole::isAdmin())
                <td>
                    <a class="btn btn-link" href="{{ route('skss.'.$type.'.index') }}">Chi tiết</a>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
    @endsection

    @endcomponent
