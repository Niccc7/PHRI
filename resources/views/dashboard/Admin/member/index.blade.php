@extends('dashboard.layouts.main')

@section('content')
    <div class="card mb-0">
        <div class="card-body">
            <h4 class="card-title text-center">All Member PHRI</h4>
            <div class="table-responsive">
                <table class="table datanew">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Usaha</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Jenis Usaha</th>
                            <th scope="col">Klasifikasi Usaha</th>
                            <th scope="col">Status Data</th>
                            <th scope="col">Alasan</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($member as $m)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <th>{{ $m->nama_usaha }}</th>
                                <th>{{ $m->alamat }}</th>
                                <th>{{ $m->jenis_usaha->name }}</th>
                                <th>{{ $m->klasifikasi_usaha->name }}</th>
                                <th>
                                    @if ($m->status_data === 'nunggu')
                                        <span class="badges bg-lightyellow">{{ $m->status_data }}</span>
                                    @elseif($m->status_data === 'diterima')
                                        <span class="badges bg-lightgreen">{{ $m->status_data }}</span>
                                    @elseif($m->status_data === 'belum_input')
                                        <span class="badges bg-lightred">{{ str_replace('_', ' ', $m->status_data) }}</span>
                                    @else
                                        <span class="badges bg-lightred">{{ $m->status_data }}</span>
                                    @endif
                                </th>
                                <th>{{ $m->alasan ?? '-' }}</th>
                                <th>
                                    <a href="{{ route('dashboard.member.detail', ['id' => $m->id]) }}"
                                        class="btn btn-sm btn-secondary">Detail</a>
                                    @if ($m->status_data === 'nunggu')
                                        <form action="{{ route('dashboard.member.terima', ['id' => $m->id]) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button class="btn btn-sm btn-primary btn-terima">Terima</button>
                                        </form>
                                        <button class="btn btn-sm btn-danger btn-tolak" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="{{ $m->id }}">Tolak</button>
                                    @endif
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
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
                                window.location.reload();
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
