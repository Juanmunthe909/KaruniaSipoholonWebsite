<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\Category;
use App\Models\PemesananDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Toilet extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'cover',
        'price',
        'stock',
        'date',
        'time',
        'description',
        'category',

    ];

    public function pemandians()
    {
        return $this->hasMany(Pemandian::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function pemesananDetails()
    {
        return $this->belongsTo(PemesananDetail::class);
    }
}
