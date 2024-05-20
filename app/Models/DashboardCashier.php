<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DashboardCashier extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'timestamps'];

    public function orderTable()
    {
        return $this->hasMany(OrderTable::class, 'ordertable_id');
    }

    public function cartItemsOrder()
    {
        return $this->hasMany(CartItemOrder::class);
    }
}
