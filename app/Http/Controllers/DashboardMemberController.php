<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Legal_Information;
use App\Models\Jenis_usaha;
use App\Models\Member;
use App\Models\Klasifikasi_usaha;
use App\Models\Member_Owner;
use App\Models\Meeting_Room_Information;
use App\Models\Summary_Information;
use App\Models\Employee_Detail_Information;
use App\Models\Laporan;
use App\Models\Room_Detail_Information;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class DashboardMemberController extends Controller
{
    public function multi_step()
    {   
        $member = auth()->guard('member')->user();

        if (!$member || $member->status_data === 'nunggu') {
            abort(403, 'anda tidak diperbolehkan untuk mengakses halaman ini!');
        }

        $member = Member::where('id', '=', auth('member')->id())->first();
        return view('Member.nextstep', [
            'jenis' => Jenis_usaha::all(),
            'klasifikasi' => Klasifikasi_usaha::all(),
            'member' => $member,
            'profile' => auth('member')->user()
        ]);
    }

    public function dashboard()
    {
        $member = Member::where('id', '=', auth('member')->id())->first();
        $profile = auth('member')->user();
        return view('dashboard-member.index', ['member' => $member, 'profile' => $profile]);
    }

    public function pengaduan()
    {
        $member = auth()->guard('member')->user();

        if ($member->status_data === 'belum_input' ) {
            session()->flash('error', 'anda harus mengisi data dulu baru bisa mengakses halaman ini!');
            return redirect()->route('dashboard-member.index');
        }
        $profile = auth('member')->user();
        $data = Laporan::where('member_id', '=', auth('member')->id())->get();
        return view('dashboard-member.pengaduan.index', ['profile' => $profile, 'laporan' => $data]);
    }

    public function storeData(Request $request)
    {
        try {
            $request->validate([
                'nama_usaha'=>'required|max:255',
                'alamat' => 'required',
                'rating_usaha' => 'required',


                'nama_pemilik'=>'required|max:255',
                'jabatan'=>'required|max:255',
                'no_identitas_pemilik'=>'required|max:25',
                'no_hp_pemilik'=>'required|max:13',
                'email_pemilik'=>'required|email',
                'nama_pic'=>'required|max:255',
                'jabatan_pic'=>'required|max:255',
                'no_identitas_pic'=>'required|max:25',
                'no_hp_pic'=>'required|max:13',
                'email_pic'=>'required|email',

                'nama_badan_hukum_perusahaan' => 'required',
                'nomor_akte_pendirian_perusahaan' => 'required',
                'nomor_induk_berusaha' => 'nullable',
                'nomor_tdup' => 'nullable',
                'siu_pariwisata' => 'nullable',
                'siu_perdagangan' => 'nullable',
                'inputs' => 'required',
                'file' => 'required|file|max:2048',

                'total_jumlah_kamar' => 'required',
                'total_jumlah_karyawan' => 'required',
                'ruang_pertemuan' => 'required',
                'tipe_kamar' => 'required',
                'nama_kamar' => 'required',
                'jumlah' => 'required',

                'nama_ruangan' => 'required',
                'kapasitas_maksimal' => 'required',

                'jumlah_karyawan_tetap' => 'required',
                'jumlah_karyawan_kontrak' => 'required',
                'jumlah_karyawan_harian' => 'required',
                'jumlah_karyawan_outsource' => 'required',
            ]);

            $member = Member::find($request->member_id);
            $member->nama_usaha = $request->nama_usaha;
            $member->alamat = $request->alamat;
            $member->rating_usaha = $request->rating_usaha;
            $member->status_data = 'nunggu';
            $member->save();

            $pic = new Member_Owner;
            $pic->nama_pemilik = $request->nama_pemilik;
            $pic->jabatan = $request->jabatan;
            $pic->no_identitas_pemilik = $request->no_identitas_pemilik;
            $pic->no_hp_pemilik = $request->no_hp_pemilik;
            $pic->email_pemilik = $request->email_pemilik;

            $pic->nama_pic = $request->nama_pic;
            $pic->jabatan_pic = $request->jabatan_pic;
            $pic->no_identitas_pic = $request->no_identitas_pic;
            $pic->no_hp_pic = $request->no_hp_pic;
            $pic->email_pic = $request->email_pic;
            $pic->member_id = $request->member_id;
            $pic->save();

            $legal = new Legal_information;
            $legal->nama_badan_hukum_perusahaan = $request->nama_badan_hukum_perusahaan;
            $legal->nomor_akte_pendirian_perusahaan = $request->nomor_akte_pendirian_perusahaan;
            $legal->nomor_induk_berusaha = $request->nomor_induk_berusaha;
            if($request->siu_perdagangan){
                $legal->nomor_siu_perdagangan = $request->inputs;
            }elseif($request->siu_pariwisata){
                $legal->nomor_siu_pariwisata = $request->inputs;
            }elseif($request->nomor_tdup){
                $legal->nomor_tdup = $request->inputs;
            }

            $foto = $request->file('file');
            $filename = date('Y-m-d-') . $foto->getClientOriginalName();
            $path = 'file-information/' . $filename;
            Storage::disk('public')->put($path, file_get_contents($foto));

            $legal->file = $filename;
            $legal->member_id = $request->member_id;
            $legal->save();

            $sum = new Summary_information;
            $sum->total_jumlah_kamar = $request->total_jumlah_kamar;
            $sum->total_jumlah_karyawan = $request->total_jumlah_karyawan;
            $sum->ruang_pertemuan = $request->ruang_pertemuan;
            $sum->member_id = $request->member_id;
            $sum->save();
            
            foreach ($request->tipe_kamar as $index => $tipe_kamar) {
                $kamar = new Room_detail_information;
                $kamar->nama_kamar = $request->nama_kamar[$index];
                $kamar->tipe_kamar = $tipe_kamar;
                $kamar->jumlah = $request->jumlah[$index];
                $kamar->member_id = $request->member_id;
                $kamar->save();
            }

            foreach ($request->tipe_kamar as $index => $nama_ruangan) {
                $meet = new Meeting_room_information;
                $meet->nama_ruangan = $request->nama_ruangan[$index];
                $meet->kapasitas_maksimal = $request->kapasitas_maksimal[$index];
                $meet->member_id = $request->member_id;
                $meet->save();
            }

            $k = new Employee_detail_information;
            $k->jumlah_karyawan_tetap = $request->jumlah_karyawan_tetap;
            $k->jumlah_karyawan_harian = $request->jumlah_karyawan_harian;
            $k->jumlah_karyawan_kontrak = $request->jumlah_karyawan_kontrak;
            $k->jumlah_karyawan_outsource = $request->jumlah_karyawan_outsource;
            $k->member_id = $request->member_id;
            $k->save();

            return ['status' => true, 'pesan' => 'Data Berhasil Di isi silahkan tunggu konfirmai Admin'];
        } catch (\Exception $e) {
            return ['status' => false, 'error' => $e->getMessage()];
        }
    }
    public function storeDataResto(Request $request)
    {
        try {
            $request->validate([
                'nama_usaha'=>'required|max:255',
                'alamat' => 'required',
                'rating_usaha' => 'required',

                'nama_pemilik'=>'required|max:255',
                'jabatan'=>'required|max:255',
                'no_identitas_pemilik'=>'required|max:25',
                'no_hp_pemilik'=>'required|max:13',
                'email_pemilik'=>'required|email',
                'nama_pic'=>'required|max:255',
                'jabatan_pic'=>'required|max:255',
                'no_identitas_pic'=>'required|max:25',
                'no_hp_pic'=>'required|max:13',
                'email_pic'=>'required|email',

                'nama_badan_hukum_perusahaan' => 'required',
                'nomor_akte_pendirian_perusahaan' => 'required',
                'nomor_induk_berusaha' => 'nullable',
                'nomor_tdup' => 'nullable',
                'siu_pariwisata' => 'nullable',
                'siu_perdagangan' => 'nullable',
                'inputs' => 'required',
                'file' => 'required|file|max:2048',

                'total_jumlah_karyawan' => 'required',

                'jumlah_karyawan_tetap' => 'required',
                'jumlah_karyawan_kontrak' => 'required',
                'jumlah_karyawan_harian' => 'required',
                'jumlah_karyawan_outsource' => 'required',
            ]);

            $member = Member::find($request->member_id);
            $member->nama_usaha = $request->nama_usaha;
            $member->alamat = $request->alamat;
            $member->rating_usaha = $request->rating_usaha;
            $member->status_data = 'nunggu';
            $member->save();

            $pic = new Member_Owner;
            $pic->nama_pemilik = $request->nama_pemilik;
            $pic->jabatan = $request->jabatan;
            $pic->no_identitas_pemilik = $request->no_identitas_pemilik;
            $pic->no_hp_pemilik = $request->no_hp_pemilik;
            $pic->email_pemilik = $request->email_pemilik;

            $pic->nama_pic = $request->nama_pic;
            $pic->jabatan_pic = $request->jabatan_pic;
            $pic->no_identitas_pic = $request->no_identitas_pic;
            $pic->no_hp_pic = $request->no_hp_pic;
            $pic->email_pic = $request->email_pic;
            $pic->member_id = $request->member_id;
            $pic->save();

            $legal = new Legal_information;
            $legal->nama_badan_hukum_perusahaan = $request->nama_badan_hukum_perusahaan;
            $legal->nomor_akte_pendirian_perusahaan = $request->nomor_akte_pendirian_perusahaan;
            $legal->nomor_induk_berusaha = $request->nomor_induk_berusaha;
            if($request->siu_perdagangan){
                $legal->nomor_siu_perdagangan = $request->inputs;
            }elseif($request->siu_pariwisata){
                $legal->nomor_siu_pariwisata = $request->inputs;
            }elseif($request->nomor_tdup){
                $legal->nomor_tdup = $request->inputs;
            }

            $foto = $request->file('file');
            $filename = date('Y-m-d-') . $foto->getClientOriginalName();
            $path = 'file-information/' . $filename;
            Storage::disk('public')->put($path, file_get_contents($foto));

            $legal->file = $filename;
            $legal->member_id = $request->member_id;
            $legal->save();

            $sum = new Summary_information;
            $sum->total_jumlah_karyawan = $request->total_jumlah_karyawan;
            $sum->member_id = $request->member_id;
            $sum->save();

            $k = new Employee_detail_information;
            $k->jumlah_karyawan_tetap = $request->jumlah_karyawan_tetap;
            $k->jumlah_karyawan_harian = $request->jumlah_karyawan_harian;
            $k->jumlah_karyawan_kontrak = $request->jumlah_karyawan_kontrak;
            $k->jumlah_karyawan_outsource = $request->jumlah_karyawan_outsource;
            $k->member_id = $request->member_id;
            $k->save();

            return ['status' => true, 'pesan' => 'Data Berhasil Di isi silahkan tunggu konfirmai Admin'];
        } catch (\Exception $e) {
            return ['status' => false, 'error' => $e->getMessage()];
        }
    }
    public function profile()
    {
        $profile = Auth('member')->user();
        $owner = Member_Owner::where('member_id', '=', auth('member')->id())->first();
        $legal = Legal_Information::where('member_id', '=', auth('member')->id())->first();
        $summary = Summary_Information::where('member_id', '=', auth('member')->id())->first();
        $employee = Employee_Detail_Information::where('member_id', '=', auth('member')->id())->first();
        $room = Room_Detail_Information::where('member_id', '=', auth('member')->id())->get();
        $meeting = Meeting_Room_Information::where('member_id', '=', auth('member')->id())->get();
        $data = Member::where('id', '=', auth('member')->id())->first();
        return view(
            'dashboard-member.profile', compact(
                'profile',
                'owner',
                'legal',
                'data',
                'summary',
                'employee',
                'room',
                'meeting',
            ));
    }
    public function updProfile(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email|max:255',
                'password' => 'required|min:8|confirmed',
            ]);
            $store = Auth('member')->user();
            $store->email = $request->email;
            $store->password = Hash::make($request->password);
            $store->save();

            return ['status' => true, 'pesan' => 'Profile berhasil diupdate'];
        } catch (\Exception $e) {
            return ['status' => false, 'error' => $e->getMessage()];
        }
    }
    public function updateImg(Request $request)
    {
        try {
            $request->validate([
                'image' => 'mimes:png,jpg,jpeg',
            ]);
            $storesimg = Auth('member')->user();
            if ($storesimg) {
                if ($storesimg->image) {
                    Storage::disk('public')->delete('img-member/' . $storesimg->image);
                }
            }
            $foto = $request->file('image');
            $fotoname = date('Y-m-d-') . $foto->getClientOriginalName();
            $request->image->move('storage/img-member/', $fotoname);
            
            $storesimg->image = $fotoname;
            $storesimg->save();

            return ['status' => true, 'pesan' => 'Image berhasil diupdate'];
        } catch (\Exception $e) {
            return ['status' => false, 'error' => $e->getMessage()];
        }
    }
}