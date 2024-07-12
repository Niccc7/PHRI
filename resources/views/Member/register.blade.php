@extends('template.main')
@section('content')
    @push('style')
        <link rel="stylesheet" href="{{ asset('assets/css/register-member.css') }}">
    @endpush
    <div class="mega-container">
        <img id="kuning" src="{{ asset('assets/img/kuning.png') }}" alt="" />
        <img id="ungu" src="{{ asset('assets/img/ungu.png') }}" alt="" />
        <img id="phri-logo" src="{{ asset('assets/img/Logo.png') }}" alt="PHRI Logo">
        <div class="container">
            <h1>Pendaftaran</h1>
            <div class="box">
                <form id="form_store" method="POST">
                    @csrf
                    <div class="input-group">
                        <label for="name">Name<span style="color: red">*</span></label>
                        <input type="text" name="name" id="name" placeholder="masukkan Name" required />
                    </div>
                    <div class="input-group">
                        <label for="email">Email<span style="color: red">*</span></label>
                        <input type="email" id="email" name="email" placeholder="example@email.com" required />
                    </div>
                    <div class="input-group">
                        <label for="nohp">Nomor Handphone<span style="color: red">*</span></label>
                        <div class="input-handphone">
                            <input type="number" placeholder="823xxxxxx" id="nomor-handphone" name="no_hp" required />
                            <span class="region-number">+62</span>
                        </div>
                    </div>
                    <div class="input-group">
                        <label for="password">Password<span style="color: red">*</span></label>
                        <input type="password" name="password" id="password" required />
                    </div>
                    <div class="input-group">
                        <label for="confirmpassword">Confirm Password<span style="color: red">*</span></label>
                        <input type="password" name="password_confirmation" required />
                    </div>
                    <div class="input-group">
                        <label for="jenis-usaha">Jenis Usaha<span style="color: red">*</span></label>
                        <select name="jenis_usaha_id" style="border-radius: 4px;">
                            <option hidden>silahkan pilih</option>
                            @foreach ($jenis_usaha as $jenis)
                                <option value="{{ $jenis->id }}">{{ $jenis->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group">
                        <label>Klasifikasi Usaha<span style="color: red">*</span></label>
                        <select name="klasifikasi_usaha_id" style="border-radius: 4px;">
                            <option hidden>silahkan pilih</option>
                            @foreach ($klasifikasi_usaha as $klasifikasi)
                                <option value="{{ $klasifikasi->id }}">{{ $klasifikasi->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group">
                        <label for="nama-usaha">Nama Usaha<span style="color: red">*</span></label>
                        <input type="text" id="nama_usaha" name="nama_usaha" placeholder="Hotel ... / Resto ...."
                            required />
                    </div>
                    <div class="input-group">
                        <label>Rating Usaha<span style="color: red">*</span></label>
                        <div class="input-radio">
                            <div class="">
                                <input type="radio" name="rating_usaha" value="0" class="form-radio" />
                                <label for="ratingusaha">-</label>
                            </div>
                            <div class="">
                                <input type="radio" name="rating_usaha" value="1" />
                                <label for="ratingusaha">1</label>
                            </div>
                            <div class="">
                                <input type="radio" name="rating_usaha" value="2" />
                                <label for="ratingusaha">2</label>
                            </div>
                            <div class="">
                                <input type="radio" name="rating_usaha" value="3" />
                                <label for="ratingusaha">3</label>
                            </div>
                            <div class="">
                                <input type="radio" name="rating_usaha" value="4" />
                                <label for="ratingusaha">4</label>
                            </div>
                            <div class="">
                                <input type="radio" name="rating_usaha" value="5" />
                                <label for="ratingusaha">5</label>
                            </div>
                        </div>
                    </div>
                    <div class="input-group">
                        <label for="alamat">Alamat<span style="color: red">*</span></label>
                        <textarea name="alamat" id="alamat" cols="20" rows="10"
                            placeholder="jl. ............,city, province, nation" style="border-radius: 4px;" required></textarea>
                    </div>
                    <div class="button">
                        <button type="button" class="kosong"><i class="fa-solid fa-rotate-right"></i>Kosongkan</button>
                        <button type="submit" class="register"> Register </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="Logo">
        <h5>Sosial Media</h5>
        <a class="bi bi-instagram"></a>
        <a class="bi bi-facebook"></a>
        <a class="bi bi-twitter"></a>
        <a class="bi bi-youtube"></a>
        <a class="bi bi-tiktok"></a>
        <h4>@ PHRI Provinsi Kalimantan Barat</h4>
    </div>
    <div class="Copyright">
        <h5 style="font-size: 16px;">Copyright. PT. Kita Serba Digital - 2024</h5>
    </div>
@endsection
@section('script')
    <script>
        $(function() {
            $(document).on('submit', '#form_store', function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "{{ route('register.member.proses') }}",
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
                                window.location.href='{{ route('login') }}';
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
        });

        function resetForm() {
            swal.fire({
                title: 'Kamu Yakin?',
                text: 'Aksi ini akan menghilangkan semua yang telah anda input',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Iya, Reset',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Get all input elements in the form
                    const inputs = document.querySelectorAll('form input');
                    const textarea = document.querySelector('form textarea');
                    const selects = document.querySelectorAll('form select');
                    const radios = document.querySelectorAll('form input[type="radio"]');

                    // Iterate over each input element and reset its value
                    inputs.forEach(input => {
                        input.value = '';
                    });

                    // Reset the value of the textarea
                    textarea.value = '';

                    // Reset the selected option of the select element
                    selects.forEach(select => {
                        select.selectedIndex = 0;
                    });

                    // Check the first radio button in each group
                    radios.forEach(radio => {
                        radio.checked = false;
                    });
                }
            });
        }

        // pas klik kosong
        document.querySelector('button.kosong').addEventListener('click', () => {
            resetForm();
        });
    </script>
@endsection
