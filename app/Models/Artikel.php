<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;
    protected $table = 'artikel';
    protected $guarded = ['id'];

    public function kategori()
    {
        return $this->belongsTo(KategoriArtikel::class, 'kategori_artikel_id', 'id');
    }

    public function gambar()
    {
        if ($this->gambar) {
            return asset('storage/' . $this->gambar);
        } else {
            return asset('assets/images/faces/face1.jpg');
        }
    }
}
