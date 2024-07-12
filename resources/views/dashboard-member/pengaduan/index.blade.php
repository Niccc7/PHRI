@extends('dashboard-member.layouts.main')

@section('content')
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="card mb-0">
        <div class="card-body">
            <h4 class="card-title text-center">History Pengaduan</h4>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Benefit</th>
                            <th>Tanggal Lapor</th>
                            <th>Deskripsi</th>
                            <th>Status Laporan</th>
                            <th>Tanggal Pengecekan</th>
                            <th>Alasan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($laporan as $l)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $l->benefits->name }}</td>
                                <td>{{ $l->created_at->format('D, d-M-Y') }}</td>
                                <td>{{ $l->desc }}</td>
                                <td>
                                    @if ($l->status_laporans === 'n/a')
                                        <span class="badges bg-lightyellow">{{ $l->status_laporans }}</span>
                                    @elseif($l->status_laporans === 'diterima')
                                        <span class="badges bg-lightgreen">{{ $l->status_laporans }}</span>
                                    @else
                                        <span class="badges bg-lightred">{{ $l->status_laporans }}</span>
                                    @endif
                                </td>
                                @if ($l->status_laporans === 'diterima')
                                    <td>{{ $l->updated_at->format('d-M-Y') }}</td>
                                @elseif ($l->status_laporans === 'ditolak')
                                    <td>{{ $l->updated_at->format('d-M-Y') }}</td>
                                @else
                                    <td>-</td>
                                @endif
                                @if ($l->status_laporans === 'ditolak')
                                    {{-- <td>{{ $l->alasan }}</td> --}}
                                @else
                                    <td>-</td>
                                @endif
                                
                                @if ($l->status_laporans === 'n/a')
                                    <td>
                                        <form class="d-inline">
                                            @csrf
                                            <button class="btn btn-sm btn-primary btn-terima">Terima</button>
                                        </form>
                                        <button class="btn btn-sm btn-danger btn-tolak" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">Tolak</button>
                                    </td>
                                @else
                                    <td>-</td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
@endsection
