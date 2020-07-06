<thead>
@if (request()->export)
    <tr>
        <td colspan="22">
            {{ \App\Enums\Types::getTitle2(request()->type) }}
        </td>
    </tr>
    <tr>
        <td colspan="22" style="text-align: center; font-weight: bold">
            <h1>{{ \App\Enums\Types::getTitle(request()->type) }}</h1>
        </td>
    </tr>
    <tr>
        <td colspan="22" style="text-align: center">
            Báo cáo {{ request()->month }}
        </td>
    </tr>
    <tr>
        <td colspan="22"></td>
    </tr>
@endif
<tr>
    <th style="text-align: center" rowspan="2">STT</th>
    <th style="text-align: center" rowspan="2">Tên cơ sở</th>
    <th style="text-align: center" colspan="2">Phụ nữ có thai</th>
    <th style="text-align: center" colspan="2">Số lượt khám thai</th>
    <th style="text-align: center" rowspan="2">Tổng số PN đẻ</th>
    <th style="text-align: center" colspan="10">Trong đó</th>
    <th style="text-align: center" rowspan="2">Số PN đẻ được CB có kỹ năng đỡ</th>
    <th style="text-align: center" rowspan="2">Số trẻ được cấp giấy chứng sinh</th>
    <th style="text-align: center" colspan="2">CS sau sinh tại nhà</th>
    <th style="text-align: center" rowspan="2">Số ca tử vong mẹ được thẩm định</th>
</tr>
<tr>
    <th style="text-align: center">Tổng số</th>
    <th style="text-align: center">Trđ: Vị thành niên</th>
    <th style="text-align: center">Tổng số</th>
    <th style="text-align: center">Trđ: Số lượt XN protein niệu</th>
    <th style="text-align: center">Số đẻ tuổi vị thành niên</th>
    <th style="text-align: center">Số được khám thai ≥4 lần/3 kỳ</th>
    <th style="text-align: center">Số đẻ được XN viêm gan B khi mang thai</th>
    <th style="text-align: center">Số đẻ được XN giang mai khi mang thai</th>
    <th style="text-align: center">Số được XN HIV khi mang thai</th>
    <th style="text-align: center">Số phụ nữ có thai có XN khẳng định + HIV trong gđ mang thai</th>
    <th style="text-align: center">Số PN đẻ HIV (+) được điều trị ARV</th>
    <th style="text-align: center">Số đẻ được XN đường huyết</th>
    <th style="text-align: center">Số PN đẻ được can thiệp FX/ GH</th>
    <th style="text-align: center">Số PN được mổ đẻ</th>
    <th style="text-align: center">Tuần đầu</th>
    <th style="text-align: center">Từ tuần 2 đến hết 6 tuần</th>
</tr>
<tr>
    @for($i=1; $i<=22; $i++)
        <td style="text-align: center"><i>{{ $i }}</i></td>
    @endfor
</tr>
</thead>
