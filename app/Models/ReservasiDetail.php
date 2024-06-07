<?php

namespace App\Models;

use App\Models\Reservasi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReservasiDetail extends Model
{
    use HasFactory;
    protected $table  = 'reservasi_detail';
    protected $guarded = ['id'];

    public function reservasi()
    {
        return $this->belongsTo(Reservasi::class);
    }

    public function meja()
    {
        return $this->belongsTo(Meja::class);
    }
}
