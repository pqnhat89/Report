@component('layouts.app')

@section('content')
<div class="container">
    <div class="text-center">
        <h1>HOẠT ĐỘNG CHĂM SÓC BÀ MẸ</h1>
        <h4>Báo cáo 3, 6, 9 và 12 tháng</h4>
    </div>
    <form method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="t" value="skss_b4">
        <div class="p-5"></div>
        @if (($type ?? null) != 'tong-hop')
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    <strong>Tên báo cáo:</strong>
                </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="ten" value="{{ $b4->ten ?? old('ten') }}" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    <strong>Loại báo cáo:</strong>
                </label>
                <div class="col-sm-10">
                    <select class="form-control" name="loai" required>
                        <option value="">Vui lòng chọn ...</option>
                        @foreach (\App\Enums\LoaiBaoCao::toArray() as $loai)
                            <option value="{{ $loai }}" {{ $loai == ($b4->loai ?? null) ? 'selected' : null }}>{{ \App\Enums\LoaiBaoCao::getTitle($loai) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        @endif

        <table class="table table-bordered table-hover table-striped">
            <thead>
                @if (count($quanHuyen ?? []))
                    <tr>
                        <th colspan="2">
                            Đơn vị báo cáo (TTYT Quận/huyện):
                        </th>
                        <th>
                            <select class="form-control" disabled>
                                <option value="">Vui lòng chọn ...</option>
                                @foreach ($quanHuyen as $data)
                                    <option value="{{ $data->id}}" {{ $data->id == Auth::user()->quan_huyen ? 'selected' : null  }}>
                                        {{ $data->name }}
                                    </option>
                                @endforeach
                            </select>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="3"></th>
                    </tr>
                @endif
                <tr>
                    <th width="1" nowrap>STT</th>
                    <th>Nội dung</th>
                    <th width="300">Số lượng</th>
                </tr>
            </thead>
            <tbody>
                @foreach (\App\Enums\Skss\SkssB4::toArray() as $column => $stt)
                    <tr>
                        <td nowrap>{{ $stt }}</td>
                        <td>{!! \App\Enums\Skss\SkssB4::getTitle($stt) !!}</td>
                        <td>
                        <input type="number" class="form-control" name="{{ $column }}"
                            value="{{ $b4->$column ?? old($column) ?? 0 }}" {{ in_array($type ?? null, ['tao', 'sua']) ? null : 'readonly' }}>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @switch($type ?? null)
            @case('tao')
            @case('sua')
                <div class="row">
                    <div class="col-sm">
                        <a class="btn btn-info" href="/bao-cao/skss/b4">Thoát</a>
                    </div>
                    <div class="col-sm text-right">
                        <button type="reset" class="btn btn-danger">Nhập lại</button>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                </div>
                @break
            @case('xem')
                <div class="row">
                    <div class="col-sm">
                        <a class="btn btn-info" href="/bao-cao/skss/b4">Thoát</a>
                    </div>
                    <div class="col-sm text-right">
                        <a class="btn btn-primary" href="/bao-cao/skss/b4/{{ $b4->id }}/sua">Sửa</a>
                    </div>
                </div>
                @break
            @case('tong-hop')
                @break
            @default
        @endswitch
    </form>
@endsection

@endcomponent
