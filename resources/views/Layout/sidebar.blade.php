<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="/home">
                <i class="ti-layout-grid2 menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/news">
                <i class="ti-write menu-icon"></i>
                <span class="menu-title">Berita</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/operator">
                <i class="ti-user menu-icon"></i>
                <span class="menu-title">Operator</span>
            </a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link" href="3">
                <i class="ti-desktop menu-icon"></i>
                <span class="menu-title">Sisfo Sekolah</span>
            </a>
        </li> --}}
        @if (auth()->user()->role != 'guru')
            <li class="nav-item">
                <a aria-controls="ui-basic" aria-expanded="false" class="nav-link" data-toggle="collapse"
                    href="#ui-basic">
                    <i class="ti-zip menu-icon"></i>
                    <span class="menu-title">Arsip Digital</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="/siswa">Data Siswa</a></li>
                        <li class="nav-item"> <a class="nav-link" href="/guru">Data Guru & Staff</a></li>
                        <li class="nav-item"> <a class="nav-link" href="/data-ijazah">Data Ijazah</a>
                        </li>
                    </ul>
                </div>
            </li>
        @endif
        <li class="nav-item">
            <a class="nav-link" href="/mata-pelajaran">
                <i class="ti-check-box menu-icon"></i>
                <span class="menu-title">Mata Pelajaran</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/nilai">
                <i class="ti-check-box menu-icon"></i>
                <span class="menu-title">Nilai</span>
            </a>
        </li>
        <li class="nav-item">
            <a aria-controls="ui-siswa" aria-expanded="false" class="nav-link" data-toggle="collapse" href="#ui-siswa">
                <i class="ti-zip menu-icon"></i>
                <span class="menu-title">Laporan</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-siswa">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/laporan/siswa">Laporan Siswa</a></li>
                    <li class="nav-item"> <a class="nav-link" href="/laporan/siswa-nilai">Laporan Nilai</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/login/logout">
                <i class="ti-power-off menu-icon"></i>
                <span class="menu-title">Log Out</span>
            </a>
        </li>

    </ul>
</nav>
