<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemandian extends Model
{
    use HasFactory;

    protected $guardedd = [''];
    protected $table = 'transaksipemandians';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function toilet()
    {
        return $this->belongsTo(Toilet::class);
    }
}
