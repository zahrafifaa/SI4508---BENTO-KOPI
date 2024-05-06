<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
{
    $user_id = Auth::id();
    $carts = Cart::where('user_id', $user_id)->get();
    $title = "Cart";
    $totalPrice = 0; // Inisialisasi total harga
    $totalItem = 0; // Inisialisasi total harga

    foreach ($carts as $cart) {
        // Hitung subtotal per item
        $subtotal = $cart->jumlah * $cart->menu->harga;
        // Tambahkan subtotal ke total harga
        $totalPrice += $subtotal;
    }

    $totalItems = $carts->sum('jumlah'); // Menghitung total keseluruhan item

    return view('cart.index', compact('carts', 'totalItems', 'totalPrice', 'title'));
}

    public function store(Cart $cart){
        $validated = request()->validate([
            'menu_id' => 'required',
        ]);
    
        $validated['user_id'] = auth()->id();
        $validated['jumlah'] = 1;
    
        // Cek apakah sudah ada item dengan menu_id yang sama di dalam keranjang
        $existingCartItem = Cart::where('menu_id', $validated['menu_id'])
                                ->where('user_id', $validated['user_id'])
                                ->first();
    
        if ($existingCartItem) {
            // Jika sudah ada, tambahkan jumlah item
            $existingCartItem->jumlah += 1;
            $existingCartItem->save();
        } else {
            // Jika belum ada, buat entri baru di keranjang
            $cart = Cart::create($validated);
        }

        return redirect()->back()->with('success', 'Berhasil Menambahkan Ke Keranjang!');
        
    }
    public function destroy($menu_id){
        $user = Auth::user();
        Cart::where('user_id', $user->id)->where('menu_id', $menu_id)->delete();

        return redirect()->back()->with('success', 'Berhasil Menghapus Menu dari Keranjang!');

    }

    public function increaseQuantity(Request $request)
{
    $user_id = Auth::id();
    $menu_id = $request->menu_id;

    // Cek apakah produk sudah ada di keranjang
    $cart = Cart::where('user_id', $user_id)
                ->where('menu_id', $menu_id)
                ->first();

    if ($cart) {
        // Tingkatkan jumlahnya
        $cart->jumlah += 1;
        $cart->save();
    }

    return redirect()->back();
}

public function reduceQuantity(Request $request)
{
    $user_id = Auth::id();
    $menu_id = $request->menu_id;

    // Cek apakah produk sudah ada di keranjang
    $cart = Cart::where('user_id', $user_id)
                ->where('menu_id', $menu_id)
                ->first();

    if ($cart) {
        // Kurangi jumlahnya jika lebih dari 1, jika tidak hapus entri dari keranjang
        if ($cart->jumlah > 1) {
            $cart->jumlah -= 1;
            $cart->save();
        } else {
            $cart->delete();
        }
    }

    return redirect()->back();
}


public function storeMessage(Request $request)
{
    $validated = $request->validate([
        'special_message' => 'nullable|string',
    ]);

    $user_id = auth()->id();
    $carts = Cart::where('user_id', $user_id)->get();

    foreach ($carts as $cart) {
        $cart->special_message = $validated['special_message'];
        $cart->save();
    }

    return redirect()->back()->with('success', 'Pesan Anda telah dikirim!');
}

}
// public function viewCart()
// {
//     $user_id = Auth::id();
//     $carts = Cart::where('user_id', $user_id)->get();
//     $totalItems = $carts->sum('jumlah'); // Menghitung total keseluruhan item

//     return view('cart.index', compact('carts', 'totalItems'));
// }

