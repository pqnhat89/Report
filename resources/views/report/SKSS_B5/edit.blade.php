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
                <table class="table table-bordered" style="width: 2000px!important">
                    @component('report.'.request()->type.'.thead')@endcomponent
                    <tbody>
                    <tr>
                        <td class="text-center">I</td>
                        <td class="text-center nowrap">
                            @if (\App\Enums\UserRole::isAdmin())
                                @component('component.location', ['report' => $report ?? false])@endcomponent
                            @else
                                {{ $report->location ?? \Illuminate\Support\Facades\Auth::user()->location }}
                            @endif
                        </td>
                        @for($i=0; $i<=15; $i++)
                            @php $column = \PHPExcel_Cell::stringFromColumnIndex($i); @endphp
                            <td>
                                <input class="form-control" name="{{ $column }}" value="{{ $report->$column ?? 0 }}"
                                       type="number" required>
                            </td>
                        @endfor
                    </tr>
                    <tr>
                        <td class="text-center">I.1</td>
                        <td class="text-center nowrap">
                            Trong đó, nội tỉnh
                        </td>
                        @for($i=16; $i<=31; $i++)
                            @php $column = \PHPExcel_Cell::stringFromColumnIndex($i); @endphp
                            <td>
                                <input class="form-control" name="{{ $column }}" value="{{ $report->$column ?? 0 }}"
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
