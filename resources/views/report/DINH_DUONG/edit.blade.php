@php
    $titles = [
            '1' => 'Số TE < 5T',
            '2' => 'Số TE < 5T được cân tháng 6 hàng năm',
            '3' => 'Số TE < 5T được cân bị SDD',
            '4' => 'Số trẻ SDD < 5T được cân hàng tháng',
            '5' => 'TS TE < 2T',
            '6' => 'Số BM có con < 2T',
            '7' => 'Số TE < 2T có BĐPT',
            '8' => 'Số trẻ < 2T được cân trong tháng( 3 tháng/1 lần)',
            '9' => 'Tổng số trẻ SDD < 2T',
            '10' => 'Số trẻ SDD < 2T được cân hàng tháng',
            '11' => 'Số BM sau đẻ được uống vitamin A',
            '12a' => '	Số lượt BM có thai được hướng dẫn dinh dưỡng',
            '12b' => '	Số lượt BM có con 0-24 tháng tuổi được hướng dẫn dinh dưỡng',
            '13' => 'Tỷ lệ bà mẹ cho trẻ bú mẹ hoàn toàn trong 6 tháng đầu',
            '13.1' => '* Số bà mẹ cho trẻ bú mẹ hoàn toàn trong 6 tháng đầu',
            '13.2' => '* Tổng số bà mẹ được hỏi',
            '14' => 'Tỷ lệ bà mẹ cho trẻ bú mẹ đến 24 tháng tuổi hoặc lâu hơn',
            '14.1' => '* Số bà mẹ cho trẻ bú mẹ đến 24 tháng tuổi hoặc lâu hơn',
            '14.2' => '* Tổng số bà mẹ được hỏi'
        ];
@endphp

@component('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" class="pb-3">
            <div class="text-center pb-5">
                <h1>{{ \App\Enums\Types::getTitle(request()->type) }} {{ $report->year ?? now()->format('Y') }}</h1>
                <div class="row pt-2">
                    <div class="col-md text-left">
                        {{ $report->location ?? \Illuminate\Support\Facades\Auth::user()->location }}
                    </div>
                    <div class="col-md text-right">
                        <div class="row">
                            <label class="col-form-label col-md-6">Tháng:</label>
                            <div class="col-md-6">
                                <select class="form-control" name="month" required>
                                    <option value="">Vui lòng chọn Tháng ...</option>
                                    @for ($i=1; $i<=12; $i++)
                                        @php $month = "Tháng $i"; @endphp
                                        <option
                                            value="{{ $month }}" {{ ($report->month ?? null) == $month ? 'selected' : null }}>
                                            {{ $month }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{ csrf_field() }}
            <div class="overflow-x">
                <table class="table table-bordered">
                    <thead>
                    <th>STT</th>
                    <th>Chỉ số</th>
                    <th>Kết quả</th>
                    <th>Lũy tích</th>
                    </thead>
                    <tbody>
                    @php $i = 0 @endphp
                    @foreach($titles as $no => $title)
                        <tr>
                            <td style="text-align: center">{{ $no }}</td>
                            <td>{{ $title }}</td>
                            <td>
                                @php $column=\PHPExcel_Cell::stringFromColumnIndex($i++); @endphp
                                <input class="form-control" name="{{ $column }}" value="{{ $report->$column ?? null }}"
                                       type="number" required>
                            </td>
                            <td>
                                @php $column=\PHPExcel_Cell::stringFromColumnIndex($i++); @endphp
                                <input class="form-control" name="{{ $column }}" value="{{ $report->$column ?? null }}"
                                       type="number" required>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pt-3 text-right">
                <button type="submit" class="btn btn-primary">Lưu</button>
            </div>
        </form>
        @if ($report ?? false)
            <p>Chỉ số 12a: thống kê và báo cáo tất cả số lượt bà mẹ có thai được tư vấn về dinh dưỡng bao gồm cả tư vấn
                trong khám thai, trong những ngày tiêm chủng, trong lớp giáo dục dinh dưỡng</p>
            <p>Chỉ số 12b: thống kê và báo cáo tất cả số lượt bà mẹ có con 0-24 tháng tuổi được tư vấn về dinh dưỡng
                bao gồm cả tư vấn trong khám bệnh hàng ngày, trong những ngày tiêm chủng, trong lớp giáo dục dinh
                dưỡng</p>
            <p>Chỉ số 13: trong file lưu danh sách trẻ tiêm chủng lập một cột <strong>bú mẹ hoàn toàn trong 6 tháng
                    đầu</strong>, khi trẻ được trên 6 tháng tuổi đến tiêm chủng hoặc nhận dịch vụ thì hỏi và đánh dấu
                vào cột này.
                Sau đó hàng tháng cộng tử số và mẫu số để báo cáo</p>
            <p>Chỉ số 14: trong file lưu danh sách trẻ tiêm chủng lập một cột <strong>bú mẹ đến 24 tháng tuổi</strong>,
                khi trẻ được trên
                24 tháng tuổi đến tiêm chủng hoặc nhận dịch vụ thì hỏi và đánh dấu vào cột này.
                Sau đó hàng tháng cộng tử số và mẫu số để báo cáo</p>
    @endif
@endsection

@endcomponent
