<div class="quixnav">
    <div class="quixnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label first">Main Menu</li>
            <li><a href="/dashboard" aria-expanded="false" class="{{ Request::is('dashboard') ? 'active' : '' }}"><i
                        class="icon icon-home"></i><span class="nav-text">Dashboard</span></a></li>
            <li class="nav-label">Nurse Station</li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="bi bi-hospital"></i><span
                        class="nav-text">Pendaftaran Pasien</span></a>
                <ul aria-expanded="false">
                    <li><a href={{ route('pasiens.index') }}>Pendaftaran Pasien Awal</a></li>
                    <li><a href={{ route('kajian-pasiens.index') }}>Kajian Awal Pasien</a></li>
                </ul>
            </li>
            <li class="nav-label">Pelayanan Pasien</li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-app-store"></i><span class="nav-text">Pelayanan Pasien</span></a>
                <ul aria-expanded="false">
                    <li><a href={{ route('pelayanan-pasiens.index') }}>Aplikasi Pelayanan </a></li>
                    <li><a href="#">Aplikasi Penunjang </a></li>
                </ul>
            </li>
            {{-- @if (auth()->user()->type == 'bp-umum')
                <li class="nav-label">Pelayanan Pasien Poli Umum</li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                            class="icon icon-app-store"></i><span class="nav-text">Pelayanan Pasien</span></a>
                    <ul aria-expanded="false">
                        <li><a href="#">Aplikasi Pelayanan </a></li>
                        <li><a href="#">Aplikasi Penunjang </a></li>
                    </ul>
                </li>
            @elseif (auth()->user()->type == 'bp-gigi')
                <li class="nav-label">Pelayanan Pasien Poli Gigi</li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                            class="icon icon-app-store"></i><span class="nav-text">Pelayanan Pasien</span></a>
                    <ul aria-expanded="false">
                        <li><a href="#">Aplikasi Pelayanan </a></li>
                        <li><a href="#">Aplikasi Penunjang </a></li>
                    </ul>
                </li>
            @elseif (auth()->user()->type == 'bp-lansia')
                <li class="nav-label">Pelayanan Pasien Poli Lansia</li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                            class="icon icon-app-store"></i><span class="nav-text">Pelayanan Pasien</span></a>
                    <ul aria-expanded="false">
                        <li><a href="#">Aplikasi Pelayanan </a></li>
                        <li><a href="#">Aplikasi Penunjang </a></li>
                    </ul>
                </li>
            @endif --}}

            {{-- @if (auth()->user()->type == 'admin') --}}
            <li class="nav-label">Pelayanan Pasien Poli</li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                            class="icon icon-app-store"></i><span class="nav-text">Pelayanan Pasien</span></a>
                    <ul aria-expanded="false">
                        <li><a href="#">Aplikasi Pelayanan Poli Umum</a></li>
                        <li><a href="#">Aplikasi Penunjang Poli Umum</a></li>
                        <li><a href="#">Aplikasi Pelayanan Poli Gigi</a></li>
                        <li><a href="#">Aplikasi Penunjang Poli Gigi</a></li>
                        <li><a href="#">Aplikasi Pelayanan Poli Lansia</a></li>
                        <li><a href="#">Aplikasi Penunjang Poli Lansia</a></li>
                        <li><a href="#">Aplikasi Pelayanan KIA</a></li>
                        <li><a href="#">Aplikasi Penunjang KIA</a></li>
                    </ul>
                </li>
                <li class="nav-label first">Kontrol User</li>
                <li><a href={{ route('users.index') }} aria-expanded="false"
                        class="{{ Request::is('users') ? 'active' : '' }}"><i class="icon icon-single-04"></i><span
                            class="nav-text">User</span></a></li>
            {{-- @else
            @endif --}}
        </ul>
    </div>
</div>
