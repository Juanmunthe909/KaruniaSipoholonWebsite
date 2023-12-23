<?php

namespace App\Http\Controllers\Web;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Toilet;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $food = Product::all();
        $toilet = Toilet::all();
        return view('pages.web.dashboard.main', compact('food', 'toilet'));
    }
}
