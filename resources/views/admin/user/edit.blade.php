@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thay đổi mật khẩu</div>

                <div class="card-body">
                    <form method="POST">
                        @csrf

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Tên người dùng:</label>

                            <div class="col-md-6">
                                <input class="form-control" value="{{ $user->name }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Email:</label>

                            <div class="col-md-6">
                                <input class="form-control" value="{{ $user->email }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Mật khẩu mới:</label>

                            <div class="col-md-6">
                                <input name="new_password" type="password" class="form-control required">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Nhập lại mật khẩu mới:</label>

                            <div class="col-md-6">
                                <input name="re_password" type="password" class="form-control required">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Quyền hạn:</label>

                            <div class="col-md-6">
                                @foreach(\App\Enums\UserRole::toArray() as $role)
                                <label>
                                    <input name="role" value="{{ $role }}" type="radio" {{ $user->role == $role ? 'checked' : null }}> {{ \App\Enums\UserRole::getTitle($role) }}
                                </label><br>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Trực thuộc Quận/Huyện:</label>

                            <div class="col-md-6">
                                <select class="form-control" name="quan_huyen">
                                    <option value="">Vui lòng chọn ...</option>
                                    @foreach ($quanHuyen as $data)
                                        <option value="{{ $data->id}}" {{ $data->id == $user->quan_huyen ? 'selected' : null  }}>
                                            {{ $data->name }}
                                        </option>
                                    @endforeach
                                </select>
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
