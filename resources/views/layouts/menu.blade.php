@auth
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            @if (\App\Enums\UserRole::isAdmin())
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.index') }}">Quản lý tài khoản</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Tổng hợp báo cáo
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach (\App\Enums\Types::toArray() as $type => $name)
                            <a class="dropdown-item" href="/admin/{{ $type }}">{{ $name }}</a>
                        @endforeach
                    </div>
                </li>
            @endif

            @if (\App\Enums\UserRole::isNormalUser())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Báo cáo
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach (\App\Enums\Types::toArray() as $type => $name)
                            <a class="dropdown-item" href="/{{ $type }}">{{ $name }}</a>
                        @endforeach
                    </div>
                </li>
            @endif
        </ul>
    </div>
@endauth
