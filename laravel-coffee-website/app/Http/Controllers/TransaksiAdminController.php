<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Kopi;
use App\Models\Cart;
use App\Models\Transaksi;

class TransaksiAdminController extends Controller
{
    public function orderlist_admin()
    {
        $transaksi_data = Transaksi::all();
        return view('admin.order.index', compact('transaksi_data'));
    }
}
