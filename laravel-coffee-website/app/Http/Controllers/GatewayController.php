<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Kopi; // Import model Kopi
use App\Models\Cart;

class GatewayController extends Controller
{
    public function door()
    {
        if(Auth::check())
        {
            $role=Auth()->user()->role;
            if($role=='user')
            {
                $kopi = Kopi::all();
                // $cartCount = Cart::where('id_user', auth()->id())->count();
                $cartCount = Cart::where('id_user', auth()->id())->whereNull('transaksi_id')->count();
                return view('index_kopi', compact('kopi', 'cartCount'));
            }
            else if($role=='admin')
            {
                return view ('admin.main');
            }
            else
            {
                return redirect()->back()->with('error', 'Invalid user role');
            }
        }
        else{
            return redirect('/');
        }
    }
}
