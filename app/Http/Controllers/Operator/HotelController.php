<?php

namespace App\Http\Controllers\Operator;

use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Penginapan;
use App\Models\Kas;
use Carbon\Carbon;
use PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HotelController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // $hotel = penginapan::where('title', 'like', '%' . $request->keyword . '%')
            //     ->orWhere('description', 'like', '%' . $request->keyword . '%')
            //     ->orWhere('price', 'like', '%' . $request->keyword . '%')
            //     ->orWhere('stock', 'like', '%' . $request->keyword . '%')
            //     ->orWhere('category', 'like', '%' . $request->keyword . '%')
            //     ->paginate(10);
            $hotel = Penginapan::paginate(10);
            return view('pages.operator.hotel.list', compact('hotel'));
        }
        return view('pages.operator.hotel.main');
    }

    public function create()
    {
        $hotel = Hotel::get();
        return view('pages.operator.hotel.create', compact('hotel'));
    }

    public function show(Penginapan $penginapan)
    {
        return view('pages.operator.orders.show', compact('penginapan'));
    }

    public function accept(Penginapan $penginapan)
    {
        $penginapan->status = 'accepted';
        $penginapan->save();

        // Ambil data dari tabel "penginapan" berdasarkan id
        $penginapanData = $penginapan->toArray();

        // Ambil waktu server saat ini menggunakan Carbon
        $inout_date = Carbon::now();

        // Buat model "Kas" baru dengan menggunakan data dari tabel "penginapan"
        $kas = new Kas();
        $kas->inout_date = $inout_date;
        $kas->in_out = 'in';
        $kas->amount = $penginapanData['total_price'];
        $kas->transaction_type = 'Penginapan';
        // $kas->id_source = $penginapanData['id'];
        // $kas->status = 'valid';

        // Simpan data ke tabel "kas"
        $kas->save();

        return response()->json([
            'alert' => 'success',
            'message' => 'Pesanan berhasil diterima',
        ]);
    }
    public function makePenginapan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'hotel_id' => 'required',
            'checkin_date' => 'required',
            'checkout_date' => 'required',
            'adults' => 'required',
            // 'children' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ]);
        }

        $hotel = Hotel::find($request->hotel_id);

        $penginapan = new Penginapan();
        $penginapan->hotel_id = $hotel->id;
        $penginapan->user_id = Auth::user()->id;
        $penginapan->checkin_date = $request->checkin_date;
        $penginapan->checkout_date = $request->checkout_date;
        $penginapan->adults = $request->adults;
        // $penginapan->children = $request->children;
        $penginapan->total_price = $hotel->price * $request->adults;
        $penginapan->payment_proof = 'Cash';
        $penginapan->status = 'pending';
        $penginapan->save();

        return response()->json([
            'alert' => 'success',
            'message' => 'Pesanan berhasil dibuat',
            'redirect' => route('operator.hotel.index')
        ]);
    }

    public function reject(Penginapan $penginapan)
    {
        $penginapan->status = 'rejected';
        $penginapan->save();

        return response()->json([
            'alert' => 'success',
            'message' => 'Pesanan berhasil ditolak',
        ]);
    }
    public function finish(Penginapan $penginapan)
    {
        $penginapan->status = 'completed';
        $penginapan->save();

        return response()->json([
            'alert' => 'success',
            'message' => 'Pesanan berhasil diselesaikan',
        ]);
    }

    public function destroy(Penginapan $penginapan)
    {
        $penginapan->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Pesanan berhasil dihapus',
        ]);
    }

    public function pdf()
    {
        $now = Carbon::now()->translatedFormat('l, d F Y');
        $penginapans = Penginapan::orderBy('created_at', 'DESC')->get();
        $pdf = PDF::loadView('pages.operator.hotel.pdf', ['penginapans' => $penginapans]);
        // return $pdf->stream();
        return $pdf->download($now . '.pdf');
    }
}