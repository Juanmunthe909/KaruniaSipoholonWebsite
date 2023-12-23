<?php

namespace App\Http\Controllers\Web;

use App\Models\Product;
use App\Models\KritikSaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class KritikSaranController extends Controller
{
    public function index(Request $request)
    {
        // if ($request->ajax()) {
        //     $products = Product::where('title', 'like', '%' . $request->keyword . '%')
        //         ->orWhere('description', 'like', '%' . $request->keyword . '%')
        //         ->paginate(10);
        //     return view('pages.web.dashboard.list', compact('products'));
        // }
        return view('pages.web.kritiksaran.main');
    }
    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'kritik_saran' => 'required|string',
        ]);

        if ($validatedData->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validatedData->errors()->first()
            ]);
        }

        $kritikSaran = new KritikSaran();
        $kritikSaran->user_id = Auth::user()->id;
        $kritikSaran->kritik_saran = $request->kritik_saran;
        $kritikSaran->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Kritik dan saran berhasil ditambahkan!',
        ]);
    }
}
