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
        'deskripsi',
        'harga',
        'gambar'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function favorites(){

    }
}