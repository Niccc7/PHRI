<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="{{ Request:: is('dashboard-member') ? 'active' : '' }}">
                    <a href="{{ route('dashboard-member.index') }}"><i class="fa-solid fa-gauge"></i>
                        <span> Dashboard </span> 
                    </a>
                </li>
                <li class="{{ Request:: is('dashboard-member/pengaduan') ? 'active' : '' }}">
                    <a href="{{ route('dashboard-member.pengaduan') }}"><i class="fa-regular fa-file-lines"></i>
                        <span> Pengaduan </span> 
                    </a>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><i class="fa-solid fa-money-bill-trend-up"></i>
                        <span> Keuntungan </span> <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li>
                            <a href="#" class="sidebar-link">Lihat</a>
                        </li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><i class="fa-solid fa-note-sticky"></i>
                        <span> Catatan </span> <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li>
                            <a href="#" class="sidebar-link">Lihat</a>
                        </li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><i class="fa-solid fa-calendar-days"></i>
                        <span> Kalender </span> <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li>
                            <a href="#" class="sidebar-link">Lihat</a>
                        </li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><i class="fa-solid fa-inbox"></i>
                        <span> Email </span> <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li>
                            <a href="#" class="sidebar-link">Lihat</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>