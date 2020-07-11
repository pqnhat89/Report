@component('layouts.app')

@section('content')
    <div class="container text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>SỞ Y TẾ THÀNH PHỐ ĐÀ NẴNG</h2>
                    <h1>TRUNG TÂM KIỂM SOÁT BỆNH TẬT</h1><br>
                    @if(!$errors->all())
                        <h3 class="text-success">Đăng nhập thành công.</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@endcomponent
