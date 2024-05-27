<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meja extends Model
{
    use HasFactory;
    protected $table = 'meja';
    protected $guarded = ['id'];

    public static function getNewCode()
    {
        $lastCode = static::orderBy('created_at', 'desc')->first();
        if (!$lastCode) {
            $newCodeNumber = 1;
        } else {
            $lastCodeNumber = (int) substr($lastCode->kode, 1);
            $newCodeNumber = $lastCodeNumber + 1;
        }
        $newCode = 'M' . str_pad($newCodeNumber, 3, '0', STR_PAD_LEFT);
        return $newCode;
    }

    public function reservasi_detail()
    {
        return $this->hasMany(ReservasiDetail::class, 'meja_id', 'id');
    }
}
