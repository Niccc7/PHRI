@extends('template.main')
@section('content')
    @push('style')
        <link rel="stylesheet" href="{{ asset('assets/css/informasi.css') }}">
    @endpush
    @include('navbar')
    <div class="judul">
        <h1 style="color: #432D77; ">Informasi</h1>
        <h3>Tentang Kami</h3>
        <h2 style="font-weight:bold;">Keuntungan yang didapatkan</h2>
    </div>

    <div class="isi">
        <div class="container1">
            <div class="img">
                <img src="{{ asset('assets/img/informasi/panic.png') }}" alt="" height="80%" width="40%"
                    style="margin-left: 10px;">
            </div>
            <div class="text">
                <h5 style="color: #432D77; font-weight:900; font-size: 18px;">{{ $benefit[0]->name }}</h5>
                <p>berguna sebagai button untuk memanggil bantuan jika dibutuhkan</p>
                @auth('member')    
                    <button type="button" data-modal-target="default-modal" data-modal-toggle="default-modal" value="{{ $benefit[0]->id }}" class="form-btn" style="background: #432D77; color: #cbcbcb; padding: 4px; width: 80px; border-radius: 5px; position: relative; left: 100px">Laporan</button>
                @endauth
            </div>
        </div>
        <div class="container2">
            <div class="img">
                <img src="{{ asset('assets/img/informasi/hukum.png') }}" alt="" height="80%" width="40%"
                    style="margin-left: 10px;">
            </div>
            <div class="text">
                <h5 style="color: #432D77; font-weight:900; font-size: 18px;">{{ $benefit[1]->name }}</h5>
                <p>berguna sebagai button untuk memanggil bantuan jika dibutuhkan</p>
                @auth('member')
                    <button data-modal-target="modal2" data-modal-toggle="modal2" value="{{ $benefit[1]->id }}" class="form-btn" style="background: #432D77; color: #cbcbcb; padding: 4px; width: 80px; border-radius: 5px; position: relative; left: 100px">Laporan</button>
                @endauth
            </div>
        </div>
        <div class="container3">
            <div class="img">
                <img src="{{ asset('assets/img/informasi/halal.png') }}" alt="" height="80%" width="40%"
                    style="margin-left: 10px;">
            </div>
            <div class="text">
                <h5 style="color: #432D77; font-weight:900; font-size: 18px;">{{ $benefit[3]->name }}</h5>
                <p>berguna sebagai button untuk memanggil bantuan jika dibutuhkan</p>
                @auth('member')
                    <button data-modal-target="modal3" data-modal-toggle="modal3" value="{{ $benefit[3]->id }}" class="form-btn" style="background: #432D77; color: #cbcbcb; padding: 4px; width: 80px; border-radius: 5px; position: relative; left: 100px">Laporan</button>
                @endauth
                </div>
        </div>
        <div class="container4">
            <div class="img">
                <img src="{{ asset('assets/img/informasi/suplier.png') }}" alt="" height="80%" width="40%"
                    style="margin-left: 10px;">
            </div>
            <div class="text">
                <h5 style="color: #432D77; font-weight:900; font-size: 18px;">{{ $benefit[4]->name }}</h5>
                <p>berguna sebagai button untuk memanggil bantuan jika dibutuhkan</p>
                @auth('member')
                    <button data-modal-target="modal4" data-modal-toggle="modal4" value="{{ $benefit[4]->id }}" class="form-btn" style="background: #432D77; color: #cbcbcb; padding: 4px; width: 80px; border-radius: 5px; position: relative; left: 100px">Laporan</button>
                @endauth
                </div>
        </div>
        <div class="container5">
            <div class="img">
                <img src="{{ asset('assets/img/informasi/design.png') }}" alt="" height="80%" width="40%"
                    style="margin-left: 10px;">
            </div>
            <div class="text">
                <h5 style="color: #432D77; font-weight:900; font-size: 18px;">{{ $benefit[5]->name }}</h5>
                <p>berguna sebagai button untuk memanggil bantuan jika dibutuhkan</p>
                @auth('member')
                    <button data-modal-target="modal5" data-modal-toggle="modal5" value="{{ $benefit[5]->id }}" class="form-btn"    style="background: #432D77; color: #cbcbcb; padding: 4px; width: 80px; border-radius: 5px; position: relative; left: 100px">Laporan</button>
                @endauth
            </div>
        </div>
        <div class="container6">
            <div class="img">
                <img src="{{ asset('assets/img/informasi/truk.png') }}" alt="" height="80%" width="40%"
                    style="margin-left: 10px;">
            </div>
            <div class="text">
                <h5 style="color: #432D77; font-weight:900; font-size: 18px;">{{ $benefit[6]->name }}</h5>
                <p>berguna sebagai button untuk memanggil bantuan jika dibutuhkan</p>
                @auth('member')
                    <button data-modal-target="modal6" data-modal-toggle="modal6" type="button" value="{{ $benefit[6]->id }}" data-bs-toggle="modal" data-bs-target="#exampleModal" class="form-btn" style="background: #432D77; color: #cbcbcb; padding: 4px; width: 80px; border-radius: 5px; position: relative; left: 100px">Laporan</button>
                @endauth
            </div>
        </div>
        <div class="container7">
            <div class="img">
                <img src="{{ asset('assets/img/informasi/ide.png') }}" alt="" height="80%" width="40%"
                    style="margin-left: 10px;">
            </div>
            <div class="text">
                <h5 style="color: #432D77; font-weight:900; font-size: 18px;">{{ $benefit[2]->name }}</h5>
                <p>berguna sebagai button untuk memanggil bantuan jika dibutuhkan</p>
                @auth('member')
                    <button data-modal-target="modal7" data-modal-toggle="modal7" value="{{ $benefit[2]->id }}" class="form-btn" style="background: #432D77; color: #cbcbcb; padding: 4px; width: 80px; border-radius: 5px; position: relative; left: 100px">Laporan</button>
                @endauth
            </div>
        </div>
        <div class="container8">
            <div class="img">
                <img src="{{ asset('assets/img/informasi/perbankan.png') }}" alt="" height="80%"
                    width="40%" style="margin-left: 10px;">
            </div>
            <div class="text">
                <h5 style="color: #432D77; font-weight:900; font-size: 18px;">{{ $benefit[8]->name }}</h5>
                <p>berguna sebagai button untuk memanggil bantuan jika dibutuhkan</p>
                @auth('member')
                    <button data-modal-target="modal8" data-modal-toggle="modal8" value="{{ $benefit[8]->id }}" class="form-btn" style="background: #432D77; color: #cbcbcb; padding: 4px; width: 80px; border-radius: 5px; position: relative; left: 100px">Laporan</button>
                @endauth
            </div>
        </div>
        <div class="container9">
            <div class="img">
                <img src="{{ asset('assets/img/informasi/oss.png') }}" alt="" height="60%" width="40%"
                    style="margin-left: 10px;">
            </div>
            <div class="text">
                <h5 style="color: #432D77; font-weight:900; font-size: 18px;">{{ $benefit[7]->name }}</h5>
                <p>berguna sebagai button untuk memanggil bantuan jika dibutuhkan</p>
                @auth('member')
                    <button data-modal-target="modal9" data-modal-toggle="modal9" value="{{ $benefit[7]->id }}" class="form-btn" style="background: #432D77; color: #cbcbcb; padding: 4px; width: 80px; border-radius: 5px; position: relative; left: 100px">Laporan</button>
                @endauth
            </div>
        </div>
    </div>
    <h3 class="daftar">Daftarkan Penawaran</h3>
    <div class="box1">
        <img src="{{ asset('assets/img/informasi/meet.png') }}" alt="">
        <div class="box">
            <form id="form_store" method="POST">
                @csrf
                <div class="bagi">
                    <div class="input-group">
                        <label for="nama_lengkap">Nama Lengkap <span style="margin-left: 1px;color: red">*</span></label>
                        <input type="text" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" />
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
                        <input type="email" id="email" name="email" placeholder="Example@gmail.com" />
                    </div>
                    <div class="input-group">
                        <label for="tanggal_lahir">Tanggal Lahir <span style="margin-left: 1px;color: red">*</span></label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" />
                    </div>
                </div>
                <div class="input-groups" style="margin-top:18px;">
                    <label>Foto KTP <span style="color: red">*</span></label>
                    <input class="block w-full mb-5 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="default_size" type="file" name="ktp">
                </div>
                <div class="input-group">
                    <label for="tempat_tinggal" style="margin-top: -20px;">Tempat Tinggal <span
                            style="margin-left: 1px;color: red">*</span></label>
                    <textarea name="tempat_tinggal" id="tempat_tinggal" placeholder="Alamat"
                        style="margin-top: -15px; border-radius: 5px;"></textarea>
                </div>
                <div class="input-group">
                    <label for="tawaran" style="margin-top: -4px;">Tawaran <span
                            style="margin-left: 1px;color: red">*</span></label>
                    <textarea type="text" id="tawaran" name="tawaran" placeholder="Tawaran"
                        style="margin-top: -10px; border-radius: 5px;"></textarea>
                </div>
                <div class="button">
                    <button type="button" class="refresh"><i class="fa-solid fa-arrows-rotate refresh-btn"></i>Reset</button>
                    <button type="submit" class="kirim"><i class="fa fa-paper-plane" aria-hidden="true"></i>
                        Kirim</button>
                </div>
            </form>
        </div>
    </div>
    @push('style')
        <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}">
    @endpush
    @include('footer')

    <!-- Modal Panic Button -->
    <div id="default-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Form Button Panic
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="default-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <form class="space-y-4" action="POST" id="pengaduan_store">
                        @csrf
                        <input type="hidden" name="benefit_id" value="{{ $benefit[0]->id }}">
                        <input type="hidden" name="member_id" value="">
                        <input type="hidden" name="nama_pelapor" id="nama_pelapor" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"/>
                        <div>
                            <label for="desc"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi<span style="margin-left: 1px;color: red">*</span></label>
                            <textarea name="desc" id="desc"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="jelaskan apa yang dibutuhkan" required></textarea>
                        </div>
                        <div class="flex justify-end py-4 md:py-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button data-modal-hide="default-modal" type="button"
                                class="py-2.5 px-5 mr-4 text-sm font-medium text-white focus:outline-none bg-red-500 rounded-lg border border-gray-200 hover:bg-white hover:text-black hover:border-red-600 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Batal</button>
                            <button type="submit"
                                class="text-white bg-purple-800 hover:bg-purple-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Bantuan Hukum -->
    <div id="modal2" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Form Bantuan Hukum
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="modal2">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <form class="space-y-4" action="POST" id="pengaduan_store">
                        @csrf
                        <input type="hidden" name="benefit_id" value="{{ $benefit[1]->id }}">
                        <input type="hidden" name="member_id" value="">
                        <input type="hidden" name="nama_pelapor" id="nama_pelapor" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"/>
                        <div>
                            <label for="desc"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi<span style="margin-left: 1px;color: red">*</span></label>
                            <textarea name="desc" id="desc"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="jelaskan apa yang dibutuhkan" required></textarea>
                        </div>
                        <div class="flex justify-end py-4 md:py-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button data-modal-hide="default-modal" type="button"
                                class="py-2.5 px-5 mr-4 text-sm font-medium text-white focus:outline-none bg-red-500 rounded-lg border border-gray-200 hover:bg-white hover:text-black hover:border-red-600 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Batal</button>
                            <button type="submit"
                                class="text-white bg-purple-800 hover:bg-purple-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Sertifikasi Halal -->
    <div id="modal3" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Form Sertifikasi Halal
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="modal3">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <form class="space-y-4" action="POST" id="pengaduan_store">
                        @csrf
                        <input type="hidden" name="benefit_id" value="{{ $benefit[3]->id }}">
                        <input type="hidden" name="member_id" value="">
                        <input type="hidden" name="nama_pelapor" id="nama_pelapor" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"/>
                        <div>
                            <label for="desc"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi<span style="margin-left: 1px;color: red">*</span></label>
                            <textarea name="desc" id="desc"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="jelaskan apa yang dibutuhkan" required></textarea>
                        </div>
                        <div class="flex justify-end py-4 md:py-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button data-modal-hide="default-modal" type="button"
                                class="py-2.5 px-5 mr-4 text-sm font-medium text-white focus:outline-none bg-red-500 rounded-lg border border-gray-200 hover:bg-white hover:text-black hover:border-red-600 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Batal</button>
                            <button type="submit"
                                class="text-white bg-purple-800 hover:bg-purple-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Supplier -->
    <div id="modal4" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Form Supplier
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="modal4">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <form class="space-y-4" action="POST" id="pengaduan_store">
                        @csrf
                        <input type="hidden" name="benefit_id" value="{{ $benefit[4]->id }}">
                        <input type="hidden" name="member_id" value="">
                        <input type="hidden" name="nama_pelapor" id="nama_pelapor" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"/>
                        <div>
                            <label for="desc"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi<span style="margin-left: 1px;color: red">*</span></label>
                            <textarea name="desc" id="desc"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="jelaskan apa yang dibutuhkan" required></textarea>
                        </div>
                        <div class="flex justify-end py-4 md:py-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button data-modal-hide="default-modal" type="button"
                                class="py-2.5 px-5 mr-4 text-sm font-medium text-white focus:outline-none bg-red-500 rounded-lg border border-gray-200 hover:bg-white hover:text-black hover:border-red-600 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Batal</button>
                            <button type="submit"
                                class="text-white bg-purple-800 hover:bg-purple-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Design Interior -->
    <div id="modal5" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Form Design Interior
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="modal5">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <form class="space-y-4" action="POST" id="pengaduan_store">
                        @csrf
                        <input type="hidden" name="benefit_id" value="{{ $benefit[5]->id }}">
                        <input type="hidden" name="member_id" value="">
                        <input type="hidden" name="nama_pelapor" id="nama_pelapor" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"/>
                        <div>
                            <label for="desc"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi<span style="margin-left: 1px;color: red">*</span></label>
                            <textarea name="desc" id="desc"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="jelaskan apa yang dibutuhkan" required></textarea>
                        </div>
                        <div class="flex justify-end py-4 md:py-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button data-modal-hide="default-modal" type="button"
                                class="py-2.5 px-5 mr-4 text-sm font-medium text-white focus:outline-none bg-red-500 rounded-lg border border-gray-200 hover:bg-white hover:text-black hover:border-red-600 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Batal</button>
                            <button type="submit"
                                class="text-white bg-purple-800 hover:bg-purple-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kirim</button>
                        </div>    
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Diskon Pengiriman -->
    <div id="modal6" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Form Diskon Pengiriman
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="modal6">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <form class="space-y-4" action="POST" id="pengaduan_store">
                        @csrf
                        <input type="hidden" name="benefit_id" value="{{ $benefit[6]->id }}">
                        <input type="hidden" name="member_id" value="">
                        <input type="hidden" name="nama_pelapor" id="nama_pelapor" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"/>
                        <div>
                            <label for="desc"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi<span style="margin-left: 1px;color: red">*</span></label>
                            <textarea name="desc" id="desc"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="jelaskan apa yang dibutuhkan" required></textarea>
                        </div>
                        <div class="flex justify-end py-4 md:py-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button data-modal-hide="default-modal" type="button"
                                class="py-2.5 px-5 mr-4 text-sm font-medium text-white focus:outline-none bg-red-500 rounded-lg border border-gray-200 hover:bg-white hover:text-black hover:border-red-600 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Batal</button>
                            <button type="submit"
                                class="text-white bg-purple-800 hover:bg-purple-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Bantuan Kelistrikan -->
    <div id="modal7" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Form Bantuan Kelistrikan
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="modal7">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <form class="space-y-4" action="POST" id="pengaduan_store">
                        @csrf
                        <input type="hidden" name="benefit_id" value="{{ $benefit[2]->id }}">
                        <input type="hidden" name="member_id" value="">
                        <input type="hidden" name="nama_pelapor" id="nama_pelapor" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"/>
                        <div>
                            <label for="desc"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi<span style="margin-left: 1px;color: red">*</span></label>
                            <textarea name="desc" id="desc"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="jelaskan apa yang dibutuhkan" required></textarea>
                        </div>
                        <div class="flex justify-end py-4 md:py-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button data-modal-hide="default-modal" type="button"
                                class="py-2.5 px-5 mr-4 text-sm font-medium text-white focus:outline-none bg-red-500 rounded-lg border border-gray-200 hover:bg-white hover:text-black hover:border-red-600 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Batal</button>
                            <button type="submit"
                                class="text-white bg-purple-800 hover:bg-purple-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Konsultan Bank -->
    <div id="modal8" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Form Konsultan Perbankan
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="modal8">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <form class="space-y-4" action="POST" id="pengaduan_store">
                        @csrf
                        <input type="hidden" name="benefit_id" value="{{ $benefit[8]->id }}">
                        <input type="hidden" name="member_id" value="">
                        <input type="hidden" name="nama_pelapor" id="nama_pelapor" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"/>
                        <div>
                            <label for="desc"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi<span style="margin-left: 1px;color: red">*</span></label>
                            <textarea name="desc" id="desc"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="jelaskan apa yang dibutuhkan" required></textarea>
                        </div>
                        <div class="flex justify-end py-4 md:py-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button data-modal-hide="default-modal" type="button"
                                class="py-2.5 px-5 mr-4 text-sm font-medium text-white focus:outline-none bg-red-500 rounded-lg border border-gray-200 hover:bg-white hover:text-black hover:border-red-600 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Batal</button>
                            <button type="submit"
                                class="text-white bg-purple-800 hover:bg-purple-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Bantuan Kelistrikan -->
    <div id="modal9" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Form Bantuan Perizinan OSS
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="modal9">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <form class="space-y-4" action="POST" id="pengaduan_store">
                        @csrf
                        <input type="hidden" name="benefit_id" value="{{ $benefit[7]->id }}">
                        <input type="hidden" name="member_id" value="">
                        <input type="hidden" name="nama_pelapor" id="nama_pelapor" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"/>
                        <div>
                            <label for="desc"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi<span style="margin-left: 1px;color: red">*</span></label>
                            <textarea name="desc" id="desc"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="jelaskan apa yang dibutuhkan" required></textarea>
                        </div>
                        <div class="flex justify-end py-4 md:py-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button data-modal-hide="default-modal" type="button"
                                class="py-2.5 px-5 mr-4 text-sm font-medium text-white focus:outline-none bg-red-500 rounded-lg border border-gray-200 hover:bg-white hover:text-black hover:border-red-600 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Batal</button>
                            <button type="submit"
                                class="text-white bg-purple-800 hover:bg-purple-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kirim</button>
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
            $(document).on('submit', '#pengaduan_store', function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "{{ route('pengaduan.store') }}",
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

            $(document).on('submit', '#form_store', function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "{{ route('penawaran.store') }}",
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
                    const textareas = document.querySelectorAll('form textarea'); // Get all textarea elements

                    // Iterate over each input element and reset its value
                    inputs.forEach(input => {
                        input.value = '';
                    });

                    // Iterate over each textarea element and reset its value
                    textareas.forEach(textarea => {
                        textarea.value = '';
                    });
                }
            });
        }

        // Call the function when the "Kosongkan" button is clicked
        document.querySelector('button.refresh').addEventListener('click', () => {
            resetForm();
        });
    </script>
@endsection
