<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Mitra;
use App\Models\Jenis_usaha;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class SuperAdminController extends Controller
{
    public function admin(Admin $admin)
    {
        $admin = auth()->guard('admin')->user();

        if (!$admin || !$admin->is_superadmin) {
            abort(403);
        }
        $admin = Admin::where('id', '!=', auth('admin')->id())->get();
        $profile = Auth('admin')->user();
        return view('dashboard.superadmin.admin.index', ['admins' => $admin, 'profile' => $profile]);
    }
    public function add_admin(Request $request)
    {
        try{
            $request->validate([
                'name' => 'required|max:255',
                'username' => 'required|max:255|unique:admins',
                'email' => 'required|email|unique:admins',
                'password' => 'required|min:5',
            ]);
    
            $store = new Admin;
            $store->name = $request->name;
            $store->username = $request->username;
            $store->email = $request->email;
            $store->password = Hash::make($request->password);
            $store->save();

            return ['status' => true, 'pesan' => 'Admin Berhasil Ditambahkan'];
        }catch(\Exception $e) {
            return ['status' => false, 'error' => $e->getMessage()];
        }
    }
    public function destroy_admin(Admin $id)
    {
        $data = Admin::find($id);

        Admin::destroy($data);

        return redirect()->route('dashboard.superadmin.admin');
    }
    public function reset_pass(Request $request)
    {
        // if (empty($id)) {
        //     return ['status' => false, 'error' => 'ID is required'];
        // }

        $update = Admin::find($request->id);
        $update->password = Hash::make('12345678');
        $update->save();
        
        return redirect()->route('dashboard.superadmin.admin');
        
    }
    public function mitra()
    {
        $profile = Auth('admin')->user();
        $mitra = Mitra::orderBy('id', 'ASC')->get();
        return view('dashboard.superadmin.mitra.index', ['profile' => $profile, 'jenis_usaha' => Jenis_usaha::all(), 'mitras' => $mitra]);
    }
    public function add_mitra(Request $request)
    {
        try{
            $request->validate([
                'nama_pic' => 'required|max:255',
                'no_hp' => 'required|max:15',
                'jenis_usaha_id' => 'required',
                'jenis_kerjasama' => 'required',
                'nama_perusahaan' => 'required',
                'email' => 'required|email|unique:mitras',
            ]);
    
            $store = new Mitra;
            $store->nama_pic = $request->nama_pic;
            $store->no_hp = $request->no_hp;
            $store->email = $request->email;
            $store->jenis_usaha_id = $request->jenis_usaha_id;
            $store->jenis_kerjasama = $request->jenis_kerjasama;
            $store->nama_perusahaan = $request->nama_perusahaan;
            $store->status = 'diterima';
            $store->save();

            return ['status' => true, 'pesan' => 'Mitra Berhasil Ditambahkan'];
        }catch(\Exception $e) {
            return ['status' => false, 'error' => $e->getMessage()];
        }
    }

    public function destroy_mitra(Mitra $id)
    {
        $data = Mitra::find($id);

        Mitra::destroy($data);

        return redirect()->route('dashboard.superadmin.mitra');
    }

}