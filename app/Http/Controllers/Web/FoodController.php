<?php

namespace App\Http\Controllers\Web;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FoodController extends Controller
{
    public function index(Request $request)
    {
        $food = Product::paginate(9);
        return view('pages.web.food.main', compact('food'));
    }

    public function detail($id)
    {
        $food = Product::find($id);
        return view('pages.web.food.detail', compact('food'));
    }

    public function check(Product $food)
    {
        return view('pages.web.food.check', compact('food'));
    }
}
