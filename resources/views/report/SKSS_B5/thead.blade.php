<thead>
@if (request()->export)
    <tr>
        <td colspan="18">
            {{ \App\Enums\Types::getTitle2(request()->type) }}
        </td>
    </tr>
    <tr>
        <td colspan="18" style="text-align: center; font-weight: bold">
            {{ \App\Enums\Types::getTitle(request()->type) }}
        </td>
    </tr>
    <tr>
        <td colspan="18" style="text-align: center">
            Báo cáo {{ request()->month }}
        </td>
    </tr>
    <tr>
        <td colspan="18"></td>
    </tr>
@endif
<tr>
    <th style="text-align: center" rowspan="2">STT</th>
    <th style="text-align: center" rowspan="2">Tên cơ sở</th>
    <th style="text-align: center" colspan="2">Tổng số</th>
    <th style="text-align: center" colspan="2">Băng huyết</th>
    <th style="text-align: center" colspan="2">Sản giật</th>
    <th style="text-align: center" colspan="2">Uốn ván sơ sinh</th>
    <th style="text-align: center" colspan="2">Vỡ tử cung</th>
    <th style="text-align: center" colspan="2">Nhiễm trùng sau đẻ</th>
    <th style="text-align: center" colspan="2">Phá thai</th>
    <th style="text-align: center" colspan="2">Khác</th>
</tr>
<tr>
    <th style="text-align: center">Mắc</th>
    <th style="text-align: center">TV</th>
    <th style="text-align: center">Mắc</th>
    <th style="text-align: center">TV</th>
    <th style="text-align: center">Mắc</th>
    <th style="text-align: center">TV</th>
    <th style="text-align: center">Mắc</th>
    <th style="text-align: center">TV</th>
    <th style="text-align: center">Mắc</th>
    <th style="text-align: center">TV</th>
    <th style="text-align: center">Mắc</th>
    <th style="text-align: center">TV</th>
    <th style="text-align: center">Mắc</th>
    <th style="text-align: center">TV</th>
    <th style="text-align: center">Mắc</th>
    <th style="text-align: center">TV</th>
</tr>
<tr>
    @for($i=1; $i<=18; $i++)
        <td style="text-align: center"><i>{{ $i }}</i></td>
    @endfor
</tr>
</thead>
