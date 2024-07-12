@extends('dashboard.layouts.main')
@section('content')
    <div class="card mb-0">
        <div class="card-body">
            <h4 class="card-title text-center">All Mitra</h4>
            <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Tambah Mitra
            </button>
            <div class="table-responsive">
                <table class="table datanew">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Bagian</th>
                            <th scope="col">Email</th>
                            <th scope="col">No Hp</th>
                            <th scope="col">Tanggal Masuk</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mitras as $m)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $m->nama_pic }}</td>
                                <td>{{ $m->jenis_usaha->name }}</td>
                                <td>{{ $m->email }}</td>
                                <td>+62{{ $m->no_hp }}</td>
                                <td>{{ $m->created_at->format('d-M-Y') }}</td>
                                <td>
                                    <form action="{{ route('dashboard.mitra.destroy', ['id' => $m->id]) }}"
                                        method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-sm btn-danger border-0 btn-delete">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal Tambah Mitra -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-white">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-black" id="exampleModalLabel">Form Tambah Mitra</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="form_store" class="mb-5">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label><span style="margin-left: 1px;color: red">*</span>
                            <input type="text" class="form-control" id="nama_pic" name="nama_pic"
                                value="{{ old('nama_pic') }}" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label><span style="margin-left: 1px;color: red">*</span>
                            <input type="text" class="form-control" id="email" name="email"
                                value="{{ old('email') }}" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="no_hp" class="form-label">No Handphone</label><span style="margin-left: 1px;color: red">*</span>
                            <input type="number" class="form-control" id="no_hp" name="no_hp"
                                value="{{ old('no_hp') }}" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="bagian" class="form-label">Bagian</label><span style="margin-left: 1px;color: red">*</span>
                            <select name="jenis_usaha_id" class="select2" style="border-radius: 5px;">
                                <option hidden>silahkan pilih</option>
                                @foreach ($jenis_usaha as $jenis)
                                    <option value="{{ $jenis->id }}">{{ $jenis->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label><span style="margin-left: 1px;color: red">*</span>
                            <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan"
                                value="{{ old('nama_perusahaan') }}" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="jenis_kerjasama" class="form-label">Jenis Kerjasama</label><span style="margin-left: 1px;color: red">*</span>
                            <textarea class="form-control" id="jenis_kerjasama" name="jenis_kerjasama" required autofocus></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Tambah Mitra</button>
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

            $(document).ready(function() {
                $('.select2').select2();
            });
            $(document).on('submit', '#form_store', function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "/dashboard/superadmin/mitra/store",
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
                            }, 1000);
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

            $(document).on('click', '.btn-delete', function(e) {
                e.preventDefault();

                var delay = $(this).data('delay');

                Swal.fire({
                    title: "Anda Yakin?",
                    text: "Data akan terhapus dan tidak dapat dipulihkan!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#432D77",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        setTimeout(function() {
                            Swal.fire({
                                title: "Terhapus!",
                                text: "Data Berhasil dihapus",
                                icon: "success"
                            });

                            // Submit the form
                            $(e.target).closest('form').submit();

                            // Reload the page after the form is submitted
                            setTimeout(function() {
                                location.reload();
                            }, 1000);
                        }, delay);
                    }
                });
            });
        })
    </script>
@endsection