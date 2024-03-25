<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table_Info extends Model
{
    use HasFactory;

    protected $fillable = [
        'Capacity',
        'TableArea'
    ];
}
