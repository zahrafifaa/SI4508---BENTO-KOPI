<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Melamar extends Model
{
    use HasFactory;
    protected $table = 'melamar';
    protected $guarded = ['id'];
}
