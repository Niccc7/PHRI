@extends('dashboard.layouts.main')
@section('content')
    <div class="card mb-0">
        <div class="card-body">
            <h4 class="card-title text-center">All Mitra</h4>
            <div class="table-responsive">
                <table class="table datanew">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Bagian</th>
                            <th scope="col">Tanggal Pengajuan</th>
                            <th scope="col">Status</th>
                            <th scope="col">Tanggal Diterima</th>
                            <th scope="col">Alasan</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mitras as $m)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $m->nama_pic }}</td>
                                <td>{{ $m->jenis_usaha->name }}</td>
                                <td>{{ $m->created_at->format('d-M-Y') }}</td>
                                <td>
                                    @if ($m->status === 'n/a')
                                        <span class="badges bg-lightyellow">{{ $m->status }}</span>
                                    @elseif($m->status === 'diterima')
                                        <span class="badges bg-lightgreen">{{ $m->status }}</span>
                                    @else
                                        <span class="badges bg-lightred">{{ $m->status }}</span>
                                    @endif
                                </td>


                                @if ($m->status === 'diterima')
                                    <td>{{ $m->updated_at->format('d-M-Y') }}</td>
                                @elseif ($m->status === 'ditolak')
                                    <td>{{ $m->updated_at->format('d-M-Y') }}</td>
                                @else
                                    <td>-</td>
                                @endif
                                @if ($m->status === 'ditolak')
                                    <td>{{ $m->alasan }}</td>
                                @else
                                    <td>-</td>
                                @endif

                                @if ($m->status === 'n/a')
                                    <td>
                                        <form action="{{ route('dashboard.mitra.terima', ['id' => $m->id]) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button class="btn btn-sm btn-primary btn-terima">Terima</button>
                                        </form>
                                        <button class="btn btn-sm btn-danger btn-tolak" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal" data-id="{{ $m->id }}">Tolak</button>
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

    {{-- Modals nolak mitra --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-white">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-black" id="exampleModalLabel">Form Tolak Mitra</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form-tolak" class="mb-5" method="POST">
                        @csrf
                        <input type="hidden" id="tolak_mitra_id" name="mitra_id" value="">
                        <div class="mb-3">
                            <label for="name" class="form-label">Alasan</label><span
                                style="margin-left: 1px;color: red">*</span>
                            <textarea class="form-control" id="alasan" name="alasan" required autofocus
                                placeholder="misal: Belum butuh saat ini"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Tambah Data</button>
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

            $(document).on('click', '.btn-tolak', function(e){
                e.preventDefault();
                var mitra_id = $(this).data('id');
                $('#tolak_mitra_id').val(mitra_id);
            });

            $(document).on('submit', '#form-tolak', function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                var mitraId = $('#tolak_mitra_id').val();
                $.ajax({
                    type: "POST",
                    url: "{{ route('dashboard.mitra.tolak', ':id') }}".replace(':id', mitraId),
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
                    text: "menerima pengajuan sebagai mitra?",
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
                                text: "Data Berhasil diperbarui!",
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
        });
    </script>
@endsection
