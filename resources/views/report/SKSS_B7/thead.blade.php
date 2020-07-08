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
            Báo cáo {{ request()->month }}
        </td>
    </tr>
    <tr>
        <td colspan="14"></td>
    </tr>
@endif
<tr>
    <th style="text-align: center" rowspan="4">STT</th>
    <th style="text-align: center" rowspan="4">Tên cơ sở y tế</th>
    <th style="text-align: center" colspan="7">Số mới thực Biện pháp tránh thai hiện đại</th>
    <th style="text-align: center" colspan="5">Phá thai</th>
</tr>
<tr>
    <th style="text-align: center" rowspan="3">Tổng số</th>
    <th style="text-align: center" colspan="6">Trong đó</th>
    <th style="text-align: center" rowspan="3">Tổng số</th>
    <th style="text-align: center" colspan="3">Trong đó</th>
    <th style="text-align: center" rowspan="3">Trđ: Số phá thai tuổi VTN</th>
</tr>
<tr>
    <th style="text-align: center" rowspan="2">DCTC</th>
    <th style="text-align: center" colspan="2">Thuốc TT</th>
    <th style="text-align: center" colspan="2">Triệt sản</th>
    <th style="text-align: center" rowspan="2">Biện pháp khác</th>
    <th style="text-align: center" rowspan="2">Số phá thai dưới 7 tuần</th>
    <th style="text-align: center" rowspan="2">Số phá thai trên 7 - ≤12 tuần</th>
    <th style="text-align: center" rowspan="2">Số phá thai trên 12 tuần</th>
</tr>
<tr>
    <th style="text-align: center">Thuốc tiêm</th>
    <th style="text-align: center">Thuốc cấy</th>
    <th style="text-align: center">Tổng số</th>
    <th style="text-align: center">Trđ: Nam</th>
</tr>
<tr>
    @for($i=1; $i<=14; $i++)
        <td style="text-align: center"><i>{{ $i }}</i></td>
    @endfor
</tr>
</thead>
