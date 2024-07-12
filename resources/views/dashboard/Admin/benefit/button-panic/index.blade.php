@extends('dashboard.layouts.main')

@section('content')
    <div class="card mt-3 mb-0">
        <div class="card-body">
            <h4 class="card-title text-center">Data Pengguna Button Panic</h4>
            <div class="mb-3" style="display: flex; justify-content: center; align-items: center;">
                <img src="{{ asset('assets/img/informasi/panic.png') }}">
            </div>
            <div class="table-responsive">
                <table class="table datanew">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Pelapor</th>
                            <th scope="col">Tujuan</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($panic as $p)                            
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$p->nama_pelapor}}</td>
                                <th>{{$p->member->nama_usaha }}, {{$p->member->alamat}}</th>
                                <td>{{$p->desc}}</td>
                                <th>-</th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection