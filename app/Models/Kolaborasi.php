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

    public function gambar()
    {
        return asset('storage/' . $this->gambar);
    }
}
