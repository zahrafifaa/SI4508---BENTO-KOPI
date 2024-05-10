<?php

namespace App\Http\Controllers;

use App\Models\Kolaborasi;
use Illuminate\Http\Request;

class ListKolaboratorController extends Controller
{
    public function index(){
        $item = Kolaborasi::all();
        return view('dashboard.listKolaborator.index', compact('item'));
    }

    public function show($id){

        $item = Kolaborasi::findOrFail($id);
        return view('dashboard.listKolaborator.show', compact('item'));
    }

    public function download($id) {

        $file = Kolaborasi::findOrFail($id);
        $filePath = $file->getSurat();

        // return dd($filePath);

        return response()->download($filePath, 'surat.pdf');

        // if (file_exists($filePath)) {
        //     return response()->download($filePath, $file);
        // }else{
        //     return redirect()->back()->with('error', 'file not found');
        // }
    }
}
