<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Kopi; // Import model Kopi
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index_cart()
    {
        $cart_data = Cart::all();
        $cartCount = Cart::where('id_user', auth()->id())->count();
        return view('user.cart', compact('cart_data', 'cartCount'));
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
            $total = $quantity * $kopi->price;

            // Buat atau perbarui keranjang belanja pengguna
            Cart::create([
                'id_user' => Auth::id(), 
                'kopi_id' => $request->kopi_id,
                'quantity' => $quantity, 
                'total' => $total
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
            $count = Cart::where('id_user', auth()->id())->count();
            return response()->json(['count' => $count]);
        // }
        // else
        
        // $cartCount = Cart::where('id_user', auth()->id())->count();
        // return view('layouts.nav_user', ['cartCount' => $cartCount]);
    }
}
