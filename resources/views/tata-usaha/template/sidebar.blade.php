<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{ asset('atlantis-dashboard/img/profile.jpg') }}" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            {{ Auth::user()->name }}
                            <span class="user-level">
                                @if (Auth::user()->role == 'tu' )
                                    Tata Usaha
                                @else
                                    Dosen
                                @endif
                            </span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item {{ $active == 'dashboard' ? 'active' : null }}">
                    <a href="#dashboard" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Halaman</h4>
                </li>
                <li class="nav-item {{ $active == 'ruangan' ? 'active' : null }}">
                    <a href="{{ route('tu-ruangan') }}">
                        <i class="fas fa-chalkboard-teacher    "></i>
                        <p>Ruangan</p>
                    </a>
                </li>
                <li class="nav-item {{ $active == 'borang' ? 'active' : null }}">
                    <a href="{{ route('tu-borang') }}">
                        <i class="far fa-calendar-alt    "></i>
                        <p>Borang Ruangan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}">
                        <i class="fa fa-sign-out-alt" aria-hidden="true"></i>
                        <p>Log out</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
