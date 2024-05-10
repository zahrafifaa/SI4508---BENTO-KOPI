<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kolaborasi extends Model
{
    use HasFactory;
    protected $table = 'kolaborasi';
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeAcc($val)
    {
        $val->where('status', 1);
    }

<<<<<<< HEAD
    public function getSurat()
    {
        return storage_path('app/public/' . $this->surat);
    }

    public function gambar()
    {
        if ($this->gambar) {
            return asset('storage/' . $this->gambar);
        } else {
            return asset('images/bentoKopi.png');
        }
    }

    public function getTanggalAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d-m-Y');
=======
    public function gambar()
    {
        return asset('storage/' . $this->gambar);
>>>>>>> 630fbcd5d5a9fd211ed9803f393c87f3367593e2
    }
}
