<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\OrderTable;
use App\Models\DashboardCashierTotal;
use Illuminate\Http\Request;
use App\Models\CartItemOrder;
use App\Models\DashboardCashier;
use Illuminate\Support\Facades\Auth;

class DashboardCashierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = Auth::user();

        if($user->id == 1){
            $dashboardCashiers = DashboardCashier::with(['orderTable.user', 'orderTable.cartItemOrders.menu'])->get();
        
        // Group data by orderTable
        $orders = [];
        foreach ($dashboardCashiers as $dashboardCashier) {
            $orderTableId = $dashboardCashier->orderTable->id;
            if (!isset($orders[$orderTableId])) {
                $orders[$orderTableId] = [
                    'dashboardCashier' => $dashboardCashier,
                    'items' => [],
                    'totalQty' => 0,
                    'totalPrice' => 0
                ];
            }

            foreach ($dashboardCashier->orderTable->cartItemOrders as $item) {
                $orders[$orderTableId]['items'][] = $item;
                $orders[$orderTableId]['totalQty'] += $item->jumlah;
                $orders[$orderTableId]['totalPrice'] += $item->menu->harga * $item->jumlah;
            }
        }

        return view('dashboardcashier.index', compact('orders'));
        }
        else{
            $favorites = Favorite::all()->where('user_id', $user->id);
            $title = 'Beranda';
            return view('beranda', compact('title', 'user', 'favorites'));
        }
        
    }

    /**
     * Update the status of the order.
     */
    public function updateStatus(Request $request, $id)
    {
        $dashboardCashier = DashboardCashier::findOrFail($id);
        $dashboardCashier->status_pemesanan = $request->input('status_pemesanan');
        $dashboardCashier->save();

        return redirect()->back()->with('success', 'Status pemesanan berhasil diubah.');
    }

    /**
     * Complete the order and remove it from the dashboard.
     */
    public function completeOrder($id)
    {
        $dashboardCashier = DashboardCashier::findOrFail($id);
        // Simpan data ke dashboardcashier_total
        DashboardCashierTotal::create([
            'ordertable_id' => $dashboardCashier->orderTable->id,
            'total_price' => $dashboardCashier->total_price
        ]);
        $dashboardCashier->delete();

        return redirect()->back()->with('success', 'Pesanan berhasil diselesaikan dan dihapus dari daftar.');
    }
    
}
