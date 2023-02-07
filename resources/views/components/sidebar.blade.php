<div class="quixnav">
    <div class="quixnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label first">Main Menu</li>
            <li><a href="/dashboard" aria-expanded="false" class="{{ Request::is('dashboard') ? 'active' : '' }}"><i
                        class="icon icon-home"></i><span class="nav-text">Dashboard</span></a></li>
            <li class="nav-label">Pelayanan Pasien</li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-app-store"></i><span class="nav-text">Pelayanan Pasien</span></a>
                <ul aria-expanded="false">
                    <li><a href={{ route('pasiens.index') }}>Pendaftaran Pasien Awal</a></li>
                    <li><a href="#">Kajian Awal Pasien</a></li>
                    <li><a href="#">Aplikasi Pelayanan </a></li>
                    <li><a href="#">Aplikasi Penunjang </a></li>
                </ul>
            </li>
            @if (auth()->user()->type == 'admin')
                <li class="nav-label first">Kontrol User</li>
                <li><a href={{ route('users.index') }} aria-expanded="false"
                        class="{{ Request::is('users') ? 'active' : '' }}"><i class="icon icon-single-04"></i><span
                            class="nav-text">User</span></a></li>
            @elseif (auth()->user()->type == 'user')
            @endif
        </ul>
    </div>
</div>
