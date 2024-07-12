@extends('template.main')
@section('content')
    @push('style')
        <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    @endpush
    @include('navbar')
    <section id="hero" class="photo1">
        <div class="box">
            <div class="content">
                <img src="{{ asset('assets/img/PHRIP.png') }}" alt="">
                <h2>
                    Sistem Digitalisasi Yang Terintegrasi dengan Seluruh Anggota PHRI
                    Kota Pontianak
                </h2>
            </div>
        </div>
    </section>
    <section id="about-us">
        <div class="content1">
            <h1 class="Kami">Tentang Kami</h1>
            <h2>
                Awak Datang, Kamek Sambot. Selamat datang di website resmi Pemerintah
                Kota Pontianak. Memuat beragam topik dan informasi terkini yang
                diterbitkan langsung oleh pemerintah kota, untuk masyarakat daerah
                Kota Pontianak dan sekitarnya. Semoga dengan adanya website resmi ini,
                dapat memudahkan masyarakat untuk lebih mengetahui kondisi terkini
                dari Kota Pontianak, sebaliknya pemerintah kota yang juga turut andil
                besar dalam bersama menggiring masyarakat untuk memajukan Kota
                Pontianak tercinta ini. Terima Kasih.
            </h2>
        </div>
        <div class="box2">
            <div class="box3">
                <div class="img1">
                    <img src="{{ asset('assets/img/PHRIP.png') }}" alt="" class="PHRIP">
                </div>
                <div class="img2">
                    <img src="{{ asset('assets/img/home/semangat.png') }}" alt="" class="semangat">
                </div>
                <h1>Dapatkan Keuntungan</h1>
                <div class="grid-container">
                    <h2 style="width: 200px; font-size: 18px; font-weight:600;">
                        Diskon Pengiriman Barang ke Jakarta
                    </h2>
                    <h2 style="width: 200px; font-size: 20px; font-weight:600;">
                        Konsultan Financial Perbankan
                    </h2>
                    <h2 style="width: 150px; font-size: 20px; font-weight:600;">
                        Pengurusan Perizinan OSS
                    </h2>
                    <p style="padding-top: 40px; font-size: 20px !important;  font-weight:600;">Button Panic</p>
                    <h2 style="padding-top: 40px; font-size: 18px; font-weight:600;">Bantuan Hukum</h2>
                    <h2 style="padding-top: 40px; width: 150px; font-size: 20px; font-weight:600;">
                        Bantuan Teknik Kelistrikan
                    </h2>
                    <h2 style="padding-top: 40px; font-size: 20px; font-weight:600;">
                        Sertifikasi Halal
                    </h2>
                    <h2 style="padding-top: 40px; font-size: 20px; font-weight:600;">Desain Interior</h2>
                    <h2 style="padding-top: 40px; font-size: 20px; font-weight:600;">Supplier</h2>
                </div>
                <a href="{{ route('register.member') }}" class="button">Daftar Sekarang</a>
            </div>
        </div>
    </section>
    <section id="kemitraan" class="section-kemitraan">
        <div class="kemitraan">
            <img src="{{ asset('assets/img/home/kemitraan.png') }}" alt="" class="kemitraan">
        </div>

        <div class="imgs">
            <div class="background">
                <img src="{{ asset('assets/img/home/background.png') }}" alt="" class="background">
            </div>

            <div class="koki">
                <img src="{{ asset('assets/img/home/koki.png') }}" alt="">
                <div class="content2">
                    <h5>
                        Kami Membuka Peluang Kemitraan Kepada Semua Pihak untuk Menjadi
                        Kemitraan PHRI Pontianak, Silahkan Segera Masukan Penawaran Anda
                        Dibawah Ini.
                    </h5>
                    <a href="{{ route('kemitraan') }}" class="action-btn">Masukan Penawaran</a>
                </div>
            </div>
        </div>
        <section>
            <div class="beritas"><u>Berita</u>
                <a href="{{ route('berita') }}" class="next">Selengkapnya > </a>
            </div>
        </section>

        <section class="grid-container3">
            <div class="popularterbaru">
                <h2 style="font-size:24px; font-weight: bold;">Popular</h2>
                <h2 style="padding-left: 58%; font-size:24px; font-weight: bold;">Terbaru</h2>
            </div>
        </section>

        <section class="grid">
            <div class="popular">
                <h3 style="font-weight: bold; font-size:24px;">{{ $beritas[0]->created_at->format('d M Y') ?? '-' }}</h3>
                <img src="{{ asset('storage/berita-images/' . $beritas[0]->image) }}" alt="" width="90%" style="border-radius: 8px; margin-left:32px">
                <h2 style="font-weight: bold;"><a href="{{ route('berita.detail', ['slug' => $beritas[0]->slug]) }}">{{ $beritas[0]->title }}</a></h2>
                <p><a href="{{ route('berita.detail', ['slug' => $beritas[0]->slug]) }}">{{ Str::limit($beritas[0]->description, 130) }}</a></p>
                <a class="selengkapnya" style="margin-left: -70px;" href="{{ route('berita.detail', ['slug' => $beritas[0]->slug]) }}">Selengkapnya</a>
            </div>


            <div class="new" style="height: 120px">
                @foreach ($beritas->skip(1) as $b)    
                    <div class="new1">
                        <img src="{{ asset('storage/berita-images/' . $b->image) }}" alt="" width="30%"
                            style="border-radius: 8px" >
                        <h4 style="font-weight: bold;"><a href="{{ route('berita.detail', ['slug' => $b->slug]) }}">{{ $b->title }}</a></h4>
                        <h5>#indonesitothemoon #kamimaugajiiiiiiiiiiiiiiii #loveusooo</h5>
                        <h5 style="padding-top: 5px">{{ $b->created_at->format('d M Y') }}</h5>
                    </div>
                    <br>
                @endforeach
            </div>
        </section>
        <br>

        <div class="KemitraanKami">
            <h1 style="font-size: 36px;">Kemitraan Kami</h1>
        </div>

        <div class="grid-container1">
            <div class="neo">
                <img src="{{ asset('assets/img/mitra/neo.png') }}" alt="" class="neo">
            </div>

            <div class="maestro">
                <img src="{{ asset('assets/img/mitra/maestro.png') }}" alt="" class="maestro">
            </div>

            <div class="clubhouse" style="padding-left: 90px;">
                <img src="{{ asset('assets/img/mitra/clubhouse.png') }}" alt="" class="clubhouse">
            </div>
        </div>
    </section>
    <br>
    @push('style')
        <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}">
    @endpush
    @include('footer')
@endsection
@section('script')

@endsection