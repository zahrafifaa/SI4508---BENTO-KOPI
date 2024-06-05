<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function create()
    {
        return view('dashboardcashier.discount.create');
    }

    public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'code' => 'required',
        'amount' => 'required|numeric|min:0',
    ]);

    // Cek apakah kode sudah ada di database
    if (Discount::where('code', $request->code)->exists()) {
        return redirect()->back()->with('insertdiscounterror', 'Kode diskon sudah terdapat di database!');
    }

    // Jika kode belum ada, simpan diskon ke database
    Discount::create([
        'code' => $request->code,
        'amount' => $request->amount,
    ]);

    return redirect()->back()->with('insertdiscountsuccess', 'Diskon berhasil ditambahkan!');
}

    public function index()
    {
        $discounts = Discount::all();
        return view('dashboardcashier.discount.index', compact('discounts'));
    }

    public function show()
    {
        $discounts = Discount::all();
        return view('dashboardcashier.discount.show', compact('discounts'));
    }

    public function destroy($id)
    {
        $discount = Discount::findOrFail($id);
        $discount->delete();

        return redirect()->back()->with('deletediscountsuccess', 'Diskon berhasil dihapus.');
    }
}
