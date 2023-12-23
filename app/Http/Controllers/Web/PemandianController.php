<?php

namespace App\Http\Controllers\Web;

use Carbon\Carbon;
use App\Models\Toilet;
use App\Models\Pemandian;
use Illuminate\Support\Js;
use App\Models\User;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use PDF;
use Illuminate\Support\Facades\Validator;

class PemandianController extends Controller
{
    public function index(Request $request)
    {
        $toilet = Toilet::paginate(11);
        return view('pages.web.booking.main', compact('toilet'));
    }

    public function history()
    {
        // Periksa apakah pengguna sudah login
        if (Auth::check()) {
            $user = Auth::user();
            $pemandian = Pemandian::where('user_id', $user->id)->get();

            return view('pages.web.booking.history', compact('pemandian'));
        } else {
            // Redirect ke halaman login jika pengguna belum login
            return redirect('auth');
        }
    }

    public function detail($id)
    {
        $toilet = Toilet::find($id);
        return view('pages.web.booking.detail', compact('toilet'));
    }

    public function check(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'book_date' => 'required|date|after_or_equal:today|unique:transaksipemandians,book_date,NULL,id,toilet_id,' . $request->toilet_id,
            'book_time' => 'required',
            'person' => 'required',
        ], [
            'book_date.required' => 'Tanggal booking harus diisi.',
            'book_date.after_or_equal' => 'Tanggal booking harus setelah atau sama dengan hari ini.',
            'book_date.unique' => 'Toilet sudah dibooking pada tanggal tersebut.',
            'book_time.required' => 'Waktu booking harus diisi.',
            'person.required' => 'Jumlah orang harus diisi.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first()
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Booking tersedia pada tanggal dan waktu tersebut'
        ]);
    }

    public function book(Request $request)
    {
        $toiletId = $request->input('toilet_id');
        $bookDate = $request->input('book_date');
        $bookTime = $request->input('book_time');
        $person = $request->input('person');
        $toilet = Toilet::find($toiletId);
        $price = $toilet->price;

        return view('pages.web.booking.booking', compact('toiletId', 'bookDate', 'bookTime', 'person', 'price'));
    }

    public function storeReservation(Request $request)
    {
        $toiletId = $request->toilet_id;
        $price = $request->price;
        $bookDate = Carbon::parse($request->bookDate)->format('Y-m-d');
        $bookTime = $request->bookTime;
        $person = $request->person;

        $pemandian = new Pemandian();
        $pemandian->toilet_id = $toiletId;
        $pemandian->user_id = auth()->user()->id;
        $pemandian->book_date = $bookDate;
        $pemandian->book_time = $bookTime;
        $pemandian->person = $person;
        $toilet = Toilet::find($toiletId);
        $pemandian->total_price = stripos(strtolower($toilet->title), 'kolam') !== false ? $price * $person : $price;
        $pemandian->save();

        $notification = new Notification;
        $notification->user_id = 2;
        $notification->message = 'Mendapatkan Pesanan Kamar dari ' . Auth::user()->name;
        $notification->type = 'success';
        $notification->save();


        $user = User::find(Auth::user()->id);
        $user->fullname = $request->fullname;
        $user->phone = $request->phone;
        $user->no_ktp = $request->no_ktp;
        $user->save();

        return redirect()->route('web.pemandian.create', $pemandian->id)->with('success', 'Booking Berhasil Dibuat dan Data Pengguna Diperbarui');
    }


    public function create(Request $request, $id)
    {

        $pemandian = Pemandian::findOrFail($id);
        $number = $pemandian->id;
        $pemandian = Pemandian::findOrFail($id);

        return view('pages.web.booking.create', compact('pemandian'));
    }
    public function updatePayment(Request $request)
    {
        $request->validate([
            'payment_proof' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $order = Pemandian::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->first();
        $file = $request->file('payment_proof');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images/bukti_pembayaran'), $filename);
        $order->payment_proof = $filename;
        $order->save();

        return view('pages.web.booking.payment', compact('order'))->with('success', 'Bukti pembayaran berhasil diupload');
    }

    public function pdf($id)
    {
        // $coupons = Coupon::where('id', $order->coupon_id)->get();/
        $pemandian = Pemandian::findOrFail($id);
        $pdf = PDF::loadView('pages.web.booking.pdf', [
            'pemandian' => $pemandian,
            // 'coupons' => $coupons
        ]);
        // return $pdf->stream();

        return $pdf->download($pemandian->created_at->format('d-m-Y') . '.pdf');
    }
}
