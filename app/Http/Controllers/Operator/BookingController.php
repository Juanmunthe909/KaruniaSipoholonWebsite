<?php

namespace App\Http\Controllers\Operator;

use PDF;
use Carbon\Carbon;
use App\Models\Toilet;
use App\Models\Pemandian;
use App\Models\Kas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class BookingController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $pemandian = Pemandian::where('user_id', 'like', '%' . $request->keyword . '%')
                ->orWhere('toilet_id', 'like', '%' . $request->keyword . '%')
                // ->orWhere('username', 'like', '%' . $request->keyword . '%')
                ->orWhere('book_date', 'like', '%' . $request->keyword . '%')
                ->orWhere('book_time', 'like', '%' . $request->keyword . '%')
                ->orWhere('person', 'like', '%' . $request->keyword . '%')
                ->orWhere('status', 'like', '%' . $request->keyword . '%')
                ->latest()->paginate(10);
            return view('pages.operator.booking.list', compact('pemandian'));
        }
        return view('pages.operator.booking.main');
    }


    public function create()
    {
        $toilet = Toilet::get();
        return view('pages.operator.booking.create', compact('toilet'));
    }

    // public function show(Booking $booking)
    // {
    //     return view('pages.admin.booking.show', compact('booking'));
    // }

    public function accept(Pemandian $pemandian)
    {
        $pemandian->status = 'accepted';
        $pemandian->save();

        // Ambil data dari tabel "pemandian" berdasarkan id
        $pemandianData = $pemandian->toArray();

        // Ambil waktu server saat ini menggunakan Carbon
        $inout_date = Carbon::now();

        // Buat model "Kas" baru dengan menggunakan data dari tabel "pemandian"
        $kas = new Kas();
        $kas->inout_date = $inout_date;
        $kas->in_out = 'in';
        $kas->amount = $pemandianData['total_price'];
        $kas->transaction_type = 'Pemandian';
        // $kas->id_source = $pemandianData['id'];
        // $kas->status = 'valid';

        // Simpan data ke tabel "kas"
        $kas->save();

        return response()->json([
            'alert' => 'success',
            'message' => 'Pesanan berhasil diterima',
        ]);
    }

    public function reject(Pemandian $pemandian)
    {
        $pemandian->status = 'rejected';
        $pemandian->save();

        return response()->json([
            'alert' => 'success',
            'message' => 'Pesanan berhasil ditolak',
        ]);
    }

    public function destroy(Pemandian $pemandian)
    {
        $pemandian->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Pesanan berhasil dihapus',
        ]);
    }
    public function makeBooking(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'toilet_id' => 'required',
            'book_date' => 'required',
            'book_time' => 'required',
            'person' => 'required',
        ]);


        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ]);
        }

        $toilet = Toilet::find($request->toilet_id);

        $pemandian = new Pemandian();
        $pemandian->toilet_id = $toilet->id;
        $pemandian->user_id = Auth::user()->id;
        $pemandian->book_date = $request->book_date;
        $pemandian->book_time = $request->book_time;
        $pemandian->person = $request->person;
        $pemandian->status = 'pending';
        $pemandian->total_price = $toilet->price * $request->person;
        $pemandian->payment_proof = 'Cash';
        $pemandian->save();

        return response()->json([
            'alert' => 'success',
            'message' => 'Pesanan berhasil dibuat',
            'redirect' => route('operator.booking.index')
        ]);
    }

    public function finish(Pemandian $pemandian)
    {
        $pemandian->status = 'Completed';
        $pemandian->save();

        return response()->json([
            'alert' => 'success',
            'message' => 'Pesanan berhasil diselesaikan',
        ]);
    }

    public function PDF()
    {
        $pemandian = Pemandian::all();
        $pdf = PDF::loadview('pages.operator.booking.pdf', compact('pemandian'));

        return $pdf->download('laporan-booking.pdf');
    }
}
