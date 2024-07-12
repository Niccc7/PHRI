@extends('dashboard.layouts.main')
@section('content')
    <div class="d-flex">
        <a href="{{ route('dashboard.member') }}" class="me-auto btn btn-secondary"
            style="height: 38px; margin-top:8px;">Kembali</a>
        <div class="btn">
            @if ($data->status_data === 'nunggu')
                <form action="{{ route('dashboard.member.terima', ['id' => $data->id]) }}" method="POST" class="d-inline">
                    @csrf
                    <button class="btn btn-primary btn-terima">Terima</button>
                </form>
                <button class="btn btn-danger btn-tolak" data-bs-toggle="modal" data-bs-target="#exampleModal"
                    data-id="{{ $data->id }}">Tolak</button>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card mt-3 mb-0">
                <div class="card-body">
                    <h3 class="mb-3"><i class="fa-solid fa-face-smile-beam"></i> Data Member: </h3>
                    <hr style="border-bottom: 4px; background-color: #ff9f43;">
                    <h6 class="mt-1">Nama Usaha: {{ $data->nama_usaha }}</h6>
                    <h6 class="mt-1">Jenis Usaha: {{ $data->jenis_usaha->name }}</h6>
                    <h6 class="mt-1">Klasifikasi Usaha: {{ $data->klasifikasi_usaha->name }}</h6>
                    <h6 class="mt-1"> Rating Usaha:
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $data->rating_usaha)
                                <i class="fas fa-star"></i>
                            @else
                                <i class="far fa-star"></i>
                            @endif
                        @endfor
                    </h6>
                    <h6 class="mt-1">Alamat Usaha: {{ $data->alamat }}</h6>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mt-3 mb-0">
                <div class="card-body">
                    <h3><i class="fa-solid fa-circle-info"></i> Legal Information: </h3>
                    <hr style="border-bottom: 4px; background-color: #ff9f43;">
                    <h6 class="mt-1">Nama Badan Hukum Perusahaan: {{ $legal->nama_badan_hukum_perusahaan }}</h6>
                    <h6 class="mt-1">Nomor Induk Berusaha: {{ $legal->nomor_induk_berusaha ?? '-' }}</h6>
                    <h6 class="mt-1"> Nomor Akte Pendirian Perusahaan:
                        {{ $legal->nomor_akte_pendirian_perusahaan ?? '-' }}</h6>
                    <h6 class="mt-1">
                        @if (!empty($legal->nomor_tdup))
                            <h6>Nomor TDUP: {{ $legal->nomor_tdup }},</h6>
                        @endif

                        @if (!empty($legal->nomor_siu_pariwisata))
                            <h6>Nomor SIU Pariwisata: {{ $legal->nomor_siu_pariwisata }},</h6>
                        @endif

                        @if (!empty($legal->nomor_siu_perdagangan))
                            <h6>Nomor SIU Perdagangan: {{ $legal->nomor_siu_perdagangan }}</h6>
                        @endif
                    </h6>
                </div>
            </div>
        </div>
        <div class="col-md-12 mt-3">
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
                                <h6>Nama Pemilik: {{ $owner->nama_pemilik }}</h6>
                            </div>
                            <div class="mb-3">
                                <h6>Jabatan: {{ $owner->jabatan }}</h6>
                            </div>
                            <div class="mb-3">
                                <h6>Nomor Indentitas: {{ $owner->no_identitas_pemilik }}</h6>
                            </div>
                            <div class="mb-3">
                                <h6>Nomor Handphone: +62{{ $owner->no_hp_pemilik }}</h6>
                            </div>
                            <div class="mb-3">
                                <h6>Email: {{ $owner->email_pemilik }}</h6>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4 class="mb-3">PIC:</h4>
                            <div class="mb-3">
                                <h6>Nama PIC: {{ $owner->nama_pic }}</h6>
                            </div>
                            <div class="mb-3">
                                <h6>Jabatan PIC: {{ $owner->jabatan_pic }}</h6>
                            </div>
                            <div class="mb-3">
                                <h6>Nomor Indentitas: {{ $owner->no_identitas_pic }}</h6>
                            </div>
                            <div class="mb-3">
                                <h6>Nomor Handphone: +62{{ $owner->no_hp_pic }}</h6>
                            </div>
                            <div class="mb-3">
                                <h6>Email PIC: {{ $owner->email_pic }}</h6>
                            </div>
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
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <h6>Jumlah Kamar: {{ $summary->total_jumlah_kamar ?? '-' }}</h6>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <h6>Ruang Pertemuan: {{ $summary->ruang_pertemuan ?? '-' }}</h6>
                                    </div>
                                </div>
                                <div class="col-md-6">
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
            <div class="col-md-12">
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
            </div>
        @endif
    </div>
    {{-- Modal nolak member --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-white">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-black" id="exampleModalLabel">Form Tolak Member</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form-tolak" class="mb-5" method="POST">
                        @csrf
                        <input type="hidden" id="tolak_member_id" name="member_id" value="">
                        <div class="mb-3">
                            <label for="name" class="form-label">Alasan</label><span
                                style="margin-left: 1px;color: red">*</span>
                            <textarea class="form-control" id="alasan" name="alasan" required autofocus
                                placeholder="misal: Data Kurang Lengkap"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
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

        $(function() {
            $(document).on('click', '.btn-tolak', function(e) {
                e.preventDefault();
                var Member_id = $(this).data('id');
                $('#tolak_member_id').val(Member_id);
            });

            $(document).on('submit', '#form-tolak', function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                var MemberId = $('#tolak_member_id').val();
                $.ajax({
                    type: "POST",
                    url: "{{ route('dashboard.member.tolak', ':id') }}".replace(':id', MemberId),
                    data: formData,
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
                                window.location.href =
                                    "{{ route('dashboard.member') }}";
                            }, 4000);
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
            $(document).on('click', '.btn-terima', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: "Anda yakin?",
                    text: "Menerima pengajuan member?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#432D77",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, Terima!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        setTimeout(function() {
                            Swal.fire({
                                title: "Berhasil!",
                                text: "Pengajuan Member berhasil diterima",
                                icon: "success"
                            });

                            $(e.target).closest('form').submit();

                            setTimeout(function() {
                                location.reload();
                            }, 5000);
                        });
                    }
                });
            })
        })
    </script>
@endsection
