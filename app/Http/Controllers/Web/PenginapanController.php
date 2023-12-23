<?php

namespace App\Http\Controllers\Web;

use App\Models\Hotel;
use App\Models\Penginapan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use PDF;
use App\Models\User;
use App\Models\Notification;
use App\Notifications\NewBookingNotification;
use App\Notifications\UpdatePaymentNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class PenginapanController extends Controller
{
    public function index(Request $request)
    {
        $penginapan = Hotel::paginate(10);
        return view('pages.web.hotel.main', compact('penginapan'));
    }

    public function detail($id)
    {
        $hotel = Hotel::find($id);
        return view('pages.web.hotel.detail', compact('hotel'));
    }

    public function history()
    {
        // Periksa apakah pengguna sudah login
        if (Auth::check()) {
            $user = Auth::user();
            $penginapan = Penginapan::where('user_id', $user->id)->get();

            return view('pages.web.hotel.history', compact('penginapan'));
        } else {
            // Redirect ke halaman login jika pengguna belum login
            return redirect('auth');
        }
    }

    public function check(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'hotel_id' => 'required',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'adult' => 'required',
        ], [
            'check_in.required' => 'Tanggal check-in harus diisi.',
            'check_out.required' => 'Tanggal check-out harus diisi.',
            'check_out.after' => 'Tanggal check-out harus setelah tanggal check-in.',
            'adult.required' => 'Jumlah tamu dewasa harus diisi.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ]);
        }
        $hotel = Hotel::findOrFail($request->hotel_id);
        $checkin = Carbon::parse($request->check_in);
        $checkout = Carbon::parse($request->check_out);
        $adult = $request->adult;

        // Validasi tanggal yang sudah dipesan tidak bisa dipesan lagi
        $reservedDates = $hotel->penginapans()
            ->where('checkout_date', '>=', $checkin)
            ->where('checkin_date', '<=', $checkout)
            ->pluck('checkin_date')
            ->toArray();

        $isDateAvailable = true;
        $currentDate = $checkin->copy();

        while ($currentDate <= $checkout) {
            if (in_array($currentDate->toDateString(), $reservedDates)) {
                $isDateAvailable = false;
                break;
            }

            $currentDate->addDay();
        }

        if (!$isDateAvailable) {
            return response()->json([
                'status' => 'error',
                'message' => 'Tanggal yang dipilih sudah dipesan dan tidak tersedia.',
            ]);
        }
        // $children = $request->children;
        $jumlah_kamar_telah_dibooking = $hotel->penginapans()
            ->where('checkin_date', '<=', $checkout)
            ->where('checkout_date', '>=', $checkin)
            ->count('hotel_id');


        $jumlah_kamar_tersedia = $hotel->stock - $jumlah_kamar_telah_dibooking;
        // hitung kapasitas kamar
        // kapasitas 1 kamar yaitu 2 orang dewasa
        $jumlah_kamar_needed = ceil($adult / 2);

        // apabila jumlah kamar tersedia

        if ($jumlah_kamar_tersedia == 0) {
            return response()->json([
                'status' => 'success',
                'isAvailable' => 0,
                'message' => "Kamar tidak tersedia!",
                'hotel' => $hotel,
                'jumlah_kamar_telah_dibooking' => $jumlah_kamar_telah_dibooking,
                'jumlah_kamar_needed' => $jumlah_kamar_needed
            ]);
        }

        if ($jumlah_kamar_tersedia >= $jumlah_kamar_needed) {
            return response()->json([
                'status' => 'success',
                'isAvailable' => 1,
                'message' => "Kamar tersedia! Anda harus memesan " . $jumlah_kamar_needed . " kamar. 1 Kamar hanya bisa ditempati oleh 2 orang dewasa.",
                'hotel' => $hotel,
                'jumlah_kamar_telah_dibooking' => $jumlah_kamar_telah_dibooking,
                'jumlah_kamar_needed' => $jumlah_kamar_needed
            ]);
        }

        // apabila jumlah kamar yang tersedia lebih kecil dari jumlah kamar yang diperlukan
        if ($jumlah_kamar_tersedia < $jumlah_kamar_needed) {
            return response()->json([
                'status' => 'success',
                'isAvailable' => 1,
                'message' => "Kamu butuh " . $jumlah_kamar_needed . " kamar. Namun hanya ada " . $jumlah_kamar_tersedia . " kamar yang tersedia. 1 Kamar hanya bisa ditempati oleh 2 orang dewasa.",
                'hotel' => $hotel,
                'jumlah_kamar_telah_dibooking' => $jumlah_kamar_telah_dibooking,
                'jumlah_kamar_needed' => $jumlah_kamar_needed
            ]);
        }
    }

    public function book(Request $request)
    {
        $hotelId = $request->input('hotel_id');
        $price = $request->input('price');
        $checkin = $request->input('checkin');
        $checkout = $request->input('checkout');
        $adults = $request->input('adults');
        // $children = $request->input('children');
        $hotel = Hotel::findOrFail($hotelId);
        $price = $hotel->price * $hotel->getDays($checkin, $checkout);
        return view('pages.web.hotel.booking', compact('hotelId', 'price', 'checkin', 'checkout', 'adults', 'price'));
    }

    public function storeReservation(Request $request)
    {

        $hotelId = $request->hotel_id;
        $price = $request->price;
        $checkin = Carbon::createFromFormat('m/d/Y', $request->checkin)->format('Y-m-d');
        $checkout = Carbon::createFromFormat('m/d/Y', $request->checkout)->format('Y-m-d');
        $adults = $request->adults;
        // $children = $request->children;

        $penginapan = new Penginapan();
        $penginapan->hotel_id = $hotelId;
        $penginapan->user_id = auth()->user()->id; // Assuming you have authentication implemented
        $penginapan->checkin_date = $checkin;
        $penginapan->checkout_date = $checkout;
        $penginapan->adults = $adults;
        // $penginapan->children = $children;
        $penginapan->total_price = $price;
        $penginapan->save();

        $notification = new Notification;
        $notification->user_id = 2;
        $notification->message = 'mendapatkan Pesanan Kamar dari  ' . Auth::user()->name;
        $notification->type = 'success';
        $notification->save();

        $user = User::find(Auth::user()->id);
        $user->fullname = $request->fullname;
        $user->phone = $request->phone;
        $user->no_ktp = $request->no_ktp;
        $user->save();

        return redirect()->route('web.penginapan.create', $penginapan->id)->with('success', 'Berhasil melakukan Pemesanan');
        // return redirect()->route('reservation.confirmation', $reservation->id);
    }

    public function create(Request $request, $id)
    {
        // $validator = Validator::make($request->all(), [
        //     // 'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);
        // if ($validator->fails()) {
        //     return response()->json([
        //         'message' => 'Bukti pembayaran tidak valid.'
        //     ], 422);
        // }

        $penginapan = Penginapan::findOrFail($id);
        $number = $penginapan->id;
        // $file = $request->file('file');
        // $fileName = 'PAYMENT-PROOF-' . $number . '.' . $file->getClientOriginalExtension();
        // $file->move(public_path('images/payment-proofs'), $fileName);
        $penginapan = Penginapan::findOrFail($id);

        // $reservation->update([
        //     'status' => 'completed',
        //     'payment_status' => '1', // '1' = 'pending
        //     // 'payment_proof' => $fileName,
        // ]);


        // send notification
        // $reservation->hotel->owner->notify(new UpdatePaymentNotification($reservation));

        // return response()->json([
        //     'status' => 'success',
        //     'message' => 'Pemesanan berhasil diselesaikan.'
        // ]);
        return view('pages.web.hotel.create', compact('penginapan'));
    }

    public function updatePayment(Request $request)
    {
        // $validators = Validator::make($request->all(), [
        //     'payment_proof' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);
        $request->validate([
            'payment_proof' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // if ($validators->fails()) {
        //     return response()->json([
        //         'alert' => 'error',
        //         'message' => $validators->errors()->first(),
        //     ]);
        // }

        $order = Penginapan::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->first();
        $file = $request->file('payment_proof');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images/bukti_pembayaran'), $filename);
        $order->payment_proof = $filename;
        $order->save();

        // return response()->json([
        //     'alert' => 'success',
        //     'message' => 'Bukti pembayaran berhasil diupload',
        // ]);
        return view('pages.web.hotel.payment', compact('order'))->with('success', 'Bukti pembayaran berhasil diupload');
    }

    public function pdf($id)
    {
        // $coupons = Coupon::where('id', $order->coupon_id)->get();/
        $penginapan = Penginapan::findOrFail($id);
        $pdf = PDF::loadView('pages.web.hotel.pdf', [
            'penginapan' => $penginapan,
            // 'coupons' => $coupons
        ]);
        // return $pdf->stream();

        return $pdf->download($penginapan->created_at->format('d-m-Y') . '.pdf');
    }
}
