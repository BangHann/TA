<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kopi;
use App\Models\Cart;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class KopiController extends Controller
{
    public function index()
    {
        $kopi = Kopi::all();

        // $cartCount = Cart::where('id_user', auth()->id())->count();
        $cartCount = Cart::where('id_user', auth()->id())->whereNull('transaksi_id')->count();
        // return view('layouts.nav_user', ['cartCount' => $cartCount]);
        return view('index_kopi', compact('kopi', 'cartCount'));
    }

    public function dashboard()
    {
        // $kopi = Kopi::all();
        $totalPrice = Transaksi::sum('total_price');
        $totalTransaksi = Transaksi::count();
        $totalUsers = User::count();

        return view('admin.main', compact('totalPrice', 'totalTransaksi', 'totalUsers'));
    }

    public function datakopiadmin()
    {
        $kopi = Kopi::all();
        return view('admin/datakopi/index', compact('kopi'));
    }

    public function detail($id)
    {
        $detail_kopi = Kopi::find($id);
        // $cartCount = Cart::where('id_user', auth()->id())->count();
        $cartCount = Cart::where('id_user', auth()->id())->whereNull('transaksi_id')->count();
        $tidakada_bukti_payment = Transaksi::where('id_user', auth()->id())->whereNull('bukti_payment')->first();
        return view('user.detailkopi', compact('detail_kopi', 'cartCount', 'tidakada_bukti_payment'));
    }
}
