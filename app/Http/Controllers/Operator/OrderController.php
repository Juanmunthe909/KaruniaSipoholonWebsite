<?php

namespace App\Http\Controllers\Operator;

use App\Helpers\Helper;
use PDF;
use App\Models\Kas;
use App\Models\Pemesanan;
use App\Models\PemesananDetail;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $pemesanan = Pemesanan::where('user_id', 'like', '%' . $request->keyword . '%')
                ->orWhere('status', 'like', '%' . $request->keyword . '%')
                ->orWhere('created_at', 'like', '%' . $request->keyword . '%')
                ->latest()
                ->paginate(10);
            return view('pages.operator.orders.list', compact('pemesanan'));
        }
        return view('pages.operator.orders.main');
    }

    public function create()
    {
        $product = Product::get();
        return view('pages.operator.orders.create', compact('product'));
    }

    public function show(Pemesanan $pemesanan)
    {

        return view('pages.operator.orders.show', compact('pemesanan'));
    }

    public function accept(Pemesanan $pemesanan)
    {
        $pemesanan->status = 'accepted';
        $pemesanan->save();

        // Ambil data dari tabel "penginapan" berdasarkan id
        $pemesananData = $pemesanan->toArray();

        // Ambil waktu server saat ini menggunakan Carbon
        $inout_date = Carbon::now();

        // Buat model "Kas" baru dengan menggunakan data dari tabel "pemesanan"
        $kas = new Kas();
        $kas->inout_date = $inout_date;
        $kas->in_out = 'in';
        $kas->amount = $pemesananData['total'];
        $kas->transaction_type = 'Pemesanan Makanan';
        // $kas->id_source = $pemesananData['id'];
        // $kas->status = 'valid';

        // Simpan data ke tabel "kas"
        $kas->save();

        return response()->json([
            'alert' => 'success',
            'message' => 'Pesanan berhasil diterima',
        ]);
    }

    public function makeOrder(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'quantity' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ]);
        }


        $product = Product::find($request->product_id);

        $pemesanan = new Pemesanan();
        $pemesanan->user_id = Auth::user()->id;
        $pemesanan->code = Helper::IDGenerator();
        $pemesanan->payment = 'Cash';
        $pemesanan->status = 'pending';
        $pemesanan->total = $product->price * $request->quantity;
        $pemesanan->save();

        $pemesananDetail = new PemesananDetail();
        $pemesananDetail->transaksipemesanan_id = $pemesanan->id;
        $pemesananDetail->product_id = $request->product_id;
        $pemesananDetail->quantity = $request->quantity;
        $pemesananDetail->save();

        return response()->json([
            'alert' => 'success',
            'message' => 'Pesanan berhasil dibuat',
            'redirect' => route('operator.order.index')
        ]);
    }

    public function reject(Pemesanan $pemesanan)
    {
        $pemesanan->status = 'rejected';
        $pemesanan->save();

        return response()->json([
            'alert' => 'success',
            'message' => 'Pesanan berhasil ditolak',
        ]);
    }
    public function finish(Pemesanan $pemesanan)
    {
        $pemesanan->status = 'completed';
        $pemesanan->save();

        return response()->json([
            'alert' => 'success',
            'message' => 'Pesanan berhasil diselesaikan',
        ]);
    }

    public function destroy(Pemesanan $pemmesanan)
    {
        $pemmesanan->delete();
        
        return response()->json([
            'alert' => 'success',
            'message' => 'Pesanan berhasil dihapus',
        ]);
    }

    public function pdf()
    {
        $now = Carbon::now()->translatedFormat('l, d F Y');
        $pemesanan = Pemesanan::orderBy('created_at', 'DESC')->get();
        $pdf = PDF::loadView('pages.operator.orders.pdf', ['pemesanan' => $pemesanan]);
        // return $pdf->stream();
        return $pdf->download($now . '.pdf');
    }
}
