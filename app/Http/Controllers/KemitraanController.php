<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mitra;
use Illuminate\Support\Carbon;

class KemitraanController extends Controller
{
    public function terima_mitra($id)
    {
        $mitra = Mitra::find($id);
        $mitra->status = 'diterima';
        $mitra->updated_at = Carbon::now();
        $mitra->save();
        
        return redirect()->route('dashboard.mitra');
    }
    public function tolak_mitra(Request $request)
    {
        $request->validate([
            'alasan' => 'required',
            'mitra_id' => 'required|exists:mitras,id'
        ]);
        
        $mitra = Mitra::find($request->mitra_id);
        $mitra->status = 'ditolak';
        $mitra->updated_at = Carbon::now();
        $mitra->alasan = $request->alasan;
        $mitra->save();
        
        return response()->json(['status' => true, 'pesan' => 'Pengajuan telah ditolak']);
    }
}
