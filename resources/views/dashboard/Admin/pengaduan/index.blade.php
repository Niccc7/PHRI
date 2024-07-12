@extends('dashboard.layouts.main')
@section('content')
<div class="card mb-0">
    <div class="card-body">
        <h4 class="card-title text-center">Pengaduan</h4>
        <div class="table-responsive">
            <table class="table datanew">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Jenis Pengaduan</th>
                        <th scope="col">Nama Pelapor</th>
                        <th scope="col">Alamat yang dituju</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Tanggal Pengaduan</th>
                        {{-- <th scope="col">Status</th>
                        <th scope="col">Alasan</th> --}}
                        {{-- <th scope="col">Action</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengaduan as $p)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <th>{{ $p->benefits->name}}</th>
                        <th>{{ $p->nama_pelapor }}</th>
                        <th>{{ $p->member->nama_usaha }}, {{$p->member->alamat}}</th>
                        <th>{{ $p->desc }}</th>
                        <th>{{ $p->created_at }}</th>
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