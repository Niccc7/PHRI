@extends('template.main')
@section('content')
    @push('style')
        <link rel="stylesheet" href="{{ asset('assets/css/kemitraan.css') }}">
    @endpush
    @include('navbar')
    <div class="midlle">
        <div class="judul">
            <h1 style="font-size: 65px;text-shadow: 0px 10px 8px #8f8f8f; font-weight: bold;">Kemitraan</h1>
        </div>
        <div class="judulkecil">
            <h1 style="font-size: 36px;">Penawaran yang dapat kami berikan</h1>
        </div>
    </div>
    <div class="card">
        <div class="card1">
            <div class="card2">
                <div class="gambar">
                    <img src="{{ asset('assets/img/kemitraan/supply.png') }}" alt="">
                </div>
            </div>
            <h4>Supply bahan makanan</h4>
        </div>
        <div class="card1">
            <div class="card2">
                <div class="gambar">
                    <img src="{{ asset('assets/img/kemitraan/listrik.png') }}" alt="">
                </div>
            </div>
            <h4>Service Listrik</h4>
        </div>
        <div class="card1">
            <div class="card2">
                <div class="gambar">
                    <img src="{{ asset('assets/img/kemitraan/cleaning.png') }}" alt="">
                </div>
            </div>
            <h4>leaning Service</h4>
        </div>
        <div class="card1">
            <div class="card2">
                <div class="gambar">
                    <img src="{{ asset('assets/img/kemitraan/dapur.png') }}" alt="">
                </div>
            </div>
            <h4>Bagian Dapur</h4>
        </div>
        <div class="card1">
            <div class="card2">
                <div class="gambar">
                    <img src="{{ asset('assets/img/kemitraan/finance.png') }}" alt="">
                </div>
            </div>
            <h4>Finance</h4>
        </div>
        <div class="card1">
            <div class="card2">
                <div class="gambar">
                    <img src="{{ asset('assets/img/kemitraan/security.png') }}" alt="">
                </div>
            </div>
            <h4>Security</h4>
        </div>
    </div>
    </div>
    </div>

    <div class="box1">
        <h3>Penawaran Kerjasama</h3>
        <div class="box">
            <form id="form_store" method="POST">
                @csrf
                <div class="input-group">
                    <label for="nama">Nama PIC <span style="margin-left: 1px;color: red">*</span></label>
                    <input type="text" name="nama_pic" id="nama" placeholder="Nama" />
                </div>
                <div class="input-group">
                    <label for="nama">Jenis Usaha <span style="margin-left: 1px;color: red">*</span></label>
                    <select name="jenis_usaha_id" style="border-radius: 5px;">
                        <option hidden>silahkan pilih</option>
                        @foreach ($jenis_usaha as $jenis)
                            <option value="{{ $jenis->id }}">{{ $jenis->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group">
                    <label for="nomor-handphone">Nomor Handphone <span style="margin-left: 1px;color: red">*</span></label>
                    <div class="input-handphone">
                        <input type="number" placeholder="823234567241" id="nomor-handphone" name="no_hp" />
                        <span class="region-number">+62</span>
                    </div>
                </div>
                <div class="input-group">
                    <label for="email">Email <span style="margin-left: 1px;color: red">*</span></label>
                    <input type="email" id="email" name="email" placeholder="example@gmail.com" />
                </div>
                <div class="input-group">
                    <label for="nama_perusahaan">Nama Perusahaan <span style="margin-left: 1px;color: red">*</span></label>
                    <input type="text" id="nama_perusahaan" name="nama_perusahaan" placeholder="Perusahaan" />
                </div>
                <div class="input-group">
                    <label for="jenis_kerjasama" style="margin-top:-12px;">Jenis Kerjasama <span
                            style="margin-left: 1px;color: red">*</span></label>
                    <textarea type="text" id="jenis_kerjasama" name="jenis_kerjasama" placeholder="Kerjasama"
                        style="margin-top:-12px; border-radius: 5px;"></textarea>
                </div>
                <div class="button">
                    <button type="button" class="refresh"><i class="fa-solid fa-arrows-rotate refresh-btn"></i> Reset</button>
                    <button type="submit" class="kirim"><i class="fa fa-paper-plane" aria-hidden="true"></i>
                        Kirim</button>
                </div>
            </form>
        </div>
        <img src="{{ asset('assets/img/kemitraan/tangan.png') }}" alt="">
    </div>
    @push('style')
        <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}">
    @endpush
    @include('footer')
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
                    url: "/kemitraan-store",
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
        })

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
                    const select = document.querySelector('form select');

                    // Iterate over each input element and reset its value
                    inputs.forEach(input => {
                        input.value = '';
                    });

                    // Reset the value of the textarea
                    textarea.value = '';

                    // Reset the selected option of the select element
                    select.selectedIndex = 0;
                }
            });
        }

        // Call the function when the "Kosongkan" button is clicked
        document.querySelector('button.refresh').addEventListener('click', () => {
            resetForm();
        });
    </script>
@endsection
