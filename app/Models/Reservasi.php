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
    // Mendapatkan entri terbaru berdasarkan tanggal pembuatan
    $last = static::latest('created_at')->first();

    // Jika tidak ada entri sebelumnya, mulai dari 1
    if (!$last || !isset($last->kode)) {
        $newCodeNumber = 1;
    } else {
        // Mengambil bagian angka dari kode terakhir dan menambahnya dengan 1
        $lastCode = $last->kode;
        $lastCodeNumber = (int) substr($lastCode, 3); // Mengubah 1 menjadi 3 untuk mengambil bagian angka setelah 'RES'
        $newCodeNumber = $lastCodeNumber + 1;
    }

    // Membuat kode baru dengan format 'RES' diikuti angka 5 digit
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



