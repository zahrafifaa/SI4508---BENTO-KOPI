<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItemOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'nomor',
        'menu_id',
        'jumlah'
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function dashboardCashier()
    {
        return $this->belongsTo(DashboardCashier::class);
    }


}