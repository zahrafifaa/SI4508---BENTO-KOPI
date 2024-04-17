<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table_Info;

class ReservationController extends Controller
{
    public function checkAvailability(Request $request)
    {
        // Retrieve the date and time inputs from the form
        $tgl_reservasi = $request->input('tgl_reservasi');
        $wkt_reservasi = $request->input('wkt_reservasi');
        
        // Retrieve table information from the database
        $tables = Table_Info::all();

        // Here you would perform any additional logic to check table availability
        // For demonstration purposes, we'll simply return a response
        return view('ketersediaanmeja', ['tgl_reservasi' => $tgl_reservasi, 'wkt_reservasi' => $wkt_reservasi, 'tables' => $tables]);
    }
}

