<?php

namespace App\Http\Controllers;

use App\Models\Melamar;
use App\Models\User;
use Illuminate\Http\Request;

class PelamarController extends Controller
{
    public function index()
    {
        $pelamar = Melamar::all();
        return view('dashboard.pelamar.index', compact('pelamar'));
    }
}
