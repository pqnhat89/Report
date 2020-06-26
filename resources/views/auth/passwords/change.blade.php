@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thay đổi mật khẩu</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.change') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Mật khẩu cũ</label>

                            <div class="col-md-6">
                                <input name="old_password" type="password" class="form-control required">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Mật khẩu mới</label>

                            <div class="col-md-6">
                                <input name="new_password" type="password" class="form-control required">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Nhập lại mật khẩu mới</label>

                            <div class="col-md-6">
                                <input name="re_password" type="password" class="form-control required">
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Thay đổi</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
