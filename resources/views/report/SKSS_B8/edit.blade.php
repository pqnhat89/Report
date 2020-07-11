@component('layouts.app')

@section('content')
    <div class="container">
        <p>{{ \App\Enums\Types::getTitle2(request()->type) }}</p>
        <div class="text-center pb-5">
            <h1>{{ \App\Enums\Types::getTitle(request()->type) }}</h1>
            <h4>Báo cáo 3, 6, 9 và 12 tháng</h4>
        </div>
        <form method="POST">
            {{ csrf_field() }}
            <div class="overflow-x">
                <table class="table table-bordered" style="width: 1600px!important">
                    @component('report.'.request()->type.'.thead')@endcomponent
                    <tbody>
                    <tr>
                        <td class="text-center">I</td>
                        <td class="text-center nowrap">
                            @if (\App\Enums\UserRole::isAdmin())
                                <select class="form-control" name="location" required>
                                    <option value="">Vui lòng chọn ...</option>
                                    @foreach(\App\Enums\Locations::toArray() as $location)
                                        <option
                                            value="{{ $location }}" {{ ($report->location ?? null) == $location ? 'selected' : null }}>
                                            {{ $location }}
                                        </option>
                                    @endforeach
                                </select>
                            @else
                                {{ $report->location ?? \Illuminate\Support\Facades\Auth::user()->location }}
                            @endif
                        </td>
                        @for($i=0; $i<=11; $i++)
                            @php $column = \PHPExcel_Cell::stringFromColumnIndex($i); @endphp
                            <td>
                                <input class="form-control" name="{{ $column }}" value="{{ $report->$column ?? null }}"
                                       type="number" required>
                            </td>
                        @endfor
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="row pt-5">
                <div class="col-sm">
                    <select class="form-control" name="month" required>
                        <option value="">Vui lòng chọn Quý ...</option>
                        @foreach (\App\Enums\Months::monthsOfYear() as $month)
                            <option
                                value="{{ $month }}" {{ ($report->month ?? null) == $month ? 'selected' : null }}>{{ $month }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm text-right">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </div>
        </form>
@endsection

@endcomponent
