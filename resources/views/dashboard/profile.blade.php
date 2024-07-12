@extends('dashboard.layouts.main')

@section('content')
    <div class="page-header">
        <div class="page-title">
            <h4>Profile {{ auth('admin')->user()->name }}</h4>
        </div>
    </div>
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
                                @if(empty($profile->image))
                                    <img src="{{ asset('storage/img-admin/admin.jpg') }}" alt="">
                                @else
                                    <img src="{{ asset('storage/img-admin/' . $profile->image) }}" alt="img" id="">
                                @endif
                                <div class="profileupload">
                                    <input type="file" id="imgInp" name="image">
                                    <a href="javascript:void(0);"><img
                                            src="{{ asset('assets/img/icons/edit-set.svg') }}"alt="img"></a>
                                </div>
                        </div>
                        <div class="profile-contentname">
                            <h2 class="text-capitalize">{{ auth('admin')->user()->name }}</h2>
                            <h4>Update Foto dan Data Diri</h4>
                        </div>
                    </div>
                    <div class="ms-auto">
                        <button type="submit" class="btn btn-submit me-2">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <form id="update-profile">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Name<span style="margin-left: 1px;color: red">*</span></label>
                                <input type="text" disabled value="{{ auth('admin')->user()->name }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Username<span style="margin-left: 1px;color: red">*</span></label>
                                <input type="text" name="username" placeholder="masukkan username"
                                    value="{{ auth('admin')->user()->username }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email<span style="margin-left: 1px;color: red">*</span></label>
                                <input type="text" name="email" placeholder="email@example.com"
                                    value="{{ auth('admin')->user()->email }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Password<span style="margin-left: 1px;color: red">*</span></label>
                                <div class="pass-group">
                                    <input type="password" class=" pass-input" name="password">
                                    <span class="fas toggle-password fa-eye-slash"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-submit me-2">Submit</button>
                    </div>
                </form>
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
            $(document).on('submit', '#store-img', function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "/dashboard/profile/img-upd",
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
                    url: "/dashboard/profile/update",
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
