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
            return asset('images/bentoKopi1.png');
=======
            return asset('images/AyamGeprek.png');
>>>>>>> 630fbcd5d5a9fd211ed9803f393c87f3367593e2
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
