<?php

namespace App\Http\Controllers\Web;

use PDF;
use App\Helpers\Helper;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;
use App\Models\Pemesanan;
use App\Models\Province;
use App\Models\PemesananDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{
    public function customer(Request $request)
    {
        return view('pages.web.checkout.customer');
    }

    public function updateCustomer(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'fullname' => 'required',
            'phone' => 'required',
            'no_ktp' => 'required',
            // 'address' => 'required',
            // 'city' => 'required',
            // 'postal_code' => 'required'
        ]);

        if ($validators->fails()) {
            return response()->json([
                'alert' => 'error',
                'message' => $validators->errors()->first(),
            ]);
        }

        $user = User::find(Auth::user()->id);
        $user->fullname = $request->fullname;
        $user->phone = $request->phone;
        $user->no_ktp = $request->no_ktp;
        // $user->address = $request->address;
        // $user->city = $request->city;
        // $user->postal_code = $request->postal_code;
        $user->save();

        return response()->json([
            'alert' => 'success',
            'message' => 'Data berhasil disimpan',
        ]);
    }

    public function history()
    {
        // Periksa apakah pengguna sudah login
        if (Auth::check()) {
            $user = Auth::user();
            $pemesanan = Pemesanan::where('user_id', $user->id)->get();

            return view('pages.web.checkout.history', ['pemesanan' => $pemesanan]);
        } else {
            // Redirect ke halaman login jika pengguna belum login
            return redirect('auth');
        }
    }

    public function payment()
    {
        return view('pages.web.checkout.payment');
    }

    public function updatePayment(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validators->fails()) {
            return response()->json([
                'alert' => 'error',
                'message' => $validators->errors()->first(),
            ]);
        }

        $pemesanan = Pemesanan::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->first();
        $file = $request->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images/bukti_pembayaran'), $filename);
        $pemesanan->image = $filename;
        $pemesanan->save();

        return response()->json([
            'alert' => 'success',
            'message' => 'Bukti pembayaran berhasil diupload',
        ]);
    }
    public function checkout(Request $request)
    {

        if (!Auth::check()) {
            // If the user is not logged in, redirect them to the login page
            return redirect()->route('login')->with('error', 'You need to login first to proceed with checkout.');
        }

        $cart = Cart::where('user_id', Auth::user()->id)->get();
        $total = 0;

        foreach ($cart as $c) {
            $total = $total + ($c->quantity * $c->product->price);
        }
        if ($request->payment != 'Cash') {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $pemesanan = new Pemesanan();
            $pemesanan->code = Helper::IDGenerator();
            $pemesanan->user_id = Auth::user()->id;
            // $pemesanan->pemesanan_id = $request->pemesanan_id;
            $pemesanan->total = $total;
            $pemesanan->payment = $request->payment;
            // $pemesanan->delivery = $request->shippingMethod;
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/bukti_pembayaran'), $filename);
            $pemesanan->image = $filename;
            $pemesanan->save();
            $cart = Cart::where('user_id', Auth::user()->id)->get();
            foreach ($cart as $c) {
                $pemesanan_detail = new PemesananDetail;
                $pemesanan_detail->transaksipemesanan_id = $pemesanan->id;
                $pemesanan_detail->product_id = $c->product_id;
                $pemesanan_detail->quantity = $c->quantity;
                $pemesanan_detail->save();
                $product = Product::find($c->product_id);
                $product->stock = $product->stock - $c->quantity;
                $product->update();
            }
        } else {
            $pemesanan = new Pemesanan();
            $pemesanan->code = Helper::IDGenerator();
            $pemesanan->user_id = Auth::user()->id;
            $pemesanan->total = $total;
            $pemesanan->payment = $request->payment;
            $pemesanan->save();
            $cart = Cart::where('user_id', Auth::user()->id)->get();
            foreach ($cart as $c) {
                $pemesanan_detail = new PemesananDetail;
                $pemesanan_detail->transaksipemesanan_id = $pemesanan->id;  
                $pemesanan_detail->product_id = $c->product_id;
                $pemesanan_detail->quantity = $c->quantity;
                $pemesanan_detail->save();
                $product = Product::find($c->product_id);
                $product->stock = $product->stock - $c->quantity;
                $product->update();
            }
        }
        $notification = new Notification;
        $notification->user_id = 2;
        $notification->message = 'Anda mendapatkan Pesanan! Kode ' . $pemesanan->code;
        $notification->type = 'success';
        $notification->save();

        
        Cart::where('user_id', Auth::user()->id)->delete();

        return view('pages.web.checkout.detail', ['pemesanan' => $pemesanan]);
    }
    public function pdf($id)
    {
        // $pemesanan = Pemesanan::with('user')->get();
        $pemesanan = Pemesanan::findOrFail($id);
        $pdf = PDF::loadView('pages.web.checkout.pdf', compact('pemesanan'));
        // 'coupons' => $coupons
        // return $pdf->stream();
        return $pdf->download($pemesanan->code . ' - ' . $pemesanan->created_at->format('d-m-Y') . '.pdf');
    }
}
