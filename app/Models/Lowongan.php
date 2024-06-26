<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    use HasFactory;
    protected $table = 'lowongan';
    protected $guarded = ['id'];

    public function gambar()
    {
        if ($this->gambar) {
            return asset('storage/' . $this->gambar);
        } else {
            return asset('images/AyamGeprek.png');
        }
    }

    protected $casts = [
        'tanggal_buka' => 'datetime',
        'tanggal_tutup' => 'datetime',
    ];

    public function status()
    {
        if ($this->status == 0) {
            return '<span class="badge badge-danger">Tidak Aktif</span>';
        } else {
            return '<span class="badge badge-success">Aktif</span>';
        }
    }
}
//selesai