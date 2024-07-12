<?php

namespace App\Http\Controllers;

use App\Models\Jenis_usaha;
use App\Models\Member;
use App\Models\Klasifikasi_usaha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class MemberController extends Controller
{
    public function view_register()
    {
        return view('Member.register', [
            'jenis_usaha' => Jenis_usaha::all(),
            'klasifikasi_usaha' => Klasifikasi_usaha::all(),
        ]);
    }
    public function create_member(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required|unique:members',
                'no_hp' => 'required|min:9',
                'password' => 'required|confirmed|min:8',
                'jenis_usaha_id' => 'required',
                'klasifikasi_usaha_id' => 'required',
                'rating_usaha' => 'required',
                'nama_usaha' => 'required',
                'alamat' => 'required',
            ]);

            $store = new Member();
            $store->name = $request->name;
            $store->email = $request->email;
            $store->nama_usaha = $request->nama_usaha;
            $store->alamat = $request->alamat;
            $store->no_hp = $request->no_hp;
            $store->jenis_usaha_id = $request->jenis_usaha_id;
            $store->klasifikasi_usaha_id = $request->klasifikasi_usaha_id;
            $store->rating_usaha = $request->rating_usaha;
            $store->password = Hash::make($request->password);
            $store->save();

            return ['status' => true, 'pesan' => 'Anda Berhasil Daftar sebagai Member'];
        } catch (\Exception $e) {
            return ['status' => false, 'error' => $e->getMessage()];
        }
    }
    public function terima_member($id)
    {
        try{
            $member = Member::find($id);
            $member->status_data = 'diterima';
            $member->updated_at = Carbon::now();
            $member->save();
        
            return redirect()->route('dashboard.member');
        }catch(\Exception $e){
            dd($e);
        }
    }
    public function tolak_member(Request $request)
    {
        try{
            $request->validate([
                'alasan' => 'required',
                'member_id' => 'required|exists:members,id'
            ]);
            
            $member = Member::find($request->member_id);
            $member->status_data = 'ditolak';
            $member->updated_at = Carbon::now();
            $member->alasan = $request->alasan;
            $member->save();
            
            return response()->json(['status' => true, 'pesan' => 'Pengajuan Member telah ditolak']);
        }catch(\Exception $e) {
            return ['status' => false, 'error' => $e->getMessage()];
        }
    }
}