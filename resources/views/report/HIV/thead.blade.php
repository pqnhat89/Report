<thead>
@if (request()->export)
    <tr>
        <td colspan="2" style="text-align: center; font-weight: bold">
            SỞ Y TẾ THÀNH PHỐ ĐÀ NẴNG
        </td>
        <td colspan="16" style="text-align: center; font-weight: bold">
            CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM
        </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center; font-weight: bold">
            @if ($report ?? false)
                Đơn vị báo cáo: {{ $report->location }}
            @endif
            @if ($reports ?? false)
                TRUNG TÂM KIỂM SOÁT BỆNH TẬT
            @endif
        </td>
        <td colspan="16" style="text-align: center; font-weight: bold">
            Độc lập – Tự do – Hạnh phúc
        </td>
    </tr>
    <tr>
        <td colspan="18">
        </td>
    </tr>
    <tr>
        <td colspan="18" style="text-align: center; font-weight: bold">
            {{ \App\Enums\Types::getTitle(request()->type) }} {{ mb_strtoupper(request()->month) }} NĂM {{ request()->year }}
        </td>
    </tr>
    <tr>
        <td colspan="18">
        </td>
    </tr>
@endif
<tr>
    <th style="text-align: center" rowspan="3">STT</th>
    <th style="text-align: center" rowspan="3">Đối tượng xét nghiệm</th>
    <th style="text-align: center" colspan="10">Nhóm tuổi</th>
    <th style="text-align: center" colspan="4">Giới</th>
    @if (!in_array(request()->route()->getName(), ['report.create', 'report.edit']))
        <th style="text-align: center; font-weight: bold" colspan="2">Tổng</th>
    @endif
</tr>
<tr>
    <th style="text-align: center" colspan="2">{!! htmlspecialchars('<15') !!}</th>
    <th style="text-align: center" colspan="2">{!! htmlspecialchars('15-<25') !!}</th>
    <th style="text-align: center" colspan="2">{!! htmlspecialchars('25-49') !!}</th>
    <th style="text-align: center" colspan="2">{!! htmlspecialchars('>49') !!}</th>
    <th style="text-align: center" colspan="2">{!! htmlspecialchars('Không rõ') !!}</th>
    <th style="text-align: center" colspan="2">Nam</th>
    <th style="text-align: center" colspan="2">Nữ</th>
    @if (!in_array(request()->route()->getName(), ['report.create', 'report.edit']))
        <th></th>
        <th></th>
    @endif
</tr>
<tr>
    @for($i=1;$i<=7;$i++)
        <th style="text-align: center">XN</th>
        <th style="text-align: center">(+)</th>
    @endfor
    @if (!in_array(request()->route()->getName(), ['report.create', 'report.edit']))
        <th style="text-align: center; font-weight: bold">XN</th>
        <th style="text-align: center; font-weight: bold">(+)</th>
    @endif
</tr>
</thead>
