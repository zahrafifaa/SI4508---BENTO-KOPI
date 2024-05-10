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
<<<<<<< HEAD
            return asset('images/AyamGeprek.png');
=======
            return asset('images/bentoKopi1.png');
>>>>>>> 2fd7998b261c423801df0cf4ef1a18af34189db7
        }
    }

    protected function casts(): array
    {
        return [
            'tanggal_buka' => 'datetime',
            'tanggal_tutup' => 'datetime',

        ];
    }
}
