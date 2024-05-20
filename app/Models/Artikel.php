<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;
    protected $table = 'artikel';
    protected $guarded = ['id'];

    public function kategori_artikel()
    {
        return $this->belongsTo(KategoriArtikel::class);
    }


    public function gambar()
    {
        if ($this->gambar) {
            return asset('storage/' . $this->gambar);
        } else {
            return asset('images/AyamGeprek.png');
        }
    }
}
