<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderTable extends Model
{
    use HasFactory;

    protected $fillable = ['cart_id','special_message'];

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cart_id');
    }

    public function dashboardcashier()
    {
        return $this->belongsTo(DashboardCashier::class);
    }

    
}
