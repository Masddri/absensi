<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        {{-- <span class="app-brand-logo demo"> --}}
        {{-- </span> --}}
        <a href="{{ route('home') }}" class="app-brand-link">
            {{-- <span class="app-brand-text demo menu-text fw-bolder ms-2"></span> --}}
            <img src="{{ asset('admin/assets/img/avatars/logo.png') }}" alt="logo" justify-content-center width="30%" height="30%">
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item">
            <a href="{{ route('home') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Tabel</span>
        </li>
        <li class="menu-item">
            <a href="{{ route('jabatan.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-table"></i>
                <div data-i18n="Tables">Tabel Jabatan</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('karyawan.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-table"></i>
                <div data-i18n="Tables">Tabel Karyawan</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('absensi.index')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-table"></i>
                <div data-i18n="Tables">Tabel Absensi</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="#" class="menu-link">
                <i class="menu-icon tf-icons bx bx-table"></i>
                <div data-i18n="Tables">Tabel Cuti</div>
            </a>
        </li>

    </ul>
</aside>
