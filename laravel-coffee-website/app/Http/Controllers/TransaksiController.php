<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Kopi;
use App\Models\Cart;

class TransaksiController extends Controller
{
    public function index()
    {
        $kopi = Kopi::all();
        $cart_data = Cart::where('id_user', auth()->id())->get();
        // Menghitung total pembelian untuk setiap pengguna
        $cart_total = Cart::select('id_user', DB::raw('SUM(total) as total_amount'))
        ->where('id_user', auth()->id())
        ->groupBy('id_user')
        ->get();
        
        // Mengakses total_amount dari objek pertama (atau satu-satunya) dalam kumpulan
        $total_amount = $cart_total->isEmpty() ? 0 : $cart_total->first()->total_amount;
        // dd($total_amount);

        $cartCount = Cart::where('id_user', auth()->id())->count();
        // return view('layouts.nav_user', ['cartCount' => $cartCount]);
        return view('user.checkout', compact('kopi', 'cart_data', 'total_amount', 'cartCount'));
        // return view('user.checkout', compact('kopi', 'cartCount'));
    }
}
