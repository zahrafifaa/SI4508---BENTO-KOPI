<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation_Info extends Model
{
    use HasFactory;

    protected $fillable = [
        'Name',
        'PhoneNum',
        'ReservationDate',
        'ReservationTime',
        'NumOfVisitor'
    ];
}
