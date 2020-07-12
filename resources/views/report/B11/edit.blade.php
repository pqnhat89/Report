@component('layouts.app')

@section('content')
    <div class="container">
        <p>Biểu: 11/BCH</p>
        <div class="text-center pb-5">
            <h1>{{ \App\Enums\Types::getTitle(request()->type) }}</h1>
            <h4>Báo cáo 3, 6, 9 và 12 tháng</h4>
        </div>
        <form method="POST">
            {{ csrf_field() }}
            <div class="overflow-x">
                <table class="table table-bordered" style="width: 7000px!important">
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
                        @for($i=0; $i<=19; $i++)
                            @php $column = \PHPExcel_Cell::stringFromColumnIndex($i); @endphp
                            <td>
                                <input class="form-control" name="{{ $column }}" value="{{ $report->$column ?? null }}"
                                       type="number" required>
                            </td>
                        @endfor

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
                        @for($i=20; $i<=39; $i++)
                            @php $column = \PHPExcel_Cell::stringFromColumnIndex($i); @endphp
                            <td>
                                <input class="form-control" name="{{ $column }}" value="{{ $report->$column ?? null }}"
                                       type="number" required>
                            </td>
                        @endfor

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
                        @for($i=40; $i<=63; $i++)
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
            <div class="row pt-3">
                <div class="col-sm">
                    <div class="row">
                        <div class="col-sm">
                            @component('component.year',['report' => $report ?? false])@endcomponent
                        </div>
                        <div class="col-sm">
                            @component('component.month',['report' => $report ?? false])@endcomponent
                        </div>
                    </div>
                </div>
                <div class="col-sm text-right">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </div>
        </form>
@endsection

@endcomponent
