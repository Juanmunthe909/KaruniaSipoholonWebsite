<?php

namespace App\Http\Controllers\Web;;

use App\Models\Cart;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function notif()
    {
        $subtotal = 0;
        $total = 0;
        $output = '';
        $cart = Cart::where('user_id', Auth::user()->id)->get();
        if ($cart->count() > 0) {
            $subtotal = 0;
            $total = 0;

            foreach ($cart as $c) {
                $subtotal = $c->product->price * $c->quantity;
                $output .=
                    ' <div class="cart-food">
                    <div class="detail">
                        <img src="' . asset('images/food/' . $c->product->cover) . '" alt="">
                        <div class="text">
                            <a href="#.">' . $c->product->title . '</a>
                            <p>' . $c->quantity . ' x ' . $c->product->price . '</p>
                        </div>
                    </div>
                    <a href="javscript:;" onclick="remove_cart(\'Apakah Anda Yakin?\' , \'Yakin\',\'Tidak\' , \'DELETE\' , \'' . route('web.cart.delete', $c->id) . '\');" class="cross"><i class="icon-cancel2"></i></a>
                </div>
                ';
                $total = $total + $subtotal;
            }
        } else {
            $output .=
                ' <div class="cart-food">
                <div class="detail">
                    <div class="text">
                        <a href="#.">Keranjang Kosong</a>
                    </div>
                </div>
            </div>

            ';
        }
        return response()->json([
            'collection' => $output,
            'subtotal' => number_format($subtotal),
            'total' => number_format($total),
            'total_item' => $cart->count(),
        ]);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            // $provinces = Province::all();
            $count = Cart::where('user_id', Auth::user()->id)->count();
            $carts = Cart::where('user_id', Auth::user()->id)->get();
            return view('pages.web.cart.list', compact('carts', 'count'));
        }
        return view('pages.web.cart.main');
    }

    public function store(Request $request)
    {
        $cart = Cart::where('user_id', Auth::user()->id)->where('product_id', $request->product_id)->first();
        $product = \App\Models\Product::find($request->product_id);
        if ($product->stock < $request->quantity) {
            return response()->json([
                'alert' => 'error',
                'message' => 'Jumlah produk melebihi stok',
            ]);
        }
        if ($cart) {
            $cart->quantity = $cart->quantity + $request->quantity;
            $cart->save();
        } else {
            $cart = new Cart();
            $cart->user_id = Auth::user()->id;
            $cart->product_id = $request->product_id;
            $cart->quantity = $request->quantity;
            $cart->save();
        }

        return response()->json([
            'alert' => 'success',
            'message' => 'Berhasil menambahkan ke keranjang',
        ]);
    }

    public function update(Request $request, Cart $cart)
    {
        $request->validate([
            'quantity' => 'required',
        ]);
        if ($cart->quantity < $cart->product->stock) {
            $cart->quantity = $request->quantity;
            $cart->save();
            return response()->json([
                'quantity' => $cart->quantity,
                'subtotal' => number_format($request->quantity * $cart->product->price),
            ]);
        } else {
            return response()->json([
                'quantity' => $cart->quantity,
                'subtotal' => number_format($cart->quantity * $cart->product->price),
            ]);
        }
    }

    public function increase(Cart $cart)
    {
        if ($cart->quantity < $cart->product->stock) {
            $cart->quantity = $cart->quantity + 1;
            $cart->update();
            return response()->json([
                'quantity' => $cart->quantity,
                'message' => 'Berhasil menambahkan stok',
                'subtotal' => number_format($cart->quantity * $cart->product->price),
            ]);
        } else {
            return response()->json([
                'quantity' => $cart->quantity,
                'message' => 'Stok tidak mencukupi',
                'subtotal' => number_format($cart->quantity * $cart->product->price),
            ]);
        }
    }

    public function decrease(Cart $cart)
    {
        if ($cart->quantity > 1) {
            $cart->quantity = $cart->quantity - 1;
            $cart->update();
            return response()->json([
                'quantity' => $cart->quantity,
                'message' => 'Berhasil mengurangi jumlah pesanan',
                'subtotal' => number_format($cart->quantity * $cart->product->price),
            ]);
        } else {
            return response()->json([
                'quantity' => $cart->quantity,
                'message' => 'Stok tidak boleh kurang dari 1',
                'subtotal' => number_format($cart->quantity * $cart->product->price),
            ]);
        }
    }
    public function destroy(Cart $cart)
    {
        $cart->delete();
        $count = Cart::where('user_id', Auth::user()->id)->count();
        return response()->json([
            'alert' => 'success',
            'total_item' => $count,
            'message' => 'Berhasil menghapus dari keranjang',
        ]);
    }
}
