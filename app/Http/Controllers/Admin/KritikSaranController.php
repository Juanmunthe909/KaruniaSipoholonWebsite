<?php

namespace App\Http\Controllers\Admin;

use App\Models\KritikSaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class KritikSaranController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $kritikSaran = KritikSaran::with('user')->paginate(10);
            return view('pages.admin.kritiksaran.list', compact('kritikSaran'));
        }
        return view('pages.admin.kritiksaran.main');
    }
    

    public function destroy(KritikSaran $kritik_saran)
    {
        $kritik_saran->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Kritik dan Saran berhasil dihapus',
        ]);
    }
}
