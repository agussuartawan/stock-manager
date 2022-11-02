<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-between align-items-center">
                <div class="logo">
                    <a href="{{ route('home') }}"><img src="/assets/images/logo/logo.png" alt="Logo" srcset="" style="width: 15rem; height: 3rem;"></a>
                </div>
                <div class="theme-toggle d-flex gap-2  align-items-center mt-2">
                    <div class="form-check form-switch fs-6">
                        <input class="form-check-input  me-0" type="checkbox" id="toggle-dark" style="display: none;">
                        <label class="form-check-label"></label>
                    </div>
                </div>
                <div class="sidebar-toggler  x">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item{{ request()->is('home') ? ' active' : '' }}">
                    <a href="{{ route('home') }}" class='sidebar-link'>
                        <i class="bi bi-house-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                @can('akses supplier')
                    <li class="sidebar-item{{ request()->is('suppliers*') ? ' active' : '' }}">
                        <a href="{{ route('suppliers.index') }}" class='sidebar-link'>
                            <i class="bi bi-box-fill"></i>
                            <span>Master Supplier</span>
                        </a>
                    </li>
                @endcan

                @can('akses pelanggan')
                    <li class="sidebar-item{{ request()->is('customers*') ? ' active' : '' }}">
                        <a href="{{ route('customers.index') }}" class='sidebar-link'>
                            <i class="bi bi-box-fill"></i>
                            <span>Master Pelanggan</span>
                        </a>
                    </li>
                @endcan

                @can('akses obat')
                    <li class="sidebar-item{{ request()->is('cures*') ? ' active' : '' }}">
                        <a href="{{ route('cures.index') }}" class='sidebar-link'>
                            <i class="bi bi-box-fill"></i>
                            <span>Master Obat</span>
                        </a>
                    </li>
                @endcan

                @can('akses jenis obat')
                    <li class="sidebar-item{{ request()->is('cure-types*') ? ' active' : '' }}">
                        <a href="{{ route('cure-types.index') }}" class='sidebar-link'>
                            <i class="bi bi-filter-square-fill"></i>
                            <span>Jenis Obat</span>
                        </a>
                    </li>
                @endcan

                @can('akses unit obat')
                    <li class="sidebar-item{{ request()->is('units*') ? ' active' : '' }}">
                        <a href="{{ route('units.index') }}" class='sidebar-link'>
                            <i class="bi bi-hdd-rack-fill"></i>
                            <span>Satuan Obat</span>
                        </a>
                    </li>
                @endcan

                @can('akses unit obat')
                    <li class="sidebar-item{{ request()->is('racks*') ? ' active' : '' }}">
                        <a href="{{ route('racks.index') }}" class='sidebar-link'>
                            <i class="bi bi-hdd-rack-fill"></i>
                            <span>Rak Obat</span>
                        </a>
                    </li>
                @endcan

                @can('akses obat masuk')
                    <li class="sidebar-item{{ request()->is('purchases*') ? ' active' : '' }}">
                        <a href="{{ route('purchases.index') }}" class='sidebar-link'>
                            <i class="bi bi-arrow-up-square-fill"></i>
                            <span>Data Obat Masuk</span>
                        </a>
                    </li>
                @endcan

                @can('akses obat keluar')
                    <li class="sidebar-item{{ request()->is('sales*') ? ' active' : '' }}">
                        <a href="{{ route('sales.index') }}" class='sidebar-link'>
                            <i class="bi bi-arrow-down-square-fill"></i>
                            <span>Data Obat Keluar</span>
                        </a>
                    </li>
                @endcan

                @can('akses laporan')
                    <li class="sidebar-item{{ request()->is('report*') ? ' active' : '' }} has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-clipboard-minus-fill"></i>
                            <span>Laporan</span>
                        </a>
                        <ul
                            class="submenu{{ request()->is('report*') || request()->is('report/stocks') || request()->is('report/purchases') || request()->is('report/purchases') || request()->is('report/sales') ? ' active' : '' }}">
                            <li class="submenu-item{{ request()->is('report/stocks') ? ' active' : '' }}">
                                <a href="{{ route('report.stocks') }}">Stok Obat</a>
                            </li>

                            <li class="submenu-item{{ request()->is('report/purchases') ? ' active' : '' }}">
                                <a href="{{ route('report.purchases') }}">Data Obat Masuk</a>
                            </li>

                            <li class="submenu-item{{ request()->is('report/sales') ? ' active' : '' }}">
                                <a href="{{ route('report.sales') }}">Data Obat Keluar</a>
                            </li>
                        </ul>
                    </li>
                @endcan
            </ul>
        </div>
    </div>
</div>
