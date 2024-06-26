<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'kategori',
        'jenis',
        'deskripsi',
        'harga',
        'gambar'
        // 'admin_id'
    ];

    public function cartitem()
    {
        return $this->belongsTo(CartItem::class);
    }

    public function cartItemsOrder()
    {
        return $this->belongsTo(CartItemOrder::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function admin(): BelongsTo
    // {
    //     return $this->belongsTo(Admin::class);
    // }
}
