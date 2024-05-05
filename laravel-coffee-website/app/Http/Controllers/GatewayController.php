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
        if(Auth::id())
        {
            $role=Auth()->user()->role;
            if($role=='user')
            {
                $kopi = Kopi::all();
                $cartCount = Cart::where('id_user', auth()->id())->count();
                return view('index_kopi', compact('kopi', 'cartCount'));
            }
            else if($role=='admin')
            {
                return view ('admin.main');
            }
            else
            {
                return redirect()->back();
            }
        }
        else{
            return redirect('/');
        }
    }
}
