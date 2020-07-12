<thead>
@if (request()->export)
    <tr>
        <td colspan="22">
            {{ \App\Enums\Types::getTitle2(request()->type) }}
        </td>
        <td colspan="22">
            {{ \App\Enums\Types::getTitle2(request()->type) }}
        </td>
        <td colspan="26">
            {{ \App\Enums\Types::getTitle2(request()->type) }}
        </td>
    </tr>
    <tr>
        <td colspan="22" style="text-align: center; font-weight: bold">
            {{ \App\Enums\Types::getTitle(request()->type) }}
        </td>
        <td colspan="22" style="text-align: center; font-weight: bold">
            {{ \App\Enums\Types::getTitle(request()->type) }} (tiếp)
        </td>
        <td colspan="26" style="text-align: center; font-weight: bold">
            {{ \App\Enums\Types::getTitle(request()->type) }} (tiếp)
        </td>
    </tr>
    <tr>
        <td colspan="22" style="text-align: center">
            Báo cáo {{ request()->month }} năm {{request()->year}}
        </td>
        <td colspan="22" style="text-align: center">
            Báo cáo {{ request()->month }} năm {{request()->year}}
        </td>
        <td colspan="26" style="text-align: center">
            Báo cáo {{ request()->month }} năm {{request()->year}}
        </td>
    </tr>
    <tr>
        <td colspan="22"></td>
        <td colspan="22"></td>
        <td colspan="26"></td>
    </tr>
@endif
<tr>
    <th style="text-align: center" rowspan="2">STT</th>
    <th style="text-align: center" rowspan="2">Tên Quận / Huyện</th>
    <th style="text-align: center" colspan="2">Bạch hầu</th>
    <th style="text-align: center" colspan="2">Bệnh do liên cầu lợn ở người</th>
    <th style="text-align: center" colspan="2">Bệnh do vi rút Adeno</th>
    <th style="text-align: center" colspan="2">Cúm</th>
    <th style="text-align: center" colspan="2">Cúm A(H5N1)</th>
    <th style="text-align: center" colspan="2">Dại</th>
    <th style="text-align: center" colspan="2">Dịch hạch</th>
    <th style="text-align: center" colspan="2">Ho gà</th>
    <th style="text-align: center" colspan="2">Lỵ amíp</th>
    <th style="text-align: center" colspan="2">Lỵ trực trùng</th>

    <th style="text-align: center" rowspan="2">STT</th>
    <th style="text-align: center" rowspan="2">Tên Quận / Huyện</th>
    <th style="text-align: center" colspan="2">Quai bị</th>
    <th style="text-align: center" colspan="2">Rubella (Rubeon)</th>
    <th style="text-align: center" colspan="2">Sởi</th>
    <th style="text-align: center" colspan="2">Sốt rét</th>
    <th style="text-align: center" colspan="2">Sốt xuất huyết Dengue</th>
    <th style="text-align: center" colspan="2">Tả</th>
    <th style="text-align: center" colspan="2">Tay - chân - miệng</th>
    <th style="text-align: center" colspan="2">Than</th>
    <th style="text-align: center" colspan="2">Thương hàn</th>
    <th style="text-align: center" colspan="2">Thủy đậu</th>

    <th style="text-align: center" rowspan="2">STT</th>
    <th style="text-align: center" rowspan="2">Tên Quận / Huyện</th>
    <th style="text-align: center" colspan="2">Tiêu chảy</th>
    <th style="text-align: center" colspan="2">Uốn ván sơ sinh</th>
    <th style="text-align: center" colspan="2">Uốn ván khác</th>
    <th style="text-align: center" colspan="2">Viêm gan vi rút A</th>
    <th style="text-align: center" colspan="2">Viêm gan vi rút B</th>
    <th style="text-align: center" colspan="2">Viêm gan vi rút C</th>
    <th style="text-align: center" colspan="2">Viêm gan vi rút khác</th>
    <th style="text-align: center" colspan="2">Viêm màng não do não mô cầu</th>
    <th style="text-align: center" colspan="2">Viêm não Nhật Bản</th>
    <th style="text-align: center" colspan="2">Viêm não vi rút khác</th>
    <th style="text-align: center" colspan="2">Xoắn khuẩn vàng da (Leptospira)</th>
    <th style="text-align: center" colspan="2">Khác ...</th>
</tr>
<tr>
    <th style="text-align: center">M</th>
    <th style="text-align: center">TV</th>
    <th style="text-align: center">M</th>
    <th style="text-align: center">TV</th>
    <th style="text-align: center">M</th>
    <th style="text-align: center">TV</th>
    <th style="text-align: center">M</th>
    <th style="text-align: center">TV</th>
    <th style="text-align: center">M</th>
    <th style="text-align: center">TV</th>
    <th style="text-align: center">M</th>
    <th style="text-align: center">TV</th>
    <th style="text-align: center">M</th>
    <th style="text-align: center">TV</th>
    <th style="text-align: center">M</th>
    <th style="text-align: center">TV</th>
    <th style="text-align: center">M</th>
    <th style="text-align: center">TV</th>
    <th style="text-align: center">M</th>
    <th style="text-align: center">TV</th>

    <th style="text-align: center">M</th>
    <th style="text-align: center">TV</th>
    <th style="text-align: center">M</th>
    <th style="text-align: center">TV</th>
    <th style="text-align: center">M</th>
    <th style="text-align: center">TV</th>
    <th style="text-align: center">M</th>
    <th style="text-align: center">TV</th>
    <th style="text-align: center">M</th>
    <th style="text-align: center">TV</th>
    <th style="text-align: center">M</th>
    <th style="text-align: center">TV</th>
    <th style="text-align: center">M</th>
    <th style="text-align: center">TV</th>
    <th style="text-align: center">M</th>
    <th style="text-align: center">TV</th>
    <th style="text-align: center">M</th>
    <th style="text-align: center">TV</th>
    <th style="text-align: center">M</th>
    <th style="text-align: center">TV</th>

    <th style="text-align: center">M</th>
    <th style="text-align: center">TV</th>
    <th style="text-align: center">M</th>
    <th style="text-align: center">TV</th>
    <th style="text-align: center">M</th>
    <th style="text-align: center">TV</th>
    <th style="text-align: center">M</th>
    <th style="text-align: center">TV</th>
    <th style="text-align: center">M</th>
    <th style="text-align: center">TV</th>
    <th style="text-align: center">M</th>
    <th style="text-align: center">TV</th>
    <th style="text-align: center">M</th>
    <th style="text-align: center">TV</th>
    <th style="text-align: center">M</th>
    <th style="text-align: center">TV</th>
    <th style="text-align: center">M</th>
    <th style="text-align: center">TV</th>
    <th style="text-align: center">M</th>
    <th style="text-align: center">TV</th>
    <th style="text-align: center">M</th>
    <th style="text-align: center">TV</th>
    <th style="text-align: center">M</th>
    <th style="text-align: center">TV</th>
</tr>
<tr>
    @for($i=1; $i<=22; $i++)
        <td style="text-align: center"><i>{{ $i }}</i></td>
    @endfor
    @for($i=1; $i<=22; $i++)
        <td style="text-align: center"><i>{{ $i }}</i></td>
    @endfor
    @for($i=1; $i<=26; $i++)
        <td style="text-align: center"><i>{{ $i }}</i></td>
    @endfor
</tr>
</thead>
