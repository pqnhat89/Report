@component('layouts.app')

@section('content')
<div class="container">
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>STT</th>
                <th>Loại</th>
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
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@endcomponent
