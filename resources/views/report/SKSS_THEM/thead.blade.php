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
            Báo cáo {{ request()->month }}
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
    <th style="text-align: center" rowspan="2">Số tử vong tẻ em dưới 5 tuổi</th>
    <th style="text-align: center" rowspan="2">Số trẻ bú mẹ giờ đầu</th>
    <th style="text-align: center" rowspan="2">Số bà mẹ nhỏ VGB được điều trị trong thòi gian mang thai</th>
    <th style="text-align: center" rowspan="2">Số trẻ bị VGB được tiêm phòng huyết thanh</th>
    <th style="text-align: center" rowspan="2">Tồng số PN đẻ tại địa bàn (số quản lý)</th>
    <th style="text-align: center" rowspan="2">Tồng số PN đẻ tại địa bàn (số thực hiện)</th>
</tr>
<tr>
    <th style="text-align: center">Tổng số</th>
    <th style="text-align: center">Tỷ lệ</th>
    <th style="text-align: center">Tổng số</th>
    <th style="text-align: center">Tỷ lệ</th>
</tr>
<tr>
    @for($i=1; $i<=13; $i++)
        <td style="text-align: center"><i>{{ $i }}</i></td>
    @endfor
</tr>
</thead>
