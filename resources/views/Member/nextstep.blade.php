@extends('dashboard-member.layouts.main')
@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Pengisian Data Lengkap Member</h3>
            </div>
        </div>
    </div>
    @if ($member->klasifikasi_usaha_id === 1)
        <form id="form_store" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="member_id" value="{{ $member->id }}">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div id="basic-pills-wizard" class="twitter-bs-wizard">
                                <ul class="twitter-bs-wizard-nav">
                                    <li class="nav-item">
                                        <a href="#informasi" class="nav-link" data-toggle="tab">
                                            <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Informasi">
                                                <i class="fa-solid fa-1"></i>

                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#pic" class="nav-link" data-toggle="tab">
                                            <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="PIC">
                                                <i class="fa-solid fa-2"></i>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#legalisasi" class="nav-link" data-toggle="tab">
                                            <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Legalisasi">
                                                <i class="fa-solid fa-3"></i>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#ruangan" class="nav-link" data-toggle="tab">
                                            <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Ruangan">
                                                <i class="fa-solid fa-4"></i>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#meeting" class="nav-link" data-toggle="tab">
                                            <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Meeting">
                                                <i class="fa-solid fa-5"></i>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#karyawan" class="nav-link" data-toggle="tab">
                                            <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Karyawan">
                                                <i class="fa-solid fa-6"></i>
                                            </div>
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content twitter-bs-wizard-tab-content">
                                    <div class="tab-pane" id="informasi">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">klasifikasi
                                                        Usaha</label>
                                                    <select class="form-select">
                                                        @foreach ($jenis as $j)
                                                            @if (old('jenis_usaha_id', $member->jenis_usaha_id) == $j->id)
                                                                <option value="{{ $j->id }}" selected disabled>
                                                                    {{ $j->name }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Klasifikasi
                                                        Usaha</label>
                                                    <select class="form-select">
                                                        @foreach ($klasifikasi as $k)
                                                            @if (old('klasifikasi_usaha_id', $member->klasifikasi_usaha_id) == $k->id)
                                                                <option value="{{ $k->id }}" selected disabled>
                                                                    {{ $k->name }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Nama
                                                        Usaha<span style="margin-left: 1px;color: red">*</span></label>
                                                    <input type="text" id="nama_usaha" name="nama_usaha"
                                                        class="form-control" value="{{ $member->nama_usaha }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Rating
                                                        Usaha<span style="margin-left: 1px;color: red">*</span></label>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="rating_usaha" value="1"
                                                                {{ old('rating_usaha', $member->rating_usaha) == '1' ? 'checked' : '' }}>
                                                            1
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="rating_usaha" value="2"
                                                                {{ old('rating_usaha', $member->rating_usaha) == '2' ? 'checked' : '' }}>
                                                            2
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="rating_usaha" value="3"
                                                                {{ old('rating_usaha', $member->rating_usaha) == '3' ? 'checked' : '' }}>
                                                            3
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="rating_usaha" value="4"
                                                                {{ old('rating_usaha', $member->rating_usaha) == '4' ? 'checked' : '' }}>
                                                            4
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="rating_usaha" value="5"
                                                                {{ old('rating_usaha', $member->rating_usaha) == '5' ? 'checked' : '' }}>
                                                            5
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-16">
                                                <label class="form-label">Alamat<span
                                                        style="margin-left: 1px;color: red">*</span></label>
                                                <textarea rows="5" class="form-control" placeholder="Enter text here" name="alamat">{{ old('alamat', $member->alamat ?? '') }}</textarea>
                                            </div>
                                        </div>
                                        <ul class="pager wizard twitter-bs-wizard-pager-link">
                                            <li class="previous"><a href="{{ route('dashboard-member.index') }}"
                                                    class="btn btn-secondary"><i class="bx bx-chevron-left me-1"></i>
                                                    Kembali</a>
                                            </li>
                                            <button style="margin-left:845px;" onclick="resetFormPage('1'); return false;" class="btn btn-danger" type="button">Kosongkan</button>
                                            <li class="next">
                                                <a id="next-tab-btn" class="btn btn-primary">Selanjutnya 
                                                    <i class="fa-solid fa-arrow-right"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="tab-pane" id="pic">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Nama
                                                        Pemilik<span style="margin-left: 1px;color: red">*</span></label>
                                                    <input type="text" id="nama_pemilik" name="nama_pemilik"
                                                        class="form-control" value="{{ $member->name }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="basicpill-firstname-input" class="form-label">Jabatan<span
                                                            style="margin-left: 1px;color: red">*</span></label>
                                                    <input type="text" id="jabatan" name="jabatan"
                                                        class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Nomor
                                                        Indentitas<span
                                                            style="margin-left: 1px;color: red">*</span></label>
                                                    <input type="text" id="no_identitas_pemilik"
                                                        name="no_identitas_pemilik" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Nomor
                                                        Handphone<span style="margin-left: 1px;color: red">*</span></label>
                                                    <input type="number" id="no_hp_pemilik" name="no_hp_pemilik"
                                                        class="form-control" value="{{ $member->no_hp }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Email<span
                                                            style="margin-left: 1px;color: red">*</span></label>
                                                    <input type="email" id="email_pemilik" name="email_pemilik"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Nama
                                                        PIC<span style="margin-left: 1px;color: red">*</span></label>
                                                    <input type="text" id="nama_pic" name="nama_pic"
                                                        class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Jabatan
                                                        PIC<span style="margin-left: 1px;color: red">*</span></label>
                                                    <input type="text" id="jabatan_pic" name="jabatan_pic"
                                                        class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Nomor
                                                        Indentitas
                                                        PIC<span style="margin-left: 1px;color: red">*</span></label>
                                                    <input type="text" id="no_identitas_pic" name="no_identitas_pic"
                                                        class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Nomor
                                                        Handphone
                                                        PIC<span style="margin-left: 1px;color: red">*</span></label>
                                                    <input type="number" id="no_hp_pic" name="no_hp_pic"
                                                        class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Email
                                                        PIC<span style="margin-left: 1px;color: red">*</span></label>
                                                    <input type="email" id="email_pic" name="email_pic"
                                                        class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="pager wizard twitter-bs-wizard-pager-link">
                                            <li class="previous">
                                                <a id="prev-tab-btn" class="btn btn-secondary"><i class="bx bx-chevron-left me-1"></i> Kembali</a>
                                            </li>
                                            <button style="margin-left:840px;" onclick="resetFormPage('2'); return false;" class="btn btn-danger" type="button">Kosongkan</button>
                                            <li class="next">
                                                <a id="next-tab-btn" class="btn btn-primary">Selanjutnya <i class="fa-solid fa-arrow-right"></i></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="tab-pane" id="legalisasi">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Nama Badan
                                                        Hukum
                                                        Perusahaan<span
                                                            style="margin-left: 1px;color: red">*</span></label>
                                                    <input type="text" id="nama_badan_hukum_perusahaan"
                                                        name="nama_badan_hukum_perusahaan" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Nomor Induk
                                                        Berusaha
                                                        (NIB)</label>
                                                    <input type="text" id="nomor_induk_berusaha"
                                                        name="nomor_induk_berusaha" class="form-control"
                                                        placeholder="opsional">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <legend>Pilih Salah Satu<span style="margin-left: 1px;color: red">*</span></legend>
                                                <input type="checkbox" id="pilihan1" name="siu_perdagangan"
                                                    value="siu-perdagangan">
                                                <label for="pilihan1">No SIU Perdagangan</label>
                                                <input type="checkbox" id="pilihan2" name="siu_pariwisata"
                                                    value="siu-pariwisata">
                                                <label for="pilihan2">No SIU Pariwisata</label>
                                                <input type="checkbox" id="pilihan3" name="nomor_tdup"
                                                    value="nomor_tdup">
                                                <label for="pilihan3">NO TDUP</label>
                                                <div class="mb-3">
                                                    <input type="text" name="inputs" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">FIle<span
                                                            style="margin-left: 1px;color: red">*</span></label>
                                                    <input type="file" id="file" name="file"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Nomor Akte Pendirian Perusahaan<span
                                                            style="margin-left: 1px;color: red">*</span></label>
                                                    <input type="text" id="nomor_akte_pendirian_perusahaan"
                                                        name="nomor_akte_pendirian_perusahaan" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="pager wizard twitter-bs-wizard-pager-link">
                                            <li class="previous">
                                                <a id="prev-tab-btn" class="btn btn-secondary"><i
                                                        class="bx bx-chevron-left me-1"></i> Kembali</a>
                                            </li>
                                            <button style="margin-left:845px;" onclick="resetFormPage('3'); return false;" class="btn btn-danger" type="button">Kosongkan</button>
                                            <li class="next">
                                                <a id="next-tab-btn" class="btn btn-primary">Selanjutnya <i
                                                        class="fa-solid fa-arrow-right"></i></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="tab-pane" id="ruangan">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Jumlah
                                                        Kamar<span style="margin-left: 1px;color: red">*</span></label>
                                                    <input type="number" id="jumlah_kamar" name="total_jumlah_kamar"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Jumlah
                                                        Karyawan<span style="margin-left: 1px;color: red">*</span></label>
                                                    <input type="number" id="jumlah_karyawan"
                                                        name="total_jumlah_karyawan" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Ruang
                                                        Pertemuan<span style="margin-left: 1px;color: red">*</span></label>
                                                    <select name="ruang_pertemuan" class="form-select">
                                                        <option value="ya">Ya</option>
                                                        <option value="tidak">Tidak</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="d-flex flex-row-reverse">
                                                <div class="btn">
                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        id="removeButton"><i class="fa-solid fa-minus"></i></button>
                                                    <button type="button" class="btn btn-sm btn-primary"
                                                        id="addButton"><i class="fa-solid fa-plus"></i></button>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Tipe
                                                        Kamar<span style="margin-left: 1px;color: red">*</span></label>
                                                    <select name="tipe_kamar[]" class="form-select">
                                                        <option value="presidential">Presidential</option>
                                                        <option value="deluxe">Deluxe</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Nama
                                                        Kamar<span style="margin-left: 1px;color: red">*</span></label>
                                                    <input type="text" id="nama_kamar" name="nama_kamar[]"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Jumlah
                                                        Kamar<span style="margin-left: 1px;color: red">*</span></label>
                                                    <input type="number" id="jumlah" name="jumlah[]"
                                                        class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div id="dinamis">

                                        </div>
                                        <ul class="pager wizard twitter-bs-wizard-pager-link">
                                            <li class="previous">
                                                <a id="prev-tab-btn" class="btn btn-secondary"><i
                                                        class="bx bx-chevron-left me-1"></i> Kembali</a>
                                            </li>
                                            <button style="margin-left:845px;" onclick="resetFormPage('4'); return false;" class="btn btn-danger" type="button">Kosongkan</button>
                                            <li class="next">
                                                <a id="next-tab-btn" class="btn btn-primary">Selanjutnya <i
                                                        class="fa-solid fa-arrow-right"></i></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="tab-pane" id="meeting">
                                        <div class="row">
                                            <div class="d-flex flex-row-reverse">
                                                <div class="btn">
                                                    <button type="button" class="btn btn-sm btn-danger" id="minus"><i class="fa-solid fa-minus"></i></button>
                                                    <button type="button" class="btn btn-sm btn-primary"id="plus"><i class="fa-solid fa-plus"></i></button>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Nama Ruangan<span style="margin-left: 1px;color: red">*</span></label>
                                                    <input type="text" id="nama_ruangan" name="nama_ruangan[]"class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-firstname-input" class="form-label">Kapasitas Maksimal<span style="margin-left: 1px;color: red">*</span></label>
                                                    <input type="number" id="kapasitas_maksimal" name="kapasitas_maksimal[]" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div id="meetingplus">

                                        </div>
                                        <ul class="pager wizard twitter-bs-wizard-pager-link">
                                            <li class="previous">
                                                <a id="prev-tab-btn" class="btn btn-secondary"><i
                                                        class="bx bx-chevron-left me-1"></i> Kembali</a>
                                            </li>
                                            <button style="margin-left:845px;" onclick="resetFormPage('5'); return false;" class="btn btn-danger" type="button">Kosongkan</button>
                                            <li class="next">
                                                <a id="next-tab-btn" class="btn btn-primary">Selanjutnya <i
                                                        class="fa-solid fa-arrow-right"></i></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="tab-pane" id="karyawan">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-firstname-input" class="form-label">Jumlah
                                                        Karyawan
                                                        Tetap<span style="margin-left: 1px;color: red">*</span></label>
                                                    <input type="number" id="jumlah_karyawan_tetap"
                                                        name="jumlah_karyawan_tetap" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="basicpill-firstname-input" class="form-label">Jumlah
                                                        Karyawan
                                                        Kontrak<span style="margin-left: 1px;color: red">*</span></label>
                                                    <input type="number" id="jumlah_karyawan_kontrak"
                                                        name="jumlah_karyawan_kontrak" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-firstname-input" class="form-label">Jumlah
                                                        Karyawan
                                                        Harian<span style="margin-left: 1px;color: red">*</span></label>
                                                    <input type="number" id="jumlah_karyawan_harian"
                                                        name="jumlah_karyawan_harian" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="basicpill-firstname-input" class="form-label">Jumlah
                                                        Karyawan
                                                        Outsource<span style="margin-left: 1px;color: red">*</span></label>
                                                    <input type="number" id="jumlah_karyawan_outsource"
                                                        name="jumlah_karyawan_outsource" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="pager wizard twitter-bs-wizard-pager-link">
                                            <li class="previous">
                                                <a id="prev-tab-btn" class="btn btn-secondary"><i
                                                        class="bx bx-chevron-left me-1"></i> Kembali</a>
                                            </li>
                                            <button style="margin-left:860px;" onclick="resetFormPage('6'); return false;" class="btn btn-danger" type="button">Kosongkan</button>
                                            <li class="float-end">
                                                <button type="submit" class="btn btn-primary">Submit Data</button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @elseif($member->klasifikasi_usaha_id === 2)
        <form id="form_resto" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="member_id" value="{{ $member->id }}">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div id="basic-pills-wizard" class="twitter-bs-wizard">
                                <ul class="twitter-bs-wizard-nav">
                                    <li class="nav-item">
                                        <a href="#informasi" class="nav-link" data-toggle="tab">
                                            <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Informasi">
                                                <i class="fa-solid fa-1"></i>

                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#pic" class="nav-link" data-toggle="tab">
                                            <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="PIC">
                                                <i class="fa-solid fa-2"></i>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#legalisasi" class="nav-link" data-toggle="tab">
                                            <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Legalisasi">
                                                <i class="fa-solid fa-3"></i>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#karyawan" class="nav-link" data-toggle="tab">
                                            <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Karyawan">
                                                <i class="fa-solid fa-4"></i>
                                            </div>
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content twitter-bs-wizard-tab-content">
                                    <div class="tab-pane" id="informasi">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-firstname-input" class="form-label">Jenis
                                                        Usaha</label>
                                                    <select class="form-select">
                                                        @foreach ($jenis as $j)
                                                            @if (old('jenis_usaha_id', $member->jenis_usaha_id) == $j->id)
                                                                <option value="{{ $j->id }}" selected disabled>
                                                                    {{ $j->name }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-firstname-input" class="form-label">Klasifikasi
                                                        Usaha</label>
                                                    <select class="form-select">
                                                        @foreach ($klasifikasi as $k)
                                                            @if (old('klasifikasi_usaha_id', $member->klasifikasi_usaha_id) == $k->id)
                                                                <option value="{{ $k->id }}" selected disabled>
                                                                    {{ $k->name }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-firstname-input" class="form-label">Nama
                                                        Usaha<span style="margin-left: 1px;color: red">*</span></label>
                                                    <input type="text" id="nama_usaha" name="nama_usaha"
                                                        class="form-control" value="{{ $member->nama_usaha }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-firstname-input" class="form-label">Rating
                                                        Usaha<span style="margin-left: 1px;color: red">*</span></label>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="rating_usaha" value="1"
                                                                {{ old('rating_usaha', $member->rating_usaha) == '1' ? 'checked' : '' }}>
                                                            1
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="rating_usaha" value="2"
                                                                {{ old('rating_usaha', $member->rating_usaha) == '2' ? 'checked' : '' }}>
                                                            2
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="rating_usaha" value="3"
                                                                {{ old('rating_usaha', $member->rating_usaha) == '3' ? 'checked' : '' }}>
                                                            3
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="rating_usaha" value="4"
                                                                {{ old('rating_usaha', $member->rating_usaha) == '4' ? 'checked' : '' }}>
                                                            4
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="rating_usaha" value="5"
                                                                {{ old('rating_usaha', $member->rating_usaha) == '5' ? 'checked' : '' }}>
                                                            5
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-16">
                                                <label class="form-label">Alamat<span
                                                        style="margin-left: 1px;color: red">*</span></label>
                                                <textarea rows="5" class="form-control" placeholder="Enter text here" name="alamat">{{ old('alamat', $member->alamat ?? '') }}</textarea>
                                            </div>
                                        </div>
                                        <ul class="pager wizard twitter-bs-wizard-pager-link">
                                            <li class="previous"><a href="{{ route('dashboard-member.index') }}"
                                                    class="btn btn-secondary"><i class="bx bx-chevron-left me-1"></i>
                                                    Kembali</a>
                                            </li>
                                            <button style="margin-left:850px;" onclick="resetFormPage('1'); return false;" class="btn btn-danger" type="button">Kosongkan</button>
                                            <li class="next">
                                                <a id="next-tab-btn" class="btn btn-primary">Selanjutnya <i
                                                        class="fa-solid fa-arrow-right"></i></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="tab-pane" id="pic">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-firstname-input" class="form-label">Nama
                                                        Pemilik<span style="margin-left: 1px;color: red">*</span></label>
                                                    <input type="text" id="nama_pemilik" name="nama_pemilik"
                                                        class="form-control" value="{{ $member->name }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="basicpill-firstname-input" class="form-label">Jabatan<span
                                                            style="margin-left: 1px;color: red">*</span></label>
                                                    <input type="text" id="jabatan" name="jabatan"
                                                        class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="basicpill-firstname-input" class="form-label">Nomor
                                                        Indentitas<span
                                                            style="margin-left: 1px;color: red">*</span></label>
                                                    <input type="text" id="no_identitas_pemilik"
                                                        name="no_identitas_pemilik" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="basicpill-firstname-input" class="form-label">Nomor
                                                        Handphone<span style="margin-left: 1px;color: red">*</span></label>
                                                    <input type="number" id="no_hp_pemilik" name="no_hp_pemilik"
                                                        class="form-control" value="{{ $member->no_hp }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="basicpill-firstname-input" class="form-label">Email<span
                                                            style="margin-left: 1px;color: red">*</span></label>
                                                    <input type="email" id="email_pemilik" name="email_pemilik"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-firstname-input" class="form-label">Nama
                                                        PIC<span style="margin-left: 1px;color: red">*</span></label>
                                                    <input type="text" id="nama_pic" name="nama_pic"
                                                        class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="basicpill-firstname-input" class="form-label">Jabatan
                                                        PIC<span style="margin-left: 1px;color: red">*</span></label>
                                                    <input type="text" id="jabatan_pic" name="jabatan_pic"
                                                        class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="basicpill-firstname-input" class="form-label">Nomor
                                                        Indentitas
                                                        PIC<span style="margin-left: 1px;color: red">*</span></label>
                                                    <input type="text" id="no_identitas_pic" name="no_identitas_pic"
                                                        class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="basicpill-firstname-input" class="form-label">Nomor
                                                        Handphone
                                                        PIC<span style="margin-left: 1px;color: red">*</span></label>
                                                    <input type="number" id="no_hp_pic" name="no_hp_pic"
                                                        class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="basicpill-firstname-input" class="form-label">Email
                                                        PIC<span style="margin-left: 1px;color: red">*</span></label>
                                                    <input type="email" id="email_pic" name="email_pic"
                                                        class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="pager wizard twitter-bs-wizard-pager-link">
                                            <li class="previous">
                                                <a id="prev-tab-btn" class="btn btn-secondary"><i
                                                        class="bx bx-chevron-left me-1"></i> Kembali</a>
                                            </li>
                                            <button style="margin-left:845px;" onclick="resetFormPage('2'); return false;" class="btn btn-danger" type="button">Kosongkan</button>
                                            <li class="next">
                                                <a id="next-tab-btn" class="btn btn-primary">Selanjutnya <i
                                                        class="fa-solid fa-arrow-right"></i></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="tab-pane" id="legalisasi">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="basicpill-firstname-input" class="form-label">Nama Badan
                                                        Hukum
                                                        Perusahaan<span
                                                            style="margin-left: 1px;color: red">*</span></label>
                                                    <input type="text" id="nama_badan_hukum_perusahaan"
                                                        name="nama_badan_hukum_perusahaan" class="form-control">
                                                </div>
                                                <legend>Pilih Salah Satu<span style="margin-left: 1px;color: red">*</span>
                                                </legend>
                                                <input type="checkbox" id="pilihan1" name="siu_perdagangan"
                                                    value="siu-perdagangan">
                                                <label for="pilihan1">No SIU Perdagangan</label>
                                                <input type="checkbox" id="pilihan2" name="siu_pariwisata"
                                                    value="siu-pariwisata">
                                                <label for="pilihan2">No SIU Pariwisata</label>
                                                <input type="checkbox" id="pilihan3" name="nomor_tdup"
                                                    value="nomor_tdup">
                                                <label for="pilihan3">NO TDUP</label>
                                                <div class="mb-3">
                                                    <input type="text" name="inputs" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="basicpill-firstname-input" class="form-label">Nomor Akte
                                                        Pendirian
                                                        Perusahaan<span
                                                            style="margin-left: 1px;color: red">*</span></label>
                                                    <input type="text" id="nomor_akte_pendirian_perusahaan"
                                                        name="nomor_akte_pendirian_perusahaan" class="form-control"
                                                    >
                                                </div>
                                                <div class="mb-3">
                                                    <label for="basicpill-firstname-input" class="form-label">FIle<span
                                                            style="margin-left: 1px;color: red">*</span></label>
                                                    <input type="file" id="file" name="file"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="basicpill-firstname-input" class="form-label">Nomor Induk
                                                        Berusaha
                                                        (NIB)</label>
                                                    <input type="text" id="nomor_induk_berusaha"
                                                        name="nomor_induk_berusaha" class="form-control"
                                                        placeholder="opsional">
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="pager wizard twitter-bs-wizard-pager-link">
                                            <li class="previous">
                                                <a id="prev-tab-btn" class="btn btn-secondary"><i
                                                        class="bx bx-chevron-left me-1"></i> Kembali</a>
                                            </li>
                                            <button style="margin-left:850px;" onclick="resetFormPage('3'); return false;" class="btn btn-danger" type="button">Kosongkan</button>
                                            <li class="next">
                                                <a id="next-tab-btn" class="btn btn-primary">Selanjutnya <i
                                                        class="fa-solid fa-arrow-right"></i></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="tab-pane" id="karyawan">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="basicpill-firstname-input" class="form-label">Jumlah
                                                        Karyawan Keseluruhan<span
                                                            style="margin-left: 1px;color: red">*</span></label>
                                                    <input type="number" id="jumlah_karyawan"
                                                        name="total_jumlah_karyawan" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="basicpill-firstname-input" class="form-label">Jumlah
                                                        Karyawan
                                                        Harian<span style="margin-left: 1px;color: red">*</span></label>
                                                    <input type="number" id="jumlah_karyawan_harian"
                                                        name="jumlah_karyawan_harian" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="basicpill-firstname-input" class="form-label">Jumlah
                                                        Karyawan
                                                        Tetap<span style="margin-left: 1px;color: red">*</span></label>
                                                    <input type="number" id="jumlah_karyawan_tetap"
                                                        name="jumlah_karyawan_tetap" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="basicpill-firstname-input" class="form-label">Jumlah
                                                        Karyawan
                                                        Outsource<span style="margin-left: 1px;color: red">*</span></label>
                                                    <input type="number" id="jumlah_karyawan_outsource"
                                                        name="jumlah_karyawan_outsource" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="basicpill-firstname-input" class="form-label">Jumlah
                                                        Karyawan
                                                        Kontrak<span style="margin-left: 1px;color: red">*</span></label>
                                                    <input type="number" id="jumlah_karyawan_kontrak"
                                                        name="jumlah_karyawan_kontrak" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="pager wizard twitter-bs-wizard-pager-link">
                                            <li class="previous">
                                                <a id="prev-tab-btn" class="btn btn-secondary"><i
                                                        class="bx bx-chevron-left me-1"></i> Kembali</a>
                                            </li>
                                            <button style="margin-left:865px;" onclick="resetFormPage('4'); return false;" class="btn btn-danger" type="button">Kosongkan</button>
                                            <li class="float-end">
                                                <button type="submit" class="btn btn-primary">Submit Data</button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endif
@endsection
@section('script')
    <script>

        $(function() {
            let counter = 1
            $("#addButton").click(function(e) {
                counter++
                let newInput =
                    `<div class="row" id="hapus">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Tipe Kamar<span style="margin-left: 1px;color: red">*</span></label>
                                <select name="tipe_kamar[]" class="form-select">
                                    <option value="presidential">Presidential</option>
                                    <option value="deluxe">Deluxe</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Nama Kamar<span style="margin-left: 1px;color: red">*</span></label>
                                <input type="text" id="nama_kamar" name="nama_kamar[]" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Jumlah Kamar<span style="margin-left: 1px;color: red">*</span></label>
                                <input type="number" id="jumlah" name="jumlah[]" class="form-control">
                            </div>
                        </div>
                    </div>`
                $('#dinamis').append(newInput);
            });
            $("#removeButton").click(function(e) {
                if (counter === 1) {
                    swal.fire({
                        title: "Perhatian!",
                        text: "input sudah tidak dapat dihapus",
                        icon: "warning"
                    })
                }
                $('#hapus').remove()
                counter--
            });

            $("#plus").click(function(e) {
                counter++
                let newInput =
                    `<div class="row" id="hapus2">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Nama Ruangan<span style="margin-left: 1px;color: red">*</span></label>
                                <input type="text" id="nama_ruangan" name="nama_ruangan[]" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="basicpill-firstname-input" class="form-label">Kapasitas Maksimal<span style="margin-left: 1px;color: red">*</span></label>
                                <input type="number" id="kapasitas_maksimal" name="kapasitas_maksimal[]" class="form-control">
                            </div>
                        </div>
                    </div>`
                $('#meetingplus').append(newInput);
            });
            $("#minus").click(function(e) {
                if (counter === 1) {
                    swal.fire({
                        title: "Perhatian!",
                        text: "input sudah tidak dapat dihapus",
                        icon: "warning"
                    })
                }
                $('#hapus2').remove()
                counter--
            });
            $(document).on('submit', '#form_store', function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "{{ route('store.data') }}",
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
                                window.location.href =
                                    '{{ route('dashboard-member.index') }}';
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
            $(document).on('submit', '#form_resto', function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "{{ route('store.data-resto') }}",
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
                                window.location.href =
                                    '{{ route('dashboard-member.index') }}';
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
        })

        function resetFormPage(page) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data akan direset!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#432D77',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Reset!'
            }).then((result) => {
                if (result.isConfirmed) {
                const formElements = document.querySelectorAll(`#informasi [name], #pic [name], #legalisasi [name], #ruangan [name], #meeting [name], #karyawan [name]`);
                formElements.forEach((formElement) => {
                    if (formElement.tagName.toLowerCase() === 'input' && ['text', 'number', 'email', 'file'].includes(formElement.type)) {
                    formElement.value = '';
                    } else if (formElement.tagName.toLowerCase() === 'textarea') {
                    formElement.value = '';
                    } else if (formElement.tagName.toLowerCase() === 'select') {
                    formElement.selectedIndex = 0;
                    } else if (formElement.tagName.toLowerCase() === 'input' && formElement.type === 'radio') {
                    formElement.checked = false;
                    } else if (formElement.tagName.toLowerCase() === 'input' && formElement.type === 'checkbox') {
                    formElement.checked = false;
                    }
                });
                const currentTabId = document.querySelector('.tab-content .tab-pane.active').id;
                const tabContentElements = document.querySelectorAll('.tab-content .tab-pane');
                tabContentElements.forEach((tabContentElement) => {
                    tabContentElement.classList.remove('active');
                });
                document.getElementById(currentTabId).classList.add('active');
                const tabNavElements = document.querySelectorAll('.twitter-bs-wizard-nav li');
                tabNavElements.forEach((tabNavElement) => {
                    tabNavElement.classList.remove('active');
                });
                document.querySelector(`.twitter-bs-wizard-nav li[href="#${currentTabId}"]`).classList.add('active');
                }
            })
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab-pane active");
            y = x[0].getElementsByTagName("input");
            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                // add an "invalid" class to the field:
                y[i].className += " invalid";
                // and set the current valid status to false:
                valid = false;
                }
            }
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid; // return the valid status
        }
    </script>
@endsection
