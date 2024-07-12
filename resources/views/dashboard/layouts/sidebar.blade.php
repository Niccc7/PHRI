<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="sidebar-header">
                    Admin Menu
                </li>
                <li class="{{ Request:: is('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard.index') }}"><i class="fa-solid fa-gauge"></i>
                        <span> Dashboard </span> 
                    </a>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><i class="fa-solid fa-database"></i>
                        <span> Master Data </span> <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('dashboard.jenis') }}" class="sidebar-link">Data Jenis Usaha</a>
                        </li>
                        <li>
                            <a href="{{ route('dashboard.klasifikasi') }}" class="sidebar-link">Data Klasifikasi Usaha</a>
                        </li>
                        <li>
                            <a href="{{ route('dashboard.benefit') }}" class="sidebar-link">Data Benefit</a>
                        </li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><i class="fa-solid fa-notes-medical"></i>
                        <span> 9 Benefit </span> <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('dashboard.benefit.panic-btn') }}" class="sidebar-link">Button Panic</a>
                        </li>

                    </ul>
                </li>
                <li class="{{ Request:: is('dashboard/pengaduan') ? 'active' : '' }}">
                    <a href="{{ route('dashboard.pengaduan') }}"><i class="fa-regular fa-file-lines"></i>
                        <span> Pengaduan </span> 
                    </a>
                </li>
                <li class="{{ Request:: is('dashboard/berita') ? 'active' : '' }}">
                    <a href="{{ route('dashboard.berita') }}"><i class="fa-solid fa-newspaper"></i>
                        <span> Berita </span> 
                    </a>
                </li>
                <li class="{{ Request:: is('dashboard/member') ? 'active' : '' }}">
                    <a href="{{ route('dashboard.member') }}"><i class="fa-solid fa-users"></i>
                        <span> Member PHRI </span> 
                    </a>
                </li>
                <li class="{{ Request:: is('dashboard/kemitraan') ? 'active' : '' }}">
                    <a href="{{ route('dashboard.mitra') }}"><i class="fa-solid fa-handshake"></i>
                        <span> Mitra </span> 
                    </a>
                </li>
                <li class="{{ Request:: is('dashboard/penawaran') ? 'active' : '' }}">
                    <a href="{{ route('dashboard.penawaran') }}"><i class="fa-solid fa-envelope"></i>
                        <span> Penawaran </span> 
                    </a>
                </li>
            </ul>
            <ul>
                @auth('admin')
                    @if (auth()->guard('admin')->user()->is_superadmin)
                        <li class="sidebar-header">
                            Super Admin Menu
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="fa-solid fa-plus"></i>
                                <span> Manajemen Data </span> <span class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li>
                                    <a href="{{ route('dashboard.superadmin.admin') }}" class="sidebar-link">Admin</a>
                                </li>
                                <li>
                                    <a href="{{ route('dashboard.superadmin.mitra') }}" class="sidebar-link">Mitra</a>
                                </li>
                            </ul>
                        </li>
                    @endif
                @endauth
            </ul>
        </div>
    </div>
</div>