@extends('dashboard.layouts.main')

@section('content')
    <div class="card mb-0">
        <div class="card-body">
            <h4 class="card-title text-center">All Berita</h4>
            <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Tambah Berita
            </button>
            <div class="table-responsive">
                <table class="table datanew">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($beritas as $post)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ asset('storage/berita-images/' . $post->image) }}" height="100px" width="100px" alt="berita-img">
                                </td>
                                <td>
                                    <h6>{{ $post->title }}</h6>
                                    <p>{{ Str::limit($post->description, 50) }}</p>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-warning edit-berita border-0"
                                        value="{{ $post->id }}">
                                        Edit
                                    </button>
                                    <form action="{{ route('dashboard.berita.destroy', ['id' => $post->id]) }}"
                                        method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-sm btn-danger border-0 btn-delete">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal Tambah Berita -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-white">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-black" id="exampleModalLabel">Form Tambah Berita</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="form_store" class="mb-5" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label><span style="margin-left: 1px;color: red">*</span>
                            <input type="text" class="form-control" id="title_create" name="title"
                                value="{{ old('title') }}" required autofocus>
                        </div>
                        <div class="mb-3">
                            <input type="hidden" class="form-control" id="slug_create" name="slug" required>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Input gambar</label><span style="margin-left: 1px;color: red">*</span>
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                            <input class="form-control" type="file" id="image" name="image"
                                onchange="previewImage()">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label><span style="margin-left: 1px;color: red">*</span>
                            <textarea class="form-control bg-white" id="description" name="description" aria-label="With textarea"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Tambah Berita</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Edit Berita -->
    <div class="modal fade" id="staticBackdrop" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-white">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-black" id="exampleModal2Label">Edit Berita</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="form_update" class="mb-5" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="edit_berita_id">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label><span style="margin-left: 1px;color: red">*</span>
                            <input type="text" class="form-control" id="edit_title" name="title" required autofocus>
                        </div>
                        <div class="mb-3">
                            <input type="hidden" class="form-control bg-white @error('slug') is-invalid @enderror"
                                id="edit_slug" name="slug" required>
                        </div>
                        <img id="image-old" width="100px" height="100px" alt="old-image">
                        <div class="mb-3">
                            <label for="image" class="form-label text-black">Input gambar</label><span style="margin-left: 1px;color: red">*</span>
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                            <input class="form-control bg-white @error('image') is-invalid @enderror" type="file"
                                id="edit_image" name="image" onchange="previewImage()">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label text-black">Description</label><span style="margin-left: 1px;color: red">*</span>
                            <textarea class="form-control bg-white" id="edit_description" name="description" aria-label="With textarea"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Edit Berita</button>
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
            $(document).on('submit', '#form_store', function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "{{ route('dashboard.berita.store') }}",
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

            $(document).on('click', '.edit-berita', function(e) {
                e.preventDefault();
                var berita_id = $(this).val();
                $('#edit_berita_id').val(berita_id);
                $('#staticBackdrop').modal('show');
                $.ajax({
                    type: "GET",
                    url: "{{ route('dashboard.berita.edit', ':id') }}".replace(':id', berita_id),
                    success: function(response) {
                        if (response.status === 200) {
                            $('#edit_title').val(response.berita.title);
                            $('#edit_slug').val(response.berita.slug);
                            $('#edit_description').val(response.berita.description);
                            $('#image-old').attr('src', '/storage/berita-images/' + response
                                .berita.image);
                        } else {

                        }
                    }
                })
            });

            $(document).on('submit', '#form_update', function(e) {
                e.preventDefault();
                var berita_id = $('#edit_berita_id').val();
                $.ajax({
                    type: "POST",
                    url: "{{ route('dashboard.berita.update', ':id') }}".replace(':id', berita_id),
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
                Swal.fire({
                    title: "Anda yakin?",
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#432D77",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, Hapus!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        setTimeout(function() {
                            Swal.fire({
                                title: "Terhapus!",
                                text: "Data Berhasil dihapus!",
                                icon: "success"
                            });

                            // Submit the form
                            $(e.target).closest('form').submit();

                            // Reload the page after the form is submitted
                            setTimeout(function() {
                                location.reload();
                            }, 1000);
                        });
                    }
                });
            })

            $(document).ready(function() {
                $('#title_create').on('input', function() {
                    $('#slug_create').val(
                        $('#title_create').val()
                        .toLowerCase()
                        .replace(/\s+/g, '-')
                        .replace(/[^\w\-]+/g, '')
                        .replace(/\-\-+/g, '-')
                        .replace(/^-+/, '')
                        .replace(/-+$/, '')
                    );
                });
            });
            $(document).ready(function() {
                $('#edit_title').on('input', function() {
                    $('#edit_slug').val(
                        $('#edit_title').val()
                        .toLowerCase()
                        .replace(/\s+/g, '-')
                        .replace(/[^\w\-]+/g, '')
                        .replace(/\-\-+/g, '-')
                        .replace(/^-+/, '')
                        .replace(/-+$/, '')
                    );
                });
            });
        })

        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
