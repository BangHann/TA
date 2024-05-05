<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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

    public function add_order(Request $request)
    {

        if(Auth::id()){
            // Mendapatkan data kopi dari database
            $kopi = Kopi::find($request->kopi_id);
            if (!$kopi) {
                return redirect()->back()->with('error', 'Kopi not found');
            }

            // Mengatur nilai default quantity menjadi 1 jika tidak disertakan dalam permintaan
            $quantity = $request->quantity ?? 1;
            $total = $quantity * $kopi->harga;

            // Buat atau perbarui keranjang belanja pengguna
            Cart::create([
                'id_user' => Auth::id(), 
                'kopi_id' => $request->kopi_id,
                'quantity' => $quantity, 
                'total' => $total
            ]);

            // Redirect ke rute /cart setelah item berhasil ditambahkan ke keranjang
            return redirect('/checkout')->with('success', 'Item added to cart');
        }
        else{
            return redirect('/login');
        }
        // Validasi request
        $request->validate([
            'kopi_id' => 'required|exists:tbl_kopi,id',
            'quantity' => 'required|integer|min:1',
        ]);

    }
}
