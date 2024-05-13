<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\OrderTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart_id = Auth::id();
        $carts = CartItem::where('cart_id', $cart_id)->get();
        $title = "Cart";
        $totalPrice = 0;
        $totalItems = $carts->sum('jumlah');

        foreach ($carts as $cart) {
            $subtotal = $cart->jumlah * $cart->menu->harga;
            $totalPrice += $subtotal;
        }

        return view('cart.index', compact('carts', 'totalItems', 'totalPrice', 'title','cart_id'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'menu_id' => 'required',
        ]);

        $validated['cart_id'] = auth()->id();
        $validated['jumlah'] = 1;

        $existingCartItem = CartItem::where('menu_id', $validated['menu_id'])
            ->where('cart_id', $validated['cart_id'])
            ->first();

        if ($existingCartItem) {
            $existingCartItem->jumlah += 1;
            $existingCartItem->save();
        } else {
            $cart = CartItem::create($validated);
        }

        return redirect()->back();
    }

    public function destroy($id)
{

    CartItem::destroy($id);
    return redirect()->back()->with('success', 'Item berhasil dihapus dari keranjang!');
}

public function increaseQuantity(Request $request)
{
    $validated = $request->validate([
        'menu_id' => 'required',
    ]);

    $cart_id = Auth::id();
    $menu_id = $validated['menu_id'];

    // Cek apakah produk sudah ada di keranjang
    $cart = CartItem::where('cart_id', $cart_id)
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
    $validated = $request->validate([
        'menu_id' => 'required',
    ]);

    $cart_id = Auth::id();
    $menu_id = $validated['menu_id'];

    // Cek apakah produk sudah ada di keranjang
    $cart = CartItem::where('cart_id', $cart_id)
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
    
        $cart_id = auth()->id();
    
        // Buat OrderTable baru atau ambil yang sudah ada jika ada
        $order = OrderTable::where('cart_id', $cart_id)->first();
        if (!$order) {
            $order = new OrderTable(['cart_id' => $cart_id]);
        }
    
        // Set special_message pada OrderTable
        $order->special_message = $validated['special_message'];
        $order->save();
    
        return redirect()->back()->with('success', 'Pesan Anda telah dikirim!');
    }

    
}
    

    // public function reduceQuantity(Request $request)
// {
//     $cart_id = Auth::id();
//     $menu_id = $request->menu_id;

//     // Cek apakah produk sudah ada di keranjang
//     $cart = Cart::where('user_id', $cart_id)
//                 ->where('menu_id', $menu_id)
//                 ->first();

//     if ($cart) {
//         // Kurangi jumlahnya jika lebih dari 1, jika tidak hapus entri dari keranjang
//         if ($cart->jumlah > 1) {
//             $cart->jumlah -= 1;
//             $cart->save();
//         } else {
//             $cart->delete();
//         }
//     }

//     return redirect()->back();
// }


//     public function index()
// {
//     $cart_id = Auth::id();
//     $carts = CartItem::where('cart_id', $cart_id)->get();
//     $title = "Cart";
//     $totalPrice = 0; // Inisialisasi total harga
//     $totalItem = 0; // Inisialisasi total harga

//     foreach ($carts as $cart) {
//         // Hitung subtotal per item
//         $subtotal = $cart->jumlah * $cart->menu->harga;
//         // Tambahkan subtotal ke total harga
//         $totalPrice += $subtotal;
//     }

//     $totalItems = $carts->cartitem->sum('jumlah'); // Menghitung total keseluruhan item

//     return view('cart.index', compact('carts', 'totalItems', 'totalPrice', 'title'));
// }

//     public function store(CartItem $cartitem){
//         $validated = request()->validate([
//             'menu_id' => 'required',
//         ]);
    
//         $validated['user_id'] = auth()->id();
//         $validated['jumlah'] = 1;
    
//         // Cek apakah sudah ada item dengan menu_id yang sama di dalam keranjang
//         $existingCartItem = CartItem::where('menu_id', $validated['menu_id'])
//                                 ->where('cart_id', $validated['cart_id'])
//                                 ->first();
    
//         if ($existingCartItem) {
//             // Jika sudah ada, tambahkan jumlah item
//             $existingCartItem->jumlah += 1;
//             $existingCartItem->save();
//         } else {
//             // Jika belum ada, buat entri baru di keranjang
//             $cart = CartItem::create($validated);
//         }

//         return redirect()->back()->with('success', 'Berhasil Menambahkan Ke Keranjang!');
        
//     }
//     public function destroy($menu_id){
//         $cart = Auth::user();
//         CartItem::where('cart_id', $cart->id)->where('menu_id', $menu_id)->delete();

//         return redirect()->back()->with('success', 'Berhasil Menghapus Menu dari Keranjang!');

//     }

//     public function increaseQuantity(Request $request)
// {
//     $cart_id = Auth::id();
//     $menu_id = $request->menu_id;

//     // Cek apakah produk sudah ada di keranjang
//     $cart = CartItem::where('user_id', $cart_id)
//                 ->where('menu_id', $menu_id)
//                 ->first();

//     if ($cart) {
//         // Tingkatkan jumlahnya
//         $cart->jumlah += 1;
//         $cart->save();
//     }

//     return redirect()->back();
// }

// public function reduceQuantity(Request $request)
// {
//     $cart_id = Auth::id();
//     $menu_id = $request->menu_id;

//     // Cek apakah produk sudah ada di keranjang
//     $cart = Cart::where('user_id', $cart_id)
//                 ->where('menu_id', $menu_id)
//                 ->first();

//     if ($cart) {
//         // Kurangi jumlahnya jika lebih dari 1, jika tidak hapus entri dari keranjang
//         if ($cart->jumlah > 1) {
//             $cart->jumlah -= 1;
//             $cart->save();
//         } else {
//             $cart->delete();
//         }
//     }

//     return redirect()->back();
// }


// public function storeMessage(Request $request)
// {
//     $validated = $request->validate([
//         'menu_id' => 'required',
//         'pesan' => 'nullable|string',
//     ]);

//     $cart_id = auth()->id();
//     $cart = Cart::where('cart_id', $cart_id)
//                 ->where('menu_id', $validated['menu_id'])
//                 ->first();

//     if ($cart) {
//         $cart->pesan = $validated['pesan'];
//         $cart->save();
//     }

//     return redirect()->back()->with('success', 'Pesan Anda telah dikirim!');
// }

