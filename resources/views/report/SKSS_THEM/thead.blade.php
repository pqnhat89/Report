<thead>
@if (request()->export)
    <tr>
        <td colspan="13">
            {{ \App\Enums\Types::getTitle2(request()->type) }}
        </td>
    </tr>
    <tr>
        <td colspan="13" style="text-align: center; font-weight: bold">
            {{ \App\Enums\Types::getTitle(request()->type) }}
        </td>
    </tr>
    <tr>
        <td colspan="13" style="text-align: center">
            @php $inRange = request()->frommonth && request()->fromyear && request()->tomonth && request()->toyear @endphp
            @if ($inRange)
                Báo cáo từ {{ mb_strtolower(request()->frommonth) }} năm {{ request()->fromyear }} đến {{ mb_strtolower(request()->tomonth) }} năm {{ request()->toyear }}
            @else
                Báo cáo {{ request()->month }} năm {{ request()->year }}
            @endif
        </td>
    </tr>
    <tr>
        <td colspan="13"></td>
    </tr>
@endif
<tr>
    <th style="text-align: center" rowspan="2">STT</th>
    <th style="text-align: center" rowspan="2">Tên cơ sở y tế</th>
    <th style="text-align: center" colspan="2">Tỷ lệ PN đẻ được tiêm phòng UV đủ liều</th>
    <th style="text-align: center" colspan="2">Tỷ lệ số PN đẻ con thứ 3 trở lên</th>
    <th style="text-align: center" rowspan="2">Số trẻ đẻ non CS PP KCM (Kangaroo)</th>
    <th style="text-align: center" rowspan="2">Số tử vong trẻ em {!! htmlspecialchars("<") !!}5 tuổi</th>
    <th style="text-align: center" rowspan="2">Số trẻ bú mẹ giờ đầu</th>
    <th style="text-align: center" rowspan="2">Số bà mẹ nhỏ VGB được điều trị trong thòi gian mang thai</th>
    <th style="text-align: center" rowspan="2">Số trẻ bị VGB được tiêm phòng huyết thanh</th>
    @if (\App\Enums\UserRole::isQuanHuyen())
        <th style="text-align: center" rowspan="2">Tồng số PN đẻ tại địa bàn (số quản lý)</th>
        <th style="text-align: center" rowspan="2">Tồng số PN đẻ tại địa bàn (số thực hiện)</th>
    @endif
</tr>
<tr>
    <th style="text-align: center">Tổng số</th>
    <th style="text-align: center">Tỷ lệ</th>
    <th style="text-align: center">Tổng số</th>
    <th style="text-align: center">Tỷ lệ</th>
</tr>
<tr>
    @php $n = \App\Enums\UserRole::isQuanHuyen() ? 0 : -2; @endphp
    @for($i=1; $i<=13+$n; $i++)
        <td style="text-align: center"><i>{{ $i }}</i></td>
    @endfor
</tr>
</thead>
