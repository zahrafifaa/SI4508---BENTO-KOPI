<?php

namespace App\Models;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'kategori',
        'jenis',
        'deskripsi',
        'harga',
        'gambar',
        'admin_id'
    ];
    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }
}