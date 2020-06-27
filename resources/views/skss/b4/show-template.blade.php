<table class="table table-bordered table-hover table-striped">
    <thead>
    <tr>
        <th colspan="3" style="text-align: center">
            <h1>HOẠT ĐỘNG CHĂM SÓC BÀ MẸ</h1>
        </th>
    </tr>
    <tr>
        <th colspan="3" style="text-align: center">
            <h4>Báo cáo {{ \App\Enums\LoaiBaoCao::getTitle($b4->loai) }} năm {{ $b4->nam }}</h4>
        </th>
    </tr>
    <tr>
        <th colspan="3"></th>
    </tr>
    <tr>
        <th colspan="3"></th>
    </tr>
    <tr>
        <th colspan="3"></th>
    </tr>
    @if (count($quanHuyen ?? []))
        <tr>
            <th colspan="2">
                Đơn vị báo cáo (TTYT Quận/huyện):
            </th>
            <th>{{ $b4->quan_huyen_name }}</th>
        </tr>
        <tr>
            <th colspan="3"></th>
        </tr>
    @endif
    <tr>
        <th width="10" nowrap>STT</th>
        <th width="50">Nội dung</th>
        <th width="10">Số lượng</th>
    </tr>
    </thead>
    <tbody>
    @foreach (\App\Enums\Skss\SkssB4::toArray() as $column => $stt)
        <tr>
            <td nowrap>{{ $stt }}</td>
            <td>{!! \App\Enums\Skss\SkssB4::getTitle($stt) !!}</td>
            <td>{{ $b4->$column }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
