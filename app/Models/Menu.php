<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'kategori',
        'gambar',
        'deskripsi',
        'harga',
        'gambar'
    ];

    public function cartitem()
    {
        return $this->belongsTo(CartItem::class);
    }
}