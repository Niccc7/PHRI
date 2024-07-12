@extends('template.main')
@section('content')
    @push('style')
        <link rel="stylesheet" href="{{ asset('assets/css/berita.css') }}">
    @endpush
    @include('navbar')
    <div class="awalan">
        <div class="photo1">
            <img src="{{ asset('assets/img/tugu.png') }}" alt="" height="100%" width="100%">
            <div class="isi">
                <h1>Berita</h1>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Silahkan cari berita disini" aria-label="Search" >
                </form>
                <nav>
                    <a href="#" class="teratas" >Teratas</a>
                    <a href="#" class="terbaru" >Terbaru</a>
                    <a href="#" class="populer" >Populer</a>
                </nav>
            </div>
        </div>
    </div>
    <h1 class="berita-teratas">Berita Teratas</h1>
    <div class="isi1">
            <div class="content1" style="background-image: url(assets/img/botak.png); ">
                <h1 style="font-size:30px; font-weight:bold;"><a href="{{ route('berita.detail', ['slug' => $beritas[0]->slug]) }}">{{ $beritas[0]->title }}</a></h1>
                <h3><a href="{{ route('berita.detail', ['slug' => $beritas[0]->slug]) }}">{{ Str::limit($beritas[0]->description, 80) }}</a></h3>
                <div class="information">
                    <div class="info-action">
                        <p style="color: white;"><l class="bi bi-eye" style="color: white;" ></l><span style="margin-left: 3px;">1502</span></p>
                        <p style="color: white;"><l class="bi bi-heart-fill" style="color: #e11d48;"></l><span style="margin-left: 3px;">750</span></p>
                    </div>
                    <p style="color: white;">{{ $beritas[0]->created_at->diffForHumans() }}</p>
                </div>
            </div>
            <div class="content2" >
                <h1 style="font-size:30px; font-weight:bold;"><a href="{{ route('berita.detail', ['slug' => $beritas[1]->slug]) }}">{{ $beritas[1]->title }}</a></h1>
                <div class="content2-content" style="background-image: url(assets/img/bambu.png);">
                    <h5><a href="{{ route('berita.detail', ['slug' => $beritas[1]->slug]) }}">{{ Str::limit($beritas[1]->description, 160) }}</a></h5>
                    <div class="information">
                        <div class="info-action">
                            <p style="color: white;" ><l class="bi bi-eye" style="color: white;" ></l><span style="margin-left: 3px;">1403</span></p>
                            <p style="color: white;" ><l class="bi bi-heart-fill" style="color: #e11d48;"></l><span style="margin-left: 3px;">502</span></p>
                        </div>
                        <p style="color: white;">{{ $beritas[1]->created_at->diffForHumans() }}</p>
                    </div>

                </div>
            </div>
    </div>
    <div class="container10">
        @foreach ($beritas->skip(2) as $berita)    
        <div class="container1">
            <img src="{{ asset('storage/berita-images/' . $berita->image) }}" alt="" width="30%" style="object-fit: cover;">
            <div class="content">
                <a href="{{ route('berita.detail', ['slug' => $berita->slug]) }}" class="content-title">{{ $berita->title }}</a>
                <a href="{{ route('berita.detail', ['slug' => $berita->slug]) }}" class="content-description">{{ Str::limit($berita->description, 160) }}</a>
                <div class="information">
                    <div class="info-action">
                        <a href="#" style="color: black;" ><l class="bi bi-eye" style="color: black;" ></l><span>502</span></a>
                        <a href="#" style="color: black;" ><l class="bi bi-heart-fill" style="color: #e11d48;"></l><span>502</span></a>
                    </div>
                    <p style="color: black;">{{ $berita->created_at->diffForHumans() }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="berita-terbaru">
        <h1>Berita Terbaru</h1>
        <a href="">Selengkapnya..</a>
    </div>

    <div class="container11">
        @foreach ($terbaru as $t)    
        <div class="container5">
            <img src="{{ asset('storage/berita-images/' . $t->image) }}" alt="" height="60%" width="100%" style="border-radius: 8px;">
            <h1 style="font-size:20px; font-weight: bold;"><a href="{{ route('berita.detail', ['slug' => $t->slug]) }}">{{ $t->title }}</a></h1>
        </div>
        @endforeach
    </div>


    <div class="berita-populer">
        <h1>Berita Populer</h1>
    </div>
    <div class="container12">
        <div class="tag">
            <p style="font-weight: bolder; font-size: 30px; margin-bottom: 20px; ">Tag Terpopuler</p>
            <div class="tags">
                <p># Kojuliusnaikgaji</p>   
                <h5>200m Berita</h5>
            </div>
            <hr>
            <div class="tags">
                <p># Kojuliusnaikgaji</p>   
                <h5>200m Berita</h5>
            </div>
            <hr>
            <div class="tags">
                <p># Kojuliusnaikgaji</p>   
                <h5>200m Berita</h5>
            </div>
            <hr>
            <div class="tags">
                <p># Kojuliusnaikgaji</p>   
                <h5>200m Berita</h5>
            </div>
            <hr>
            <div class="tags">
                <p># Kojuliusnaikgaji</p>   
                <h5>200m Berita</h5>
            </div>
            <hr>
            <div class="tags">
                <p># Kojuliusnaikgaji</p>   
                <h5>200m Berita</h5>
            </div>
            <hr>
        </div>
        <div class="content">
            @foreach ($populer as $p)    
            <div class="container20">
                <img src="{{ asset('storage/berita-images/' . $p->image) }}" alt="" width="40%" style="border-radius: 8px; border: 2px solid black;">
                <div class="container20-content">
                    <a href="" class="content-title">{{ $p->title }}</a>
                    <h3 class="content-time" style="font-size: 14px;">{{ $p->created_at->diffForHumans() }}</h3>
                    <div class="information">
                        <div class="info-action">
                            <a href="#" style="color: black;" ><l class="bi bi-eye" style="color: black;" ></l><span>502</span></a>
                            <a href="#" style="color: black;" ><l class="bi bi-heart-fill" style="color: #e11d48;"></l><span>502</span></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
    @push('style')
        <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}">
    @endpush
    @include('footer')
@endsection
