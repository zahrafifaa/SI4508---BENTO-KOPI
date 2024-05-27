<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservasi;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    public function index()
    {
        $items = Reservasi::latest()->get();
        return view('admin.pages.reservasi.index', [
            'title' => 'Reservasi',
            'items'  => $items
        ]);
    }

    public function acc()
    {
        $item = Reservasi::findOrFail(request('id'));
        $item->update([
            'status' => request('status')
        ]);

        if (request('status') == 1) {
            // set diterima dan set tidak tersedia meja
            foreach ($item->details as $detail) {
                $detail->meja->update([
                    'status' => 1
                ]);
            }
        }
        if (request('status') == 3) {
            // set selesai dan set tersedia meja
            foreach ($item->details as $detail) {
                $detail->meja->update([
                    'status' => 0
                ]);
            }
        }

        return redirect()->back()->with('success', 'Status Reservasi berhasil diupdate.');
    }
}
