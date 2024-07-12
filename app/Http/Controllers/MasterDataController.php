<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jenis_usaha;
Use App\Models\Klasifikasi_usaha;
use App\Models\Benefit;

class MasterDataController extends Controller
{
    public function store_jenis(Request $request)
    {
        try{
            $request->validate([
                'name' => 'required|max:255',
            ]);

            $store = new Jenis_usaha;
            $store->name = $request->name;
            $store->save();

            return ['status' => true, 'pesan' => 'Data Berhasil Ditambahkan'];
        } catch(\Exception $e){
            return ['status' => false, 'error' => $e->getMessage()];
        }
    }
    public function edit_jenis($id)
    {
        $jenis = Jenis_usaha::find($id);
        if($jenis)
        {
            return response()->json([
                'status' => 200,
                'jenis' => $jenis,
            ]);
        }
        else
        {
            return response()->json([
                'status' => 404,
                'message' => 'gak ada nih'
            ]);
        }
    }
    public function update_jenis(Request $request,$id)
    {
        try {
            $request->validate([
                'name' => 'required',
            ]);

            $update = Jenis_usaha::find($id);
            $update->name = $request->name;
            $update->save();

            return ['status' => true, 'pesan' => 'Data Berhasil Diupdate'];
        } catch(\Exception $e) {
            return ['status' => false, 'error' => $e->getMessage()];
        }
    }
    public function destroy_jenis(Jenis_usaha $id)
    {
        $data = Jenis_usaha::find($id);

        Jenis_usaha::destroy($data);
        return redirect()->route('dashboard.jenis');
    }

    public function store_klasifikasi(Request $request)
    {
        try{
            $request->validate([
                'name' => 'required|max:255',
            ]);

            $store = new Klasifikasi_usaha;
            $store->name = $request->name;
            $store->save();

            return ['status' => true, 'pesan' => 'Data Berhasil Ditambahkan'];
        } catch(\Exception $e){
            return ['status' => false, 'error' => $e->getMessage()];
        }
    }
    public function edit_klasifikasi($id)
    {
        $klasifikasi = Klasifikasi_usaha::find($id);
        if($klasifikasi)
        {
            return response()->json([
                'status' => 200,
                'klasifikasi' => $klasifikasi,
            ]);
        }
        else
        {
            return response()->json([
                'status' => 404,
                'message' => 'gak ada nih'
            ]);
        }
    }
    public function update_klasifikasi(Request $request,$id)
    {
        try {
            $request->validate([
                'name' => 'required',
            ]);

            $update = Klasifikasi_usaha::find($id);
            $update->name = $request->name;
            $update->save();

            return ['status' => true, 'pesan' => 'Data Berhasil Diupdate'];
        } catch(\Exception $e) {
            return ['status' => false, 'error' => $e->getMessage()];
        }
    }
    public function destroy_klasifikasi(Klasifikasi_usaha $id)
    {
        $data = Klasifikasi_usaha::find($id);

        Klasifikasi_usaha::destroy($data);
        return redirect()->route('dashboard.klasifikasi');
    }

    public function store_benefit(Request $request)
    {
        try{
            $request->validate([
                'name' => 'required|max:255',
            ]);

            $store = new Benefit;
            $store->name = $request->name;
            $store->save();

            return ['status' => true, 'pesan' => 'Data Berhasil Ditambahkan'];
        } catch(\Exception $e){
            return ['status' => false, 'error' => $e->getMessage()];
        }
    }
    public function edit_benefit($id)
    {
        $benefit = Benefit::find($id);
        if($benefit)
        {
            return response()->json([
                'status' => 200,
                'benefit' => $benefit,
            ]);
        }
        else
        {
            return response()->json([
                'status' => 404,
                'message' => 'gak ada nih'
            ]);
        }
    }
    public function update_benefit(Request $request,$id)
    {
        try {
            $request->validate([
                'name' => 'required',
            ]);

            $update = Benefit::find($id);
            $update->name = $request->name;
            $update->save();

            return ['status' => true, 'pesan' => 'Data Berhasil Diupdate'];
        } catch(\Exception $e) {
            return ['status' => false, 'error' => $e->getMessage()];
        }
    }
    public function destroy_benefit(Benefit $id)
    {
        $data = Benefit::find($id);

        Benefit::destroy($data);
        return redirect()->route('dashboard.benefit');
    }
}
