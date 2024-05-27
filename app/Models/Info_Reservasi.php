<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info_Reservasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'no_telp',
        'tgl_reservasi',
        'wkt_reservasi',
        'jml_pengunjung',
        'available'
    ];
}
