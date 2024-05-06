<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Kopi; // Import model Kopi
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index_cart()
    {
        // $cart_data = Cart::all();
        // $cart_data = Cart::with('kopi')->get();
        // $cart_data = Cart::where('id_user', auth()->id())->get();
        // $cartCount = Cart::where('id_user', auth()->id())->count();
        $cartCount = Cart::where('id_user', auth()->id())->whereNull('transaksi_id')->count();
        $tidakada_bukti_payment = Transaksi::where('id_user', auth()->id())->whereNull('bukti_payment')->first();
        $cart_data = Cart::where('id_user', Auth::id())->whereNull('transaksi_id')->get();
        // dd($existingCart);
        return view('user.cart', compact('cart_data', 'cartCount', 'tidakada_bukti_payment'));
    }

    public function add_cart(Request $request)
    {

        if(Auth::id()){
            // Mendapatkan data kopi dari database
            $kopi = Kopi::find($request->kopi_id);
            if (!$kopi) {
                return redirect()->back()->with('error', 'Kopi not found');
            }

            // Mengatur nilai default quantity menjadi 1 jika tidak disertakan dalam permintaan
            $quantity = $request->quantity ?? 1;
            // dd($quantity);
            // Hitung total harga
            $total = $quantity * $kopi->harga;

            // Buat atau perbarui keranjang belanja pengguna
            Cart::create([
                'id_user' => Auth::id(), 
                'kopi_id' => $request->kopi_id,
                'quantity' => $quantity, 
                'jumlah' => $total
            ]);

            // Redirect ke rute /cart setelah item berhasil ditambahkan ke keranjang
            return redirect('/cart')->with('success', 'Item added to cart');
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

    public function getCartCount()
    {
        // if(Auth::id()){
            // $count = Cart::where('id_user', auth()->id())->count();
            $cartCount = Cart::where('id_user', auth()->id())->whereNull('transaksi_id')->count();
            // dd($count);
            return response()->json(['count' => $count]);
        // }
        // else
        
        // $cartCount = Cart::where('id_user', auth()->id())->count();
        // return view('layouts.nav_user', ['cartCount' => $cartCount]);
    }

    public function destroy($id)
    {
        $data_cart = Cart::find($id);
        $data_cart->delete();
        return redirect()->back();
    }

    
}
