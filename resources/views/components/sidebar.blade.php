<div class="quixnav">
    <div class="quixnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label first">Main Menu</li>
            <li><a href="/dashboard" aria-expanded="false" class="{{ Request::is('dashboard') ? 'active' : '' }}"><i
                        class="icon icon-home"></i><span class="nav-text">Dashboard</span></a></li>
            @if (auth()->user()->type == 'nurse')
                <li class="nav-label">Pendaftaran Pasien</li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                            class="bi bi-person-vcard"></i><span class="nav-text">Pendaftaran Pasien</span></a>
                    <ul aria-expanded="false">
                        <li><a class="{{ Request::is('pasiens*') ? 'active' : '' }}"
                                href={{ route('pasiens.index') }}>Pendaftaran Pasien Awal</a></li>

                    </ul>
                </li>
                <li class="nav-label">Nurse Station</li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                            class="bi bi-hospital"></i><span class="nav-text">Kajian Pasien</span></a>
                    <ul aria-expanded="false">
                        <li><a href={{ route('kajian-pasiens.index') }}>Kajian Awal Pasien</a></li>
                    </ul>
                </li>
                <li class="nav-label">Asuhan Keperawatan</li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                            class="bi bi-hospital"></i><span class="nav-text">Pelayanan Asuhan Keperawatan</span></a>
                    <ul aria-expanded="false">
                        <li><a href={{ route('askep.index') }}>Asuhan Keperawatan</a></li>
                    </ul>
                </li>
                {{-- <li class="nav-label">Pelayanan Pasien</li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-app-store"></i><span class="nav-text">Pelayanan Pasien</span></a>
                <ul aria-expanded="false">
                    <li><a href={{ route('pelayanan-pasiens.index') }}>Aplikasi Pelayanan </a></li>
                    <li><a href="#">Aplikasi Penunjang </a></li>
                </ul>
            </li> --}}
            @elseif (auth()->user()->type == 'bp-umum')
                <li class="nav-label">Pelayanan Pasien Poli Umum</li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                            class="bi bi-person-vcard"></i><span class="nav-text">Pelayanan Pasien</span></a>
                    <ul aria-expanded="false">
                        <li><a href={{ route('bp-umum.index') }}>Aplikasi Pelayanan Poli Umum</a></li>
                    </ul>
                </li>
            @elseif (auth()->user()->type == 'bp-gigi')
                <li class="nav-label">Pelayanan Pasien Poli Gigi</li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                            class="bi bi-person-vcard"></i><span class="nav-text">Pelayanan Pasien</span></a>
                    <ul aria-expanded="false">
                        <li><a href={{ route('bp-gigi.index') }}>Aplikasi Pelayanan Poli Gigi</a></li>
                    </ul>
                </li>
            @elseif (auth()->user()->type == 'bp-lansia')
                <li class="nav-label">Pelayanan Pasien Poli Lansia</li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                            class="bi bi-person-vcard"></i><span class="nav-text">Pelayanan Pasien</span></a>
                    <ul aria-expanded="false">
                        <li><a href={{ route('bp-lansia.index') }}>Aplikasi Pelayanan Poli Lansia</a></li>
                    </ul>
                </li>
            @elseif (auth()->user()->type == 'kia')
                <li class="nav-label">Pelayanan Pasien Poli KIA</li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                            class="bi bi-person-vcard"></i><span class="nav-text">Pelayanan Pasien</span></a>
                    <ul aria-expanded="false">
                        <li><a href={{ route('poli-kia.index') }}>Aplikasi Pelayanan Poli KIA</a></li>
                    </ul>
                </li>
            @elseif (auth()->user()->type == 'mtbs')
                <li class="nav-label">Pelayanan Pasien Poli MTBS</li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                            class="bi bi-person-vcard"></i><span class="nav-text">Pelayanan Pasien</span></a>
                    <ul aria-expanded="false">
                        <li><a href={{ route('poli-mtbs.index') }}>Aplikasi Pelayanan Poli MTBS</a></li>
                    </ul>
                </li>
            @elseif (auth()->user()->type == 'konseling')
                <li class="nav-label">Pelayanan Pasien Poli Konseling</li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                            class="bi bi-person-vcard"></i><span class="nav-text">Pelayanan Pasien</span></a>
                    <ul aria-expanded="false">
                        <li><a href={{ route('poli-konseling.index') }}>Aplikasi Pelayanan Poli Konseling</a></li>
                    </ul>
                </li>
            @elseif (auth()->user()->type == 'farmasi')
                <li class="nav-label">Pelayanan Pasien Farmasi</li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                            class="bi bi-prescription2"></i><span class="nav-text">Pelayanan Farmasi</span></a>
                    <ul aria-expanded="false">
                        <li><a href={{ route('farmasi.index') }}>Tebus Obat</a></li>
                    </ul>
                </li>
                <li class="nav-label">Obat</li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                            class="bi bi-kanban-fill"></i><span class="nav-text">Manage Obat</span></a>
                    <ul aria-expanded="false">
                        <li><a href={{ route('obat.index') }}>Obat</a></li>
                    </ul>
                </li>
            @endif

            @if (auth()->user()->type == 'admin')
                <li class="nav-label">Pendaftaran Pasien</li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                            class="bi bi-person-vcard"></i><span class="nav-text">Pendaftaran Pasien</span></a>
                    <ul aria-expanded="false">
                        <li><a class="{{ Request::is('pasiens*') ? 'active' : '' }}"
                                href={{ route('pasiens.index') }}>Pendaftaran Pasien Awal</a></li>
                    </ul>
                </li>
                <li class="nav-label">Nurse Station</li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                            class="bi bi-hospital"></i><span class="nav-text">Kajian Pasien</span></a>
                    <ul aria-expanded="false">
                        <li><a href={{ route('kajian-pasiens.index') }}>Kajian Awal Pasien</a></li>
                    </ul>
                </li>
                {{-- <li class="nav-label">Pelayanan Pasien</li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                            class="icon icon-app-store"></i><span class="nav-text">Pelayanan Pasien</span></a>
                    <ul aria-expanded="false">
                        <li><a href={{ route('pelayanan-pasiens.index') }}>Aplikasi Pelayanan </a></li>
                        <li><a href="#">Aplikasi Penunjang </a></li>
                    </ul>
                </li> --}}
                <li class="nav-label">Pelayanan Pasien Poli</li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                            class="bi bi-person-vcard"></i><span class="nav-text">Pelayanan Pasien</span></a>
                    <ul aria-expanded="false">
                        <li><a href={{ route('admin-bp-umum.index') }}>Aplikasi Pelayanan Poli Umum</a></li>
                        <li><a href={{ route('admin-bp-gigi.index') }}>Aplikasi Pelayanan Poli Gigi</a></li>
                        <li><a href={{ route('admin-bp-lansia.index') }}>Aplikasi Pelayanan Poli Lansia</a></li>
                        <li><a href={{ route('admin-poli-kia.index') }}>Aplikasi Pelayanan KIA</a></li>
                        <li><a href={{ route('admin-poli-mtbs.index') }}>Aplikasi Pelayanan MTBS</a></li>
                        <li><a href={{ route('admin-poli-konseling.index') }}>Aplikasi Pelayanan Konseling</a></li>
                        <li><a href={{ route('admin.pelayanan-pasien.index') }}>Laporan Poli</a></li>
                    </ul>
                </li>
                <li class="nav-label">Asuhan Keperawatan</li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                            class="bi bi-hospital"></i><span class="nav-text">Pelayanan Asuhan Keperawatan</span></a>
                    <ul aria-expanded="false">
                        <li><a href={{ route('admin-diagnosa.index') }}>Diagnosa</a></li>
                        <li><a href={{ route('askep.index') }}>Asuhan Keperawatan</a></li>
                    </ul>
                </li>
                <li class="nav-label">Pelayanan Pasien Farmasi</li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                            class="bi bi-prescription2"></i><span class="nav-text">Pelayanan Farmasi</span></a>
                    <ul aria-expanded="false">
                        <li><a href={{ route('admin-obat.index') }}>Obat</a></li>
                        <li><a href={{ route('admin-farmasi.index') }}>Tebus Obat</a></li>
                    </ul>
                </li>
                <li class="nav-label first">Kontrol User</li>
                <li><a href={{ route('users.index') }} aria-expanded="false"
                        class="{{ Request::is('users') ? 'active' : '' }}"><i class="icon icon-single-04"></i><span
                            class="nav-text">User</span></a></li>
            @else
            @endif
        </ul>
    </div>
</div>
