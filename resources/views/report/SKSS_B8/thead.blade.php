<thead>
@if (request()->export)
    <tr>
        <td colspan="14">
            {{ \App\Enums\Types::getTitle2(request()->type) }}
        </td>
    </tr>
    <tr>
        <td colspan="14" style="text-align: center; font-weight: bold">
            {{ \App\Enums\Types::getTitle(request()->type) }}
        </td>
    </tr>
    <tr>
        <td colspan="14" style="text-align: center">
            Báo cáo {{ request()->month }} năm {{ request()->year }}
        </td>
    </tr>
    <tr>
        <td colspan="14"></td>
    </tr>
@endif
<tr>
    <th style="text-align: center" rowspan="3">STT</th>
    <th style="text-align: center" rowspan="3">Tên cơ sở y tế</th>
    <th style="text-align: center" colspan="5">Số trẻ đẻ ra sống</th>
    <th style="text-align: center" colspan="3">Số trẻ sơ sinh được cân</th>
    <th style="text-align: center" rowspan="3">Số trẻ được tiêm Vitamin K1</th>
    <th style="text-align: center" rowspan="3">Số trẻ được sàng lọc sơ sinh</th>
    <th style="text-align: center" rowspan="3">Số trẻ sinh ra từ bà mẹ có HIV (+)</th>
    <th style="text-align: center" rowspan="3">Số TV thai nhi từ 7 đến {!! htmlspecialchars("<") !!}28 ngày)</th>
</tr>
<tr>
    <th style="text-align: center" rowspan="2">Tổng số</th>
    <th style="text-align: center" colspan="4">Trong đó</th>
    <th style="text-align: center" rowspan="2">Tổng số</th>
    <th style="text-align: center" colspan="2">Trong đó</th>
</tr>
<tr>
    <th style="text-align: center">Trđ: Nữ</th>
    <th style="text-align: center">Số trẻ được chăm sóc EENC</th>
    <th style="text-align: center">Số trẻ đẻ non </th>
    <th style="text-align: center">Số trẻ đẻ bị ngạt </th>
    <th style="text-align: center">Số {!! htmlspecialchars("<") !!}2500 gram</th>
    <th style="text-align: center">Số >4000 gram</th>
</tr>
<tr>
    @for($i=1; $i<=14; $i++)
        <td style="text-align: center"><i>{{ $i }}</i></td>
    @endfor
</tr>
</thead>
