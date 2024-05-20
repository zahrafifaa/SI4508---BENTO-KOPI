<?php

namespace App\Http\Controllers;

use App\Models\OrderTable;
use App\Models\CartItemOrder;
use App\Models\DashboardCashier;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreDashboardCashierRequest;
use App\Http\Requests\UpdateDashboardCashierRequest;

class DashboardCashierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orderedMenus = CartItemOrder::with(['menu', 'cart.user', 'cart.orderTables'])
        ->orderBy('created_at', 'asc') // Order by created_at to ensure correct sequence
        ->get()
        ->groupBy(function($item) {
            return $item->cart->user->id . '_' . $item->created_at->toDateTimeString(); // Group by user and exact time
        });

    return view('dashboardcashier.index', compact('orderedMenus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDashboardCashierRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DashboardCashier $dashboardCashier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DashboardCashier $dashboardCashier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDashboardCashierRequest $request, DashboardCashier $dashboardCashier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DashboardCashier $dashboardCashier)
    {
        //
    }
}
