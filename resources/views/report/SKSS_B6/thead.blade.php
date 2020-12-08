<thead>
@if (request()->export)
    <tr>
        <td colspan="16">
            {{ \App\Enums\Types::getTitle2(request()->type) }}
        </td>
    </tr>
    <tr>
        <td colspan="16" style="text-align: center; font-weight: bold">
            {{ \App\Enums\Types::getTitle(request()->type) }}
        </td>
    </tr>
    <tr>
        <td colspan="16" style="text-align: center">
            @php $inRange = request()->frommonth && request()->fromyear && request()->tomonth && request()->toyear @endphp
            @if ($inRange)
                Báo cáo từ {{ mb_strtolower(request()->frommonth) }} năm {{ request()->fromyear }} đến {{ mb_strtolower(request()->tomonth) }} năm {{ request()->toyear }}
            @else
                Báo cáo {{ request()->month }} năm {{ request()->year }}
            @endif
        </td>
    </tr>
    <tr>
        <td colspan="16"></td>
    </tr>
@endif
<tr>
    <th style="text-align: center" rowspan="2">STT</th>
    <th style="text-align: center" rowspan="2">Tên cơ sở y tế</th>
    <th style="text-align: center" rowspan="2">Tổng số lượt khám phụ khoa</th>
    <th style="text-align: center" rowspan="2">Tổng số lượt điều trị phụ khoa</th>
    <th style="text-align: center" rowspan="2">Số điều trị giang mai</th>
    <th style="text-align: center" rowspan="2">Số điều trị lậu</th>
    <th style="text-align: center" rowspan="2">Số được đốt điện/ áp lạnh</th>
    <th style="text-align: center" rowspan="2">Số được thực hiện LEEP</th>
    <th style="text-align: center" rowspan="2">Số được khoét chóp CTC</th>
    <th style="text-align: center" colspan="3">VIA/VILI</th>
    <th style="text-align: center" colspan="2">Xét nghiệm tế bào học</th>
    <th style="text-align: center" colspan="2">Xét nghiệm HPV</th>
</tr>
<tr>
    <th style="text-align: center">Số lượt được thực hiện</th>
    <th style="text-align: center">Số (+) VIA/VILI</th>
    <th style="text-align: center">Số nghi ngờ K</th>
    <th style="text-align: center">Số lượt được xét nghiệm</th>
    <th style="text-align: center">Số lượt có KQ bất thường</th>
    <th style="text-align: center">Số lượt được xét nghiệm</th>
    <th style="text-align: center">Số HPV(+)</th>
</tr>
<tr>
    @for($i=1; $i<=16; $i++)
        <td style="text-align: center"><i>{{ $i }}</i></td>
    @endfor
</tr>
</thead>
