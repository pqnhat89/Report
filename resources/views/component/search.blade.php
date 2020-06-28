<form>
    <div class="card p-5">
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-2">
                    <label>Năm</label>
                    <input type="text" class="form-control" name="nam">
                </div>
                <div class="form-group col-md-3">
                    <label>Loại</label>
                    <select class="form-control" name="loai">
                        <option value="">Vui lòng chọn ...</option>
                        @foreach(\App\Enums\LoaiBaoCao::toArray() as $loai)
                            <option value="{{ $loai }}">{{ \App\Enums\LoaiBaoCao::getTitle($loai) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label>Quận / Huyện</label>
                    <select class="form-control" name="quan_huyen">
                        <option value="">Vui lòng chọn ...</option>
                        @foreach($quanHuyen as $qh)
                            <option value="{{ $qh->id }}">{{ $qh->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12 text-right">
                    <button type="submit" class="btn btn-info">Tìm kiếm</button>
                </div>
            </div>
        </div>
    </div>
</form>
