@extends('dashboard.layouts.main')

@section('content')
    <div class="card mb-0">
        <div class="card-body">
            <h4 class="card-title text-center">All Admin</h4>
            <button type="button" class="btn btn-primary mt-3 mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Tambah Admin
            </button>
            <div class="table-responsive">
                <table class="table datanew">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admins as $admin)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <th class="text-capitalize">{{ $admin->name }}</th>
                                <th class="text-capitalize">{{ $admin->email }}</th>
                                <th>
                                    <form action="{{ route('dashboard.admin.reset-pass') }}" method="post" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$admin->id}}">
                                        <button class="btn btn-sm btn-warning border-0 text-white btn-reset">Reset Password</button>
                                    </form>
                                    <form action="{{ route('dashboard.admin.destroy', ['id' => $admin->id]) }}"
                                        method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-sm btn-danger border-0 btn-delete">Delete</button>
                                    </form>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal Tambah Admin -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-white">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-black" id="exampleModalLabel">Form Tambah Admin</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form_store" class="mb-5">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label><span style="margin-left: 1px;color: red">*</span>
                            <input type="text" class="form-control"
                                id="name" name="name" value="{{ old('name') }}" required autofocus
                                >
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label><span style="margin-left: 1px;color: red">*</span>
                            <input type="text" class="form-control"
                                id="username" name="username" required>
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label><span style="margin-left: 1px;color: red">*</span>
                            <input type="email" class="form-control" id="email" name="email" required value="{{ old('email') }}">
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <label>Password<span style="margin-left: 0.5px;color: red">*</span></label>
                                <div class="pass-group">
                                    <input type="password" class="pass-input"
                                        name="password" required>
                                    <span class="fas toggle-password fa-eye-slash"></span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Tambah Admin</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(function() {
            $(document).on('submit', '#form_store', function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "{{route('dashboard.admin.add')}}",
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
                    confirmButtonText: "Iya!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        setTimeout(function() {
                            Swal.fire({
                                title: "Terhapus!",
                                text: "Data Berhasil dihapus",
                                icon: "success"
                            });

                            $(e.target).closest('form').submit();

                            setTimeout(function() {
                                location.reload();
                            }, 3000);
                        }, delay);
                    }
                });
            })

            $(document).on('click', '.btn-reset', function(e) {
                e.preventDefault();

                var delay = $(this).data('delay');

                Swal.fire({
                    title: "Anda Yakin?",
                    text: "Ingin Mereset Password akun ini!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#432D77",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Iya!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        setTimeout(function() {
                            Swal.fire({
                                title: "Terhapus!",
                                text: "Password berhasil direset",
                                icon: "success"
                            });

                            $(e.target).closest('form').submit();

                            setTimeout(function() {
                                location.reload();
                            }, 3000);
                        }, delay);
                    }
                });
            })
            
        })
    </script>
@endsection
