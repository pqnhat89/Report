@component('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center pb-5">
            <?php $month = ($report ?? false) ? $report->month : (($reports ?? false) ? $reports[0]->month : null)  ?>
            <?php $year = ($report ?? false) ? $report->year : (($reports ?? false) ? $reports[0]->year : null)  ?>
            <div class="row pb-5">
                <div class="col-md-4 text-center">
                    <strong>SỞ Y TẾ THÀNH PHỐ ĐÀ NẴNG</strong><br>
                    @if ($report ?? false)
                        <strong>Đơn vị báo cáo: {{ $report->location }}</strong>
                    @endif
                    @if ($reports ?? false)
                        <strong>TRUNG TÂM KIỂM SOÁT BỆNH TẬT</strong>
                    @endif
                </div>
                <div class="col-md-8 text-center">
                    <strong>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</strong><br>
                    <strong>Độc lập – Tự do – Hạnh phúc</strong>
                </div>
            </div>
            <h1>{{ \App\Enums\Types::getTitle(request()->type) }}</h1>
        </div>
        <form method="POST">
            {{ csrf_field() }}
            <div class="overflow-x">
                @php
                    $titles = [
                            'Phụ nữ mang thai',
                            'Người bệnh lao',
                            'Bệnh nhân mắc các nhiễm trùng LTQDTD',
                            'Bệnh nhân nghi ngờ AIDS',
                            'Người hiến máu',
                            'Các đối tượng khác (ghi rõ)'
                        ];
                @endphp
                <table class="table table-bordered" style="width: 1800px!important;">
                    @component('report.'.request()->type.'.thead')@endcomponent
                    <tbody>
                    @php $i=0 @endphp
                    @foreach($titles as $no => $title)
                        <tr>
                            <td style="text-align: center">{{ $no+1 }}</td>
                            <td class="nowrap">{{ $title }}</td>
                            @for($j=1;$j<=14;$j++)
                                <td>
                                    @php $column=\PHPExcel_Cell::stringFromColumnIndex($i++); @endphp
                                    <input class="form-control" name="{{ $column }}"
                                           value="{{ $report->$column ?? 0 }}"
                                           type="number" required>
                                </td>
                            @endfor
                        </tr>
                    @endforeach
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
                <div class="col-sm">
                    <div class="row">
                        <div class="col-sm">
                            @if (\App\Enums\UserRole::isAdmin())
                                @component('component.location',['report' => $report ?? false])@endcomponent
                            @endif
                        </div>
                        <div class="col-sm text-right">
                            <button type="submit" class="btn btn-primary">Lưu</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
@endsection

@endcomponent
