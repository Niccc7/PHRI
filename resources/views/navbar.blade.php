<div class="header">
    <div class="logo">
        <a href="{{ route('home') }}"><img src="{{ asset('assets/img/logo2.png') }}" height="50px" width="50px"
                alt=""></a>
    </div>
    <div class="pemisah">
        <nav>
            <a href="{{ route('home') }}" class="home">Home</a>
            <a href="{{ route('berita') }}" class="berita">Berita</a>
            <a href="{{ route('informasi') }}" class="informasi">Informasi</a>
            <a href="{{ route('kemitraan') }}" class="kemitraan">Kemitraan</a>
            <div class="animation start-home"></div>
        </nav>
        @auth('admin')
        <div class="dropdown">
            <button class="dropbtn">
                @if (auth('admin')->check())
                    @if(empty($profile->image))
                        <img src="{{ asset('storage/img-admin/admin.png') }}" height="40px" width="40px" style="border-radius: 50%; background: #f1f1f1; margin-right: 10px;" alt="">
                    @else
                        <img src="{{ asset('storage/img-admin/' . $profile->image) }}" height="40px" width="40px" style="border-radius: 50%; background: #f1f1f1; margin-right: 10px;">
                    @endif
                    {{ auth('admin')->user()->name }} &nbsp;&nbsp;
                @endif
                <i class="fa-solid fa-caret-down"></i>
            </button>
            @if (auth('admin')->check())
                <div class="dropdown-content">
                    <a href="{{ route('dashboard.index') }}">Dashboard</a>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>
                            Logout
                        </button>
                    </form>
                </div>
            @endif
        </div>
        @endauth
        @auth('member')
        <div class="dropdown">
            <button class="dropbtn">
                @if (auth('member')->check())
                    @if(empty($member->image))
                        <img src="{{ asset('storage/img-member/member.png') }}" height="40px" width="40px" style="border-radius: 50%; background: #f1f1f1; margin-right: 10px;" alt="">
                    @else
                        <img src="{{ asset('storage/img-member/' . $member->image) }}" height="40px" width="40px" style="border-radius: 50%; background: #f1f1f1; margin-right: 10px;">
                    @endif
                    {{ auth('member')->user()->name }} &nbsp;&nbsp;
                @endif
                <i class="fa-solid fa-caret-down"></i>
            </button>
            @if (auth('member')->check())
                <div class="dropdown-content">
                    <a href="{{ route('dashboard-member.index') }}">Dashboard</a>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>
                            Logout
                        </button>
                    </form>
                </div>
            @endif
        </div>
        @endauth
        @guest('admin')
            @guest('member')
                @guest('web')
                    <a href="{{ route('login') }}" class="login"><i class="fa-solid fa-arrow-right-to-bracket"></i>&nbsp;Login</a>
                @endguest
            @endguest
        @endguest
    </div>
</div>
