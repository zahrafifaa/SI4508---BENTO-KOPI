<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BerandaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->id == 2 || $user->username == 'App') {
            return view('dashboard.index');
        } else {
            $favorites = Favorite::where('user_id', $user->id)->get();
            $title = 'Beranda';
            return view('beranda', compact('title', 'user', 'favorites'));
        }
    }
}
