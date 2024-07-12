@extends('dashboard.layouts.main')
@section('content')
    <div class="card mb-0">
        <div class="card-body">
            <h4 class="card-title text-center">Penawaran</h4>
            <div class="table-responsive">
                <table class="table datanew">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">No Hp</th>
                            <th scope="col">Foto KTP</th>
                            <th scope="col">Tawaran</th>
                            <th scope="col">Status</th>
                            <th scope="col">Tanggal Pengecekan</th>
                            <th scope="col">Alasan</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penawaran as $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p->nama_lengkap }}</td>
                                <td>+62{{ $p->no_hp }}</td>
                                <td>
                                    <img src="{{ asset('storage/foto-ktp/' . $p->foto_ktp) }}" alt="" width="80px">
                                </td>
                                <td>{{ $p->tawaran }}</td>
                                <td>
                                    @if ($p->status === 'n/a')
                                        <span class="badges bg-lightyellow">{{ $p->status }}</span>
                                    @elseif($p->status === 'diterima')
                                        <span class="badges bg-lightgreen">{{ $p->status }}</span>
                                    @else
                                        <span class="badges bg-lightred">{{ $p->status }}</span>
                                    @endif
                                </td>


                                @if ($p->status === 'diterima')
                                    <td>{{ $p->updated_at->format('d-M-Y') }}</td>
                                @elseif ($p->status === 'ditolak')
                                    <td>{{ $p->updated_at->format('d-M-Y') }}</td>
                                @else
                                    <td>-</td>
                                @endif
                                @if ($p->status === 'ditolak')
                                    <td>{{ $p->alasan }}</td>
                                @else
                                    <td>-</td>
                                @endif

                                @if ($p->status === 'n/a')
                                    <td>
                                        <form action="{{ route('dashboard.penawaran.terima', ['id' => $p->id]) }}" method="post" class="d-inline">
                                            @csrf
                                            <button class="btn btn-sm btn-primary btn-terima">Terima</button>
                                        </form>
                                        <button class="btn btn-sm btn-danger btn-tolak" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal" data-id="{{ $p->id }}">Tolak</button>
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

    {{-- Modals nolak penawaran --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-white">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-black" id="exampleModalLabel">Form Tolak Penawaran</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form-tolak" class="mb-5" method="POST">
                        @csrf
                        <input type="hidden" id="tolak_penawaran_id" name="penawaran_id" value="">
                        <div class="mb-3">
                            <label for="name" class="form-label">Alasan</label><span
                                style="margin-left: 1px;color: red">*</span>
                            <textarea class="form-control" id="alasan" name="alasan" required autofocus
                                placeholder="misal: Belum butuh saat ini"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit Alasan</button>
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
                var penawaran_id = $(this).data('id');
                $('#tolak_penawaran_id').val(penawaran_id);
            });

            $(document).on('submit', '#form-tolak', function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                var penawaranId = $('#tolak_penawaran_id').val();
                $.ajax({
                    type: "POST",
                    url: "{{ route('dashboard.penawaran.tolak', ':id') }}".replace(':id', penawaranId),
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
