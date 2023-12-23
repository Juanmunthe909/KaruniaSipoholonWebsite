<?php

namespace App\Http\Controllers\Admin;

use PDF;
use Carbon\Carbon;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Middleware\User;
use App\Models\Pemandian;
use App\Models\Penginapan;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $pemesanans = Pemesanan::where('user_id', auth()->guard('web')->user()->id)
                ->where('status', 'like', '%' . $request->keyword . '%')
                ->orWhere('total', 'like', '%' . $request->keyword . '%')
                ->orWhere('created_at', 'like', '%' . $request->keyword . '%')
                ->paginate(10);

            $penginapan = Penginapan::with('hotel')->get();

            $pemandian = Pemandian::with('toilet')->get();

            // $data = User::with('toilet');
            return view('pages.admin.orders.list', compact('pemesanans', 'penginapan', 'pemandian'));
        }
        return view('pages.admin.orders.main');
    }

    public function show(Pemesanan $pemesanan)
    {
        return view('pages.admin.pemesanans.show', compact('pemesanan'));
    }

    public function pdf()
    {
        $now = Carbon::now()->translatedFormat('l, d F Y');
        $pemesanans = Pemesanan::orderBy('created_at', 'DESC')->get();
        $pdf = PDF::loadView('pages.admin.orders.pdf', ['pemesanans' => $pemesanans]);
        // return $pdf->stream();
        return $pdf->download($now . '.pdf');
    }
}
