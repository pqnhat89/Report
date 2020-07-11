@component('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center">
            <h1>{{ \App\Enums\Types::getTitle(request()->type) ?? \App\Enums\FileNames::getTitle(request()->type) }}</h1>
        </div>

        @component('component.search')@endcomponent

        <div class="row">
            <div class="col-md">
                <div class="mb-3">
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#upload">
                        Upload file
                    </button>
                </div>
            </div>
            <div class="col-md">
                <div class="float-right">
                    {{ $reports->links() }}
                </div>
            </div>
        </div>

        <table class="table table-bordered table-hover table-striped text-center">
            <thead>
            <tr>
                <th>STT</th>
                <th>Năm</th>
                <th>Loại</th>
                @if (\App\Enums\UserRole::isAdmin())
                    <th>Cơ sở</th>
                @endif
                <th>Trạng thái</th>
                <th width="1"></th>
            </tr>
            </thead>
            <tbody>
            @if (count($reports))
                @foreach ($reports as $no => $report)
                    <tr>
                        <td>{{ $no + 1 }}</td>
                        <td>{{ $report->year }}</td>
                        <td nowrap>{{ $report->month }}</td>
                        @if (\App\Enums\UserRole::isAdmin())
                            <td nowrap>{{ $report->location }}</td>
                        @endif
                        <td>
                            {!! \App\Enums\Status::getTitle($report->status) !!}
                        </td>
                        <td nowrap>
                            <a class="btn btn-warning"
                               href="{{ route('report.show', ['type' => request()->type, 'id' => $report->id]) }}">Tải
                                về</a>
                            @if (!$report->status)
                                <form class="d-inline" method="POST"
                                      action="{{ route('report.delete', ['type' => request()->type, 'id' => $report->id]) }}">
                                    {{ csrf_field() }}
                                    <button class="btn btn-danger" type="submit"
                                            onclick="return confirm('Bạn có muốn xóa STT {{ $no + 1 }}?');">Xóa
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="99">Không có dữ liệu</td>
                </tr>
            @endif
            </tbody>
        </table>

        <div class="row">
            <div class="col-md">
            </div>
            <div class="col-md">
                <div class="float-right">
                    {{ $reports->links() }}
                </div>
            </div>
        </div>

        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
             aria-hidden="true" id="upload">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Upload
                            file: {{ \App\Enums\FileNames::toArray()[request()->type] }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('file.upload', ['type' => request()->type]) }}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <label class="col-form-label col-md-4 text-right">Tháng:</label>
                                        <div class="col-md-8">
                                            <select class="form-control" name="month" required>
                                                <option value="">Vui lòng chọn Tháng ...</option>
                                                @foreach(\App\Enums\Months::monthsOfYear() as $month)
                                                    <option value="{{ $month }}">{{ $month }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="row">
                                        <label class="col-form-label col-md-4 text-right">Năm:</label>
                                        <div class="col-md-8">
                                            <select class="form-control" name="year" required>
                                                <option value="">Vui lòng chọn Năm ...</option>
                                                <option value="{{ now()->addYear(-1)->format('Y') }}">
                                                    {{ now()->addYear(-1)->format('Y') }}
                                                </option>
                                                <option value="{{ now()->format('Y') }}">
                                                    {{ now()->format('Y') }}
                                                </option>
                                                <option value="{{ now()->addYear(1)->format('Y') }}">
                                                    {{ now()->addYear(1)->format('Y') }}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                @if(\App\Enums\UserRole::isAdmin())
                                    <div class="col-md-6 pt-3">
                                        <div class="row">
                                            <label class="col-form-label col-md-4 text-right">Cơ sở:</label>
                                            <div class="col-md-8">
                                                <select class="form-control" name="location" required>
                                                    <option value="">Vui lòng chọn Cơ sở ...</option>
                                                    @foreach(\App\Enums\Locations::toArray() as $location)
                                                        <option value="{{ $location }}">{{ $location }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="text-center p-3">
                                <input type="file" name="file" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Gửi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection

@endcomponent
