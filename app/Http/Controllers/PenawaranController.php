<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penawaran;
use Illuminate\Support\Carbon;

class PenawaranController extends Controller
{
    public function terima_penawaran($id)
    {
        $penawaran = Penawaran::find($id);
        $penawaran->status = 'diterima';
        $penawaran->updated_at = Carbon::now();
        $penawaran->save();
        
        return redirect()->route('dashboard.penawaran');
    }
    public function tolak_penawaran(Request $request)
    {
        $request->validate([
            'alasan' => 'required',
            'penawaran_id' => 'required|exists:penawarans,id'
        ]);
        
        $penawaran = penawaran::find($request->penawaran_id);
        $penawaran->status = 'ditolak';
        $penawaran->updated_at = Carbon::now();
        $penawaran->alasan = $request->alasan;
        $penawaran->save();
        
        return response()->json(['status' => true, 'pesan' => 'Pengajuan telah ditolak']);
    }
}
