<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Pemesanan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PemesananDetail extends Model
{
    use HasFactory;

    protected $table = 'transaksipemesanan_details';
    protected $guarded = [''];

    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getPriceAttribute()
    {
        return $this->product->price * $this->quantity;
    }
}
