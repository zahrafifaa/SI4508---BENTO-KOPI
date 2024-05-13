<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;
    protected $table = 'reservasi';
    protected $guarded = ['id'];

    public function details()
    {
        return $this->hasMany(ReservasiDetail::class, 'reservasi_id', 'id');
    }

    public static function getNewCode()
    {
        $lastCode = static::orderBy('created_at', 'desc')->first();
        if (!$lastCode) {
            $newCodeNumber = 1;
        } else {
            $lastCodeNumber = (int) substr($lastCode->kode, 1);
            $newCodeNumber = $lastCodeNumber + 1;
        }
        $newCode = 'RES' . str_pad($newCodeNumber, 5, '0', STR_PAD_LEFT);
        return $newCode;
    }

    public function status()
    {
        if ($this->status == 0)
            return 'Menunggu Persetujuan';
        elseif ($this->status == 1)
            return 'Disetujui';
        elseif ($this->status == 2)
            return 'Ditolak';
        else
            return 'Selesai';
    }

    // status
    // 0 = Menunggu Persetujuan
    // 1 = Disetujui
    // 2 = Ditolak
}
