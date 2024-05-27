<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info_Meja extends Model
{
    use HasFactory;

    protected $fillable = [
        'kapasitas',
        'area_meja'
    ];
}
