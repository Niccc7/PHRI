@extends('dashboard-member.layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="mb-3">
            <h4>Member Dashboard</h4>
        </div>
        @if ($member->status_data === 'belum_input')
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Anda belum Melengkapi Bata!</strong> Segera Lengkapi Data Anda !.
                <a href="{{ route('isidata.member') }}" class="btn btn-sm btn-primary">Lengkapi Data</a>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif($member->status_data === 'ditolak')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Data Anda telah ditolak</strong> Silahkan Cek kembali Data Anda !.
                <a href="{{ route('isidata.member') }}" class="btn btn-sm btn-primary">Lengkapi Data</a>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($member->status_data === 'belum_input' || $member->status_data === 'ditolak')
            <div class="card bg-white col-md-6">
                <div class="card-header">
                    <h5 class="card-title text-black">
                        Member Name: {{ auth('member')->user()->name }}
                    </h5>
                    <hr>
                    <p>jenis usaha: {{ $member->jenis_usaha->name }}</p>
                    <p>klasifikasi usaha: {{ $member->klasifikasi_usaha->name }}</p>
                    <p>Email: {{ $member->email }}</p>
                    <p>Rating Usaha:
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $member->rating_usaha)
                                <i class="fas fa-star"></i>
                            @else
                                <i class="far fa-star"></i>
                            @endif
                        @endfor
                    </p>
                    <p>Status Data: {{ str_replace('_', ' ', $member->status_data) }}</p>
                    @if ($member->status_data === 'ditolak')
                        <p>Alasan ditolak: {{ $member->alasan ?? '-' }}</p>
                    @endif
                </div>
            </div>
        @endif
    </div>
@endsection
