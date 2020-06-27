@component('layouts.app')

@section('content')
    <div class="container">
        @component('skss.b4.show-template', ['b4' => $b4])
        @endcomponent
        <div class="row">
            <div class="col-sm text-right">
                <form>
                    <input type="hidden" name="export" value="true">
                    <button class="btn btn-info" type="submit">Tải xuống</button>
                </form>
            </div>
        </div>
@endsection

@endcomponent
