<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DashboardKollab extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'Judul',
        'Detail',
        'Gambar',
        'Tanggal',
        'Status'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getTanggalAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d/m/Y');
    }

}
