<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Employee_Detail_Information;
use App\Models\Klasifikasi_usaha;
use App\Models\Jenis_usaha;
use App\Models\Legal_Information;
use App\Models\Meeting_Room_Information;
use App\Models\Member;
use App\Models\Member_Owner;
use App\Models\Mitra;
use App\Models\Penawaran;
use App\Models\Benefit;
use App\Models\Laporan;
use App\Models\Room_Detail_Information;
use App\Models\Summary_Information;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class DashboardAdminController extends Controller
{
    public function index()
    {
        $profile = Auth('admin')->user();
        return view(
            'dashboard.index',
            [
                'profile' => $profile
            ]
        );
    }
    public function berita()
    {
        $berita = Berita::orderBy('id', 'ASC')->get();
        $profile = Auth('admin')->user();
        return view(
            'dashboard.Admin.berita.index',
            [
                'beritas' => $berita,
                'profile' => $profile
            ]
        );
    }
    public function mitra()
    {
        $profile = Auth('admin')->user();
        $mitra = Mitra::orderBy('id', 'ASC')->get();
        return view(
            'dashboard.Admin.kemitraan.index',
            [
                'profile' => $profile,
                'mitras' => $mitra
            ]
        );
    }
    public function member()
    {
        $member = Member::orderBy('id', 'ASC')->get();
        $profile = Auth('admin')->user();
        return view(
            'dashboard.Admin.member.index',
            [
                'member' => $member,
                'profile' => $profile
            ]
        );
    }
    public function detail_member($id)
    {
        $profile = Auth('admin')->user();
        $data = Member::where('id', $id)->first();
        $owner = Member_Owner::where('member_id', $id)->first();
        $legal = Legal_Information::where('member_id', $id)->first();
        $room = Room_Detail_Information::where('member_id', $id)->get();
        $meeting = Meeting_Room_Information::where('member_id', $id)->get();
        $summary = Summary_Information::where('member_id', $id)->first();
        $employee = Employee_Detail_Information::where('member_id', $id)->first();
        return view(
            'dashboard.Admin.member.detail',
            [
                'profile' => $profile,
                'data' => $data,
                'owner' => $owner,
                'legal' => $legal,
                'room' => $room,
                'meeting' => $meeting,
                'summary' => $summary,
                'employee' => $employee
            ]
        );
    }
    public function jenis()
    {
        $jenis = Jenis_usaha::whereNull('deleted_at')->orderBy('id', 'ASC')->get();
        $profile = Auth('admin')->user();
        return view(
            'dashboard.Admin.master-data.jenis-usaha.index',
            [
                'jenis' => $jenis,
                'profile' => $profile
            ]
        );
    }
    public function klasifikasi()
    {
        $klasifikasi = Klasifikasi_usaha::whereNull('deleted_at')->orderBy('id', 'ASC')->get();
        $profile = Auth('admin')->user();
        return view(
            'dashboard.Admin.master-data.klasifikasi-usaha.index',
            [
                'klasifikasis' => $klasifikasi,
                'profile' => $profile
            ]
        );
    }
    public function benefit()
    {
        $benefit = Benefit::whereNull('deleted_at')->orderBy('id', 'ASC')->get();
        $profile = Auth('admin')->user();
        return view(
            'dashboard.Admin.master-data.benefit.index',
            [
                'benefits' => $benefit,
                'profile' => $profile
            ]
        );
    }
    public function pengaduan()
    {
        $laporan = Laporan::orderBy('id', 'ASC')->get();
        return view('dashboard.Admin.pengaduan.index', ['profile' => Auth('admin')->user(), 'pengaduan' => $laporan]);
    }
    public function profile()
    {
        $profile = Auth('admin')->user();
        return view(
            'dashboard.profile',
            [
                'profile' => $profile
            ]
        );
    }
    public function updProfile(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|max:255',
                'username' => 'required|max:255',
                'email' => 'required|email|max:255',
                'password' => 'required|min:8',
            ]);
            $store = Auth('admin')->user();
            $store->name = $request->name;
            $store->username = $request->username;
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
            $storesimg = Auth('admin')->user();
            if ($storesimg) {
                if ($storesimg->image) {
                    Storage::disk('public')->delete('img-admin/' . $storesimg->image);
                }
            }
            $foto = $request->file('image');
            $fotoname = date('Y-m-d-') . $foto->getClientOriginalName();
            $request->image->move('storage/img-admin/', $fotoname);

            $storesimg->image = $fotoname;
            $storesimg->save();

            return ['status' => true, 'pesan' => 'Image berhasil diupdate'];
        } catch (\Exception $e) {
            return ['status' => false, 'error' => $e->getMessage()];
        }
    }
    public function penawaran()
    {
        $profile = Auth('admin')->user();
        return view(
            'dashboard.Admin.penawaran.index',
            [
                'penawaran' => Penawaran::all(),
                'profile' => $profile
            ]
            );
        }
    public function panic_btn()
    {
        $profile = Auth('admin')->user();
        $data = Laporan::where('id', '=', '1')->get();
        return view(
            'dashboard.Admin.benefit.button-panic.index', 
            [   
                'panic' => $data,
                'profile' => $profile
            ]
        );
    }
}