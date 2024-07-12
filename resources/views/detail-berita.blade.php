@extends('template.main')
@section('content')
    @push('style')
        <link rel="stylesheet" href="{{ asset('assets/css/berita-detail.css') }}">
    @endpush
    @include('navbar')
    <section class="post-header">
        <a href="{{ route('berita') }}" class="back-home">Back <i class='bx bx-chevron-right icon-back' ></i></a>
        <div class="header-content post-container">
            <h1 class="header-title">{{ $berita->title }}</h1>
            <img class="img-berita" src="{{ asset('storage/berita-images/' . $berita->image) }}" alt="" width="600px">
        </div>
    </section>
    <section class="post-content post-container" style="margin-top: 3.5rem; margin-bottom:50px;">
        <p class="tanggal-berita" style="margin-bottom: 3rem">{{ $berita->created_at->format('D, d-m-Y') }}</p>
        <p class="post-text" >{{ $berita->description }}</p>
    </section>
    @push('style')
        <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}">
    @endpush
    @include('footer')
@endsection