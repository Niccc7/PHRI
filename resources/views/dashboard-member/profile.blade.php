@extends('dashboard-member.layouts.main')

@section('content')
    <div class="page-header">
        <div class="page-title">
            <h4 class="text-capitalize">Profile {{ auth('member')->user()->name }}</h4>
        </div>
    </div>

    @if ($data->status_data === 'belum_input')
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Anda belum Melengkapi Bata!</strong> Segera Lengkapi Data Anda !.
            <a href="{{ route('isidata.member') }}" class="btn btn-sm btn-primary">Lengkapi Data</a>
        </div>
    @elseif($data->status_data === 'ditolak')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data Anda telah ditolak</strong> Silahkan Cek kembali Data Anda !.
            <a href="{{ route('isidata.member') }}" class="btn btn-sm btn-primary">Lengkapi Data</a>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="profile-set">
                <div class="profile-head">
                </div>
                <div class="profile-top">
                    <div class="profile-content">
                        <div class="profile-contentimg">
                            <form id="store-img" enctype="multipart/form-data">
                                @csrf
                                @if (empty($profile->image))
                                    <img src="{{ asset('storage/img-member/member.png') }}" alt="">
                                @else
                                    <img src="{{ asset('storage/img-member/' . $profile->image) }}" alt="img"
                                        id="">
                                @endif
                                <div class="profileupload">
                                    <input type="file" id="imgInp" name="image">
                                    <a href="javascript:void(0);"><img
                                            src="{{ asset('assets/img/icons/edit-set.svg') }}"alt="img"></a>
                                </div>
                        </div>
                        <div class="profile-contentname">
                            <h2 class="text-capitalize">{{ auth('member')->user()->name }}</h2>
                            <h4>Update Foto dan Data Diri</h4>
                        </div>
                    </div>
                    <div class="ms-auto">
                        <button type="submit" class="btn btn-primary me-2">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <form id="update-profile">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 mt-4">
                            <div class="form-group">
                                <label>Email<span style="margin-left: 1px;color: red">*</span></label>
                                <input type="text" name="email" placeholder="email@example.com"
                                    value="{{ auth('member')->user()->email }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label> Show Password <span class="fas toggle-password fa-eye-slash"></span></label>
                            <div class="form-group">
                                <label>Password Baru<span style="margin-left: 1px;color: red">*</span></label>
                                <div class="pass-group">
                                    <input type="password" class="pass-input" name="password">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Password Lama</label>
                                <input type="text" class="pass-input">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Konfirmasi Password<span style="margin-left: 1px;color: red">*</span></label>
                                <div class="pass-group">
                                    <input type="password" class="pass-input" name="password_confirmation">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @if ($data->status_data === 'diterima')
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-set">
                            <h3> <i class="fa-solid fa-face-smile-beam"></i> Member Information</h3>
                            <hr style="border-bottom: 4px; background-color: #ff9f43;">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <h6>Nama Usaha: {{ $data->nama_usaha ?? '-' }}</h6>
                                </div>
                                <div class="mb-3">
                                    <h6>Alamat: {{ $data->alamat ?? '-' }}</h6>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <h6>Jenis Usaha: {{ $data->jenis_usaha->name ?? '-' }}</h6>
                                </div>
                                <div class="mb-3">
                                    <h6>Klasifikasi Usaha: {{ $data->klasifikasi_usaha->name ?? '-' }}</h6>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <h6>Rating Usaha:
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $data->rating_usaha)
                                                <i class="fas fa-star"></i>
                                            @else
                                                <i class="far fa-star"></i>
                                            @endif
                                        @endfor
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-set">
                            <h3><i class="fa-solid fa-circle-info"></i> Legal Information</h3>
                            <hr style="border-bottom: 4px; background-color: #ff9f43;">
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <h6>Nama Badan Hukum Perusahaan: {{ $legal->nama_badan_hukum_perusahaan ?? '-' }}</h6>
                                </div>
                                @if (empty($legal->nomor_induk_berusaha))
                                @else
                                    <div class="mb-3">
                                        <h6>Nomor Induk Berusaha: {{ $legal->nomor_induk_berusaha ?? '-' }}</h6>
                                    </div>
                                @endif
                                <div class="mb-3">
                                    @if (!empty($legal->nomor_tdup))
                                        <h6>Nomor TDUP: {{ $legal->nomor_tdup }},</h6>
                                    @endif

                                    @if (!empty($legal->nomor_siu_pariwisata))
                                        <h6>Nomor SIU Pariwisata: {{ $legal->nomor_siu_pariwisata }},</h6>
                                    @endif

                                    @if (!empty($legal->nomor_siu_perdagangan))
                                        <h6>Nomor SIU Perdagangan: {{ $legal->nomor_siu_perdagangan }}</h6>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <h6>Nomor Akte Pendirian Perusahaan:
                                        {{ $legal->nomor_akte_pendirian_perusahaan ?? '-' }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="profile-set">
                    <h3> <i class="fa-solid fa-sitemap"></i> Owner & PIC Information</h3>
                    <hr style="border-bottom: 4px; background-color: #ff9f43;">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="mb-3">Owner:</h4>
                        <div class="mb-3">
                            <h6>Nama Pemilik: {{ $owner->nama_pemilik ?? '-' }}</h6>
                        </div>
                        <div class="mb-3">
                            <h6>Jabatan: {{ $owner->jabatan ?? '-' }}</h6>
                        </div>
                        <div class="mb-3">
                            <h6>Nomor Indentitas: {{ $owner->no_identitas_pemilik ?? '-' }}</h6>
                        </div>
                        <div class="mb-3">
                            <h6>Nomor Handphone: +62{{ $owner->no_hp_pemilik ?? '-' }}</h6>
                        </div>
                        <div class="mb-3">
                            <h6>Email: {{ $owner->email_pemilik ?? '-' }}</h6>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4 class="mb-3">PIC:</h4>
                        <div class="mb-3">
                            <h6>Nama PIC: {{ $owner->nama_pic ?? '-' }}</h6>
                        </div>
                        <div class="mb-3">
                            <h6>Jabatan PIC: {{ $owner->jabatan_pic ?? '-' }}</h6>
                        </div>
                        <div class="mb-3">
                            <h6>Nomor Indentitas: {{ $owner->no_identitas_pic ?? '-' }}</h6>
                        </div>
                        <div class="mb-3">
                            <h6>Nomor Handphone: +62{{ $owner->no_hp_pic ?? '-' }}</h6>
                        </div>
                        <div class="mb-3">
                            <h6>Email PIC: {{ $owner->email_pic ?? '-' }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if ($data->jenis_usaha_id === 1)
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="profile-set">
                                <h3><i class="fa-solid fa-list"></i> Summary Information</h3>
                                <hr style="border-bottom: 4px; background-color: #ff9f43;">
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <h6>Jumlah Kamar: {{ $summary->total_jumlah_kamar ?? '-' }}</h6>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <h6>Ruang Pertemuan: {{ $summary->ruang_pertemuan ?? '-' }}</h6>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <h6>Jumlah Karyawan: {{ $summary->total_jumlah_karyawan ?? '-' }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="profile-set">
                                <h3><i class="fa-solid fa-handshake"></i> Meeting Room Information</h3>
                                <hr style="border-bottom: 4px; background-color: #ff9f43;">
                            </div>
                            @foreach ($meeting as $meeting)
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <h6>Nama Ruangan: {{ $meeting->nama_ruangan ?? '-' }}</h6>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <h6>Kapasitas Maksimal: {{ $meeting->kapasitas_maksimal ?? '-' }}</h6>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="profile-set">
                                <h3><i class="fa-solid fa-bed"></i> Room Detail Information</h3>
                                <hr style="border-bottom: 4px; background-color: #ff9f43;">
                            </div>
                            @foreach ($room as $room)
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <h6>Nama Kamar: {{ $room->nama_kamar ?? '-' }}</h6>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <h6>Tipe Kamar: {{ $room->tipe_kamar ?? '-' }}</h6>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <h6>Jumlah Kamar: {{ $room->jumlah ?? '-' }}</h6>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="profile-set">
                                <h3><i class="fa-solid fa-users"></i> Employee Detail Information</h3>
                                <hr style="border-bottom: 4px; background-color: #ff9f43;">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <h6>Jumlah Karyawan Tetap: {{ $employee->jumlah_karyawan_tetap ?? '-' }}</h6>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <h6>Jumlah Karyawan Kontrak: {{ $employee->jumlah_karyawan_kontrak ?? '-' }}</h6>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <h6>Jumlah Karyawan Harian: {{ $employee->jumlah_karyawan_harian ?? '-' }}</h6>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <h6>Jumlah Karyawan Outsource: {{ $employee->jumlah_karyawan_outsource ?? '-' }}
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if ($data->jenis_usaha_id === 2)
            <div class="card">
                <div class="card-body">
                    <div class="profile-set">
                        <h3><i class="fa-solid fa-users"></i> Employee Detail Information</h3>
                        <hr style="border-bottom: 4px; background-color: #ff9f43;">
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <h6>Jumlah Karyawan Keseluruhan: {{ $summary->total_jumlah_karyawan ?? '-' }}</h6>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <h6>Jumlah Karyawan Tetap: {{ $employee->jumlah_karyawan_tetap ?? '-' }}</h6>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <h6>Jumlah Karyawan Kontrak: {{ $employee->jumlah_karyawan_kontrak ?? '-' }}</h6>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <h6>Jumlah Karyawan Harian: {{ $employee->jumlah_karyawan_harian ?? '-' }}</h6>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <h6>Jumlah Karyawan Outsource: {{ $employee->jumlah_karyawan_outsource ?? '-' }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @elseif ($data->status_data === 'ditolak')
        <h4 class="text-center">Silahkan Cek Kembali Data Ada Kembali</h4>
    @else
        <h4 class="text-center">Data Lengkap Akan Muncul Setelah diterima oleh Admin</h4>
    @endif

@endsection
@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(function() {
            $(document).on('submit', '#store-img', function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "{{ route('dashboard-member.profile.img.upd') }}",
                    data: new FormData(this),
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.status == true) {
                            Swal.fire({
                                title: "Berhasil!",
                                text: response.pesan,
                                icon: "success"
                            }).then(() => {
                                $('#exampleModal').modal('hide');
                                window.location.reload();
                            });
                        } else {
                            Swal.fire({
                                title: "Error!",
                                text: response.error,
                                icon: "error"
                            });
                        }
                    }
                });
            });

            $(document).on('submit', '#update-profile', function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "{{ route('dashboard-member.profile.update') }}",
                    data: new FormData(this),
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.status == true) {
                            Swal.fire({
                                title: "Berhasil!",
                                text: response.pesan,
                                icon: "success"
                            }).then(() => {
                                $('#staticBackdrop').modal('hide');
                                window.location.reload();
                            });
                        } else {
                            Swal.fire({
                                title: "Error!",
                                text: response.error,
                                icon: "error"
                            });
                        }
                    }
                });
            });
        })
    </script>
@endsection
