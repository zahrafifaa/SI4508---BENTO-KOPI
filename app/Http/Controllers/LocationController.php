<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $q = request('q');
        $items = Location::whereNotNull('id');
        if ($q)
            $items->where('nama', 'LIKE', '%' . $q . '%');
        else
            $items->get();
        $data = $items->get();
        return view('pages.location.index', [
            'title' => 'Location',
            'items' => $data
        ]);
    }

    public function show($id)
    {
        $item = Location::findOrFail($id);
        return view('pages.location.show', [
            'title' => 'Location',
            'item' => $item
        ]);
    }
}