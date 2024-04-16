<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function index_cart()
    {
        $cart_data = Cart::all();
        return view('user.cart', compact('cart_data'));
    }
}
