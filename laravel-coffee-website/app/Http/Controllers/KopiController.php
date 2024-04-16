<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kopi;
use App\Models\Cart;

class KopiController extends Controller
{
    public function index()
    {
        $kopi = Kopi::all();

        $cartCount = Cart::where('id_user', auth()->id())->count();
        // return view('layouts.nav_user', ['cartCount' => $cartCount]);
        return view('index_kopi', compact('kopi', 'cartCount'));
    }

    public function dashboard()
    {
        // $kopi = Kopi::all();
        return view('admin/main');
    }

    public function datakopiadmin()
    {
        $kopi = Kopi::all();
        return view('admin/datakopi/index', compact('kopi'));
    }

    public function detail($id)
    {
        $detail_kopi = Kopi::find($id);
        $cartCount = Cart::where('id_user', auth()->id())->count();
        return view('user.detailkopi', compact('detail_kopi', 'cartCount'));
    }
}
